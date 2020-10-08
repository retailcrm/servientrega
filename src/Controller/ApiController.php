<?php

namespace App\Controller;

use App\Dto\Front\Connection;
use App\Services\ConnectionService;
use App\Services\RetailcrmService;
use App\Utils\ConfigurationBuilder;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ApiController
 *
 * @Route("/api")
 *
 * @package App\Controller
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
     *
     * @param ConnectionService $connectionService
     * @param Connection $connection
     * @param RetailcrmService $retailcrmService
     * @param ConfigurationBuilder $configurationBuilder
     *
     * @return Response
     */
    public function create(
        ConnectionService $connectionService,
        Connection $connection,
        RetailcrmService $retailcrmService,
        ConfigurationBuilder $configurationBuilder
    ): Response {
        $conn = $connectionService->createConnection($connection);
        $token = $connectionService->createToken($conn);

        if (null !== $token) {
            $conn->setToken($token);
        }

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
     * @Route("/connection", name="connection_get", options={"expose": true})
     *
     * @param Request $request
     *
     * @return Response
     */
    public function getConnection(Request $request): Response
    {
        /** @var \App\Entity\Connection $user */
        $user = $this->getUser();

        $connection = new Connection();
        $connection->crmUrl = $user->getCrmUrl();
        $connection->apiKey = $user->getCrmApiKey();
        $connection->servientregaLogin = $user->getServientregaLogin();
        $connection->servientregaBillingCode = $user->getServientregaBillingCode();
        $connection->servientregaNamePack = $user->getServientregaNamePack();

        return new JsonResponse($connection);
    }
}
