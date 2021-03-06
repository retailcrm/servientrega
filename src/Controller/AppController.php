<?php

namespace App\Controller;

use App\Entity\Connection;
use App\Services\ConnectionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AppController
 */
class AppController extends AbstractController
{
    /**
     * @Route("/{vueRouting}", name="index", requirements={"vueRouting"="^(?!api|login|callback|_(profiler|wdt)).*"})
     */
    public function index(): Response
    {
        return $this->render('base.html.twig');
    }

    /**
     * @Route("/login", name="settings", methods={"POST"})
     */
    public function settings(Request $request, ConnectionService $connectionService): Response
    {
        /** @var Connection $user */
        $user = $this->getUser();
        $connectionService->auth($user);

        return $this->redirect('/settings/connection');
    }
}
