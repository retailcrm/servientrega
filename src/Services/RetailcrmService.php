<?php

namespace App\Services;

use App\Dto\Retailcrm\IntegrationModule;
use App\Dto\Retailcrm\TrackingStatusUpdate;
use App\Entity\Connection;
use App\Factory\RetailcrmClientFactory;
use App\Utils\ConfigurationBuilder;
use Psr\Log\LoggerInterface;
use RetailCrm\Response\ApiResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Exception;

class RetailcrmService
{
    /**
     * @var RetailcrmClientFactory
     */
    private $retailcrmClientFactory;

    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * RetailcrmService constructor.
     *
     * @param RetailcrmClientFactory $retailcrmClientFactory
     * @param SerializerInterface $serializer
     * @param LoggerInterface $logger
     */
    public function __construct(
        RetailcrmClientFactory $retailcrmClientFactory,
        SerializerInterface $serializer,
        LoggerInterface $logger
    ) {
        $this->retailcrmClientFactory = $retailcrmClientFactory;
        $this->serializer = $serializer;
        $this->logger = $logger;
    }

    /**
     * @param Connection $connection
     * @param IntegrationModule $configuration
     *
     * @throws Exception|\Symfony\Component\Serializer\Exception\ExceptionInterface
     */
    public function integrationModule(Connection $connection, IntegrationModule $configuration): void
    {
        $response = $this->retailcrmClientFactory->create($connection)->request->integrationModulesEdit(
            $this->serializer->normalize($configuration)
        );

        if (!$response->isSuccessful()) {
            $this->handleError($response);
        }
    }

    /**
     * @param Connection $connection
     * @param TrackingStatusUpdate[] $statusUpdate
     *
     * @throws Exception|\Symfony\Component\Serializer\Exception\ExceptionInterface
     */
    public function deliveryTracking(Connection $connection, array $statusUpdate)
    {
        $client = $this->retailcrmClientFactory->create($connection);

        $response = $client->request->deliveryTracking(
            ConfigurationBuilder::generateModuleCode($connection),
            $this->serializer->normalize($statusUpdate)
        );

        if (!$response->isSuccessful()) {
            $this->handleError($response);
        }
    }

    /**
     * @param ApiResponse $response
     *
     * @throws Exception
     */
    private function handleError(ApiResponse $response)
    {
        $errors = $response->offsetExists('errors') ? $response->getErrors() : [];
        $this->logger->error(
            sprintf("Integration module edit error: %s", $response->getErrorMsg()),
            $errors
        );

        throw new Exception();
    }
}
