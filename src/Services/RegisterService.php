<?php

namespace App\Services;

use App\Dto\Front\Connection as ConnectionDto;
use App\Dto\Register\RegisterRequest;
use App\Entity\Connection;
use App\Utils\ConfigurationBuilder;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\UrlHelper;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class RegisterService
{
    /**
     * @var UrlHelper
     */
    private $urlHelper;
    /**
     * @var ParameterBagInterface
     */
    private $params;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var ConnectionService
     */
    private $connectionService;
    /**
     * @var RetailcrmService
     */
    private $retailcrmService;
    /**
     * @var ConfigurationBuilder
     */
    private $configurationBuilder;

    public function __construct(UrlHelper $urlHelper,
        ParameterBagInterface $params,
        EntityManagerInterface $entityManager,
        ConnectionService $connectionService,
        RetailcrmService $retailcrmService,
        ConfigurationBuilder $configurationBuilder
    ) {
        $this->urlHelper     = $urlHelper;
        $this->params        = $params;
        $this->entityManager = $entityManager;

        $this->connectionService    = $connectionService;
        $this->retailcrmService     = $retailcrmService;
        $this->configurationBuilder = $configurationBuilder;
    }

    /**
     * @return string[]
     */
    public function getScopesList(): array
    {
        return $this->params->get('register')['api-scopes'];
    }

    public function getRegisterUrl(): string
    {
        return $this->urlHelper->getAbsoluteUrl('/api/register');
    }

    /**
     * @throws \Exception
     * @throws ExceptionInterface
     */
    public function register(RegisterRequest $request): string
    {
        $this->validateRequest($request);

        // todo check if connection exists

        $connection = $this->createConnection($request);

        $module = $this->configurationBuilder->build($connection);
        $this->retailcrmService->integrationModule($connection, $module);

        $this->entityManager->flush();

        return $this->getAccountUrl();
    }

    /**
     * @throws UnauthorizedHttpException
     */
    private function validateRequest(RegisterRequest $request): void
    {
        $connectSecret = $this->params->get('register')['secret'];

        if (hash_hmac('sha256', $request->apiKey, $connectSecret) !== $request->token) {
            throw new UnauthorizedHttpException('');
        }
    }

    private function createConnection(RegisterRequest $request): Connection
    {
        $connectionDto = new ConnectionDto();

        $connectionDto->crmUrl = $request->systemUrl;
        $connectionDto->apiKey = $request->apiKey;

        return $this->connectionService->createConnection($connectionDto);
    }

    public function getAccountUrl(): string
    {
        return $this->urlHelper->getAbsoluteUrl('/login');
    }
}
