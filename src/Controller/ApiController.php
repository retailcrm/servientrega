<?php

namespace App\Controller;

use App\Dto\Front\Connection;
use App\Services\ConnectionService;
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
     * @Route("/connection/create", name="connection_create", options={"expose": true})
     *
     * @param ConnectionService $connectionService
     * @param Connection $connection
     *
     * @return Response
     */
    public function create(ConnectionService $connectionService, Connection $connection): Response
    {
        $conn = $connectionService->create($connection);
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
//        $connection->servientregaPassword = $user->getServientregaPassword();
        $connection->servientregaBillingCode = $user->getServientregaBillingCode();
        $connection->servientregaNamePack = $user->getServientregaNamePack();

        return new JsonResponse($connection);
    }
}
