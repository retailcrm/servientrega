<?php

namespace App\Services;

use App\Dto\Retailcrm\IntegrationModule;
use App\Entity\Connection;
use App\Factory\RetailcrmClientFactory;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

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
     * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
     * @throws \Exception
     */
    public function integrationModule(Connection $connection, IntegrationModule $configuration)
    {
        $response = $this->retailcrmClientFactory->create($connection)->request->integrationModulesEdit(
            $this->serializer->normalize($configuration)
        );

        if (!$response->isSuccessful()) {
            $errors = $response->offsetExists('errors') ? $response->getErrors() : [];
            $this->logger->error(
                sprintf("Integration module edit error: %s", $response->getErrorMsg()),
                $errors
            );

            throw new \Exception();
        }
    }
}
