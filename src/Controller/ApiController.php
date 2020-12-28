<?php

namespace App\Controller;

use App\Dto\Front\Connection;
use App\Services\ConnectionService;
use App\Services\RetailcrmService;
use App\Utils\ConfigurationBuilder;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ApiController
 *
 * @Route("/api")
 */
class ApiController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/connection/create", name="connection_create", options={"expose": true})
     */
    public function create(
        ConnectionService $connectionService,
        RetailcrmService $retailcrmService,
        ConfigurationBuilder $configurationBuilder,
        Connection $connection
    ): Response {
        $conn = $connectionService->createConnection($connection);

        try {
            $module = $configurationBuilder->build($conn);
            $retailcrmService->integrationModule($conn, $module);
        } catch (\Throwable $exception) {
            return new JsonResponse(['success' => false], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $this->entityManager->flush();
        $connectionService->auth($conn);

        return new JsonResponse(['success' => true]);
    }

    /**
     * @Route("/connection/save", name="connection_save", options={"expose": true})
     */
    public function save(
        ConnectionService $connectionService,
        RetailcrmService $retailcrmService,
        ConfigurationBuilder $configurationBuilder,
        Connection $request
    ): Response {
        /** @var \App\Entity\Connection $connection */
        $connection = $this->getUser();
        $connectionService->saveConnection($connection, $request);

        try {
            $module = $configurationBuilder->build($connection);
            $retailcrmService->integrationModule($connection, $module);
        } catch (\Throwable $exception) {
            return new JsonResponse(['success' => false], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $this->entityManager->flush();

        return new JsonResponse(['success' => true]);
    }

    /**
     * @Route("/connection/account/save", name="account_save", options={"expose": true})
     */
    public function saveAccount(
        ConnectionService $connectionService,
        RetailcrmService $retailcrmService,
        ConfigurationBuilder $configurationBuilder,
        Connection $request
    ): Response {
        /** @var \App\Entity\Connection $connection */
        $connection = $this->getUser();
        $token      = $connectionService->createToken($connection);

        if (null !== $token) {
            $connection->setToken($token);
        }

        if (!$connection->isActive()) {
            $connection->setIsActive(true);

            try {
                $module = $configurationBuilder->build($connection);
                $retailcrmService->integrationModule($connection, $module);
            } catch (\Throwable $exception) {
                return new JsonResponse(['success' => false], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }

        $connectionService->addAccountData($request, $connection);

        $this->entityManager->persist($connection);
        $this->entityManager->flush();

        $request->servientregaPassword = $connection->getServientregaPassword();

        return new JsonResponse(['connection' => $request]);
    }

    /**
     * @Route("/connection", name="connection_get", options={"expose": true})
     */
    public function getConnection(): Response
    {
        /** @var \App\Entity\Connection $user */
        $user = $this->getUser();

        $connection                          = new Connection();
        $connection->crmUrl                  = $user->getCrmUrl();
        $connection->apiKey                  = $user->getCrmApiKey();
        $connection->servientregaLogin       = $user->getServientregaLogin();
        $connection->servientregaPassword    = $user->getServientregaPassword();
        $connection->servientregaBillingCode = $user->getServientregaBillingCode();
        $connection->servientregaNamePack    = $user->getServientregaNamePack();
        $connection->idDaneOriginCity        = $user->getIdDaneOriginCity();

        return new JsonResponse($connection);
    }
}
