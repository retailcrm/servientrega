<?php

namespace App\Utils;

use App\Dto\Retailcrm\Configuration;
use App\Dto\Retailcrm\IntegrationModule;
use App\Dto\Retailcrm\Integrations;
use App\Dto\Retailcrm\Plate;
use App\Dto\Retailcrm\Status;
use App\Entity\Connection;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\UrlHelper;

/**
 * Class ConfigurationBuilder
 *
 * @package App\Utils
 */
class ConfigurationBuilder
{
    const INTEGRATION_CODE = 'servientrega';

    /**
     * @var UrlHelper
     */
    private $urlHelper;

    /**
     * @var ParameterBagInterface
     */
    private $params;

    /**
     * ConfigurationBuilder constructor.
     *
     * @param UrlHelper $urlHelper
     * @param ParameterBagInterface $params
     */
    public function __construct(UrlHelper $urlHelper, ParameterBagInterface $params)
    {
        $this->urlHelper = $urlHelper;
        $this->params = $params;
    }

    /**
     * @param Connection $connection
     *
     * @return string
     */
    public static function generateModuleCode(Connection $connection): string
    {
        return sprintf("%s-%d", static::INTEGRATION_CODE, $connection->getId());
    }

    /**
     * @param Connection $connection
     *
     * @return IntegrationModule
     */
    public function build(Connection $connection): IntegrationModule
    {
        $module = new IntegrationModule();
        $integrations = new Integrations();
        $integrations->delivery = $this->buildConfiguration();

        $module->code = static::generateModuleCode($connection);
        $module->active = $connection->isActive();
        $module->integrationCode = static::INTEGRATION_CODE;
        $module->name = $this->params->get('configuration')['name'];
        $module->clientId = $connection->getClientId();
        $module->baseUrl = $this->urlHelper->getAbsoluteUrl('/');
        $module->logo = $this->urlHelper->getAbsoluteUrl('/build/images/logo.svg');
        $module->actions = [
            'activity' => '/callback/activity'
        ];
        $module->availableCountries = ['US', 'CO', 'ES'];
        $module->accountUrl = $this->urlHelper->getAbsoluteUrl('/login');

        $module->integrations = $integrations;

        return $module;
    }

    /**
     * @return Configuration
     */
    private function buildConfiguration(): Configuration
    {
        $configuration = new Configuration();
        $configuration->actions = [
            'calculate' => '/callback/calculate',
            'save' => '/callback/save',
            'delete' => '/callback/delete',
            'print' => '/callback/print',
        ];

        $configuration->payerType = [Configuration::PAYER_TYPE_RECEIVER, Configuration::PAYER_TYPE_SENDER];
        $configuration->allowPackages = true;
        $configuration->allowTrackNumber = true;
        $configuration->availableCountries = ['US', 'CO', 'ES'];
        $configuration->requiredFields = $this->params->get('configuration')['required_fields'];
        $configuration->statusList = $this->buildStatusList();
        $configuration->plateList = $this->buildPlateList();

        return $configuration;
    }

    /**
     * @return Status[]
     */
    private function buildStatusList(): array
    {
        $result = [];
        $statuses = $this->params->get('configuration')['delivery_statuses'];

        foreach ($statuses as $status) {
            $resultStatus = new Status();
            $resultStatus->code = $status['code'];
            $resultStatus->name = $status['name'];

            $result[] = $resultStatus;
        }

        return $result;
    }

    /**
     * @return Plate[]
     */
    private function buildPlateList(): array
    {
        $result = [];
        $plateList = $this->params->get('configuration')['plate_list'];

        foreach ($plateList as $value) {
            $plate = new Plate();
            $plate->code = $value['code'];
            $plate->label = $value['label'];

            $result[] = $plate;
        }

        return $result;
    }
}
