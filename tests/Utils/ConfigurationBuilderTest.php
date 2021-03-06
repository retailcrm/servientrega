<?php

namespace App\Tests\Utils;

use App\Dto\Retailcrm\IntegrationModule;
use App\Entity\Connection;
use App\Tests\WebTestCase;
use App\Utils\ConfigurationBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\UrlHelper;
use Symfony\Contracts\Translation\TranslatorInterface;

class ConfigurationBuilderTest extends WebTestCase
{
    public function testBuild()
    {
        $urlHelper = static::$container->get(UrlHelper::class);
        $params    = static::$container->get(ParameterBagInterface::class);
        $trans     = static::$container->get(TranslatorInterface::class);

        $service = new ConfigurationBuilder($urlHelper, $params, $trans);
        $result  = $service->build(
            (new Connection())->setClientId('client_id')
        );

        static::assertInstanceOf(IntegrationModule::class, $result);
        static::assertNotEmpty($result->integrations->delivery);
        static::assertNotEmpty($result->integrations->delivery->deliveryDataFieldList);
    }

    public function testGenerateModuleCode()
    {
        $connection = $this->createMock(Connection::class);
        $connection->method('getId')->willReturn(10);

        $result = ConfigurationBuilder::generateModuleCode($connection);

        static::assertEquals(sprintf('%s-%d', ConfigurationBuilder::INTEGRATION_CODE, 10), $result);
    }
}
