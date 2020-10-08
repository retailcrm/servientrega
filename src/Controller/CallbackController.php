<?php

namespace App\Controller;

use App\Dto\Callback\Activity;
use App\Dto\Retailcrm\CalculateRequest;
use App\Dto\Retailcrm\SaveRequest;
use App\Entity\Connection;
use App\Services\ActivityService;
use App\Services\OrderService;
use App\Services\ServientregaService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class CallbackController
 *
 * @Route("/callback")
 *
 * @package App\Controller
 */
class CallbackController extends AbstractController
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var ServientregaService
     */
    private $servientregaService;

    public function __construct(SerializerInterface $serializer, ServientregaService $servientregaService)
    {
        $this->serializer = $serializer;
        $this->servientregaService = $servientregaService;
    }

    /**
     * @param CalculateRequest $calculateRequest
     *
     * @Route("/calculate", methods={"POST"})
     *
     * @return Response
     */
    public function calculate(CalculateRequest $calculateRequest): Response
    {
        /** @var Connection $user */
        $user = $this->getUser();

        try {
            $calculateResponse = $this->servientregaService->calculate($calculateRequest, $user);
        } catch (\Throwable $exception) {
            return new JsonResponse(['success' => false]);
        }

        return new JsonResponse(['success' => true, 'result' => $calculateResponse]);
    }

    /**
     * @param OrderService $orderService
     * @param SaveRequest $saveRequest
     *
     * @Route("/save")
     *
     * @return Response
     */
    public function save(OrderService $orderService, SaveRequest $saveRequest): Response
    {
        if (!empty($saveRequest->deliveryId)) {
            return new JsonResponse(
                ['success' => true, 'result' => ['deliveryId' => $saveRequest->deliveryId]]
            );
        }

        /** @var Connection $user */
        $user = $this->getUser();

        try {
            $response = $this->servientregaService->createDelivery($saveRequest, $user);
        } catch (\Throwable $exception) {
            return new JsonResponse(['success' => false]);
        }

        $track = $response->getEnvios()->getCargueMasivoExternoDTO()->getObjEnvios()->getEnviosExterno()->getNum_Guia();

        $orderService->createOrder($user, (int)$saveRequest->order, $track);

        $result = [
            'deliveryId' => $track
        ];

        return new JsonResponse(['success' => true, 'result' => $result]);
    }

    /**
     * @param Request $request
     *
     * @Route("/shipment_save")
     *
     * @return Response
     */
    public function shipmentSave(Request $request): Response
    {
        return new JsonResponse();
    }

    /**
     * @param Request $request
     *
     * @Route("/print")
     *
     * @return Response
     */
    public function print(Request $request): Response
    {
        return new JsonResponse();
    }

    /**
     * @param Request $request
     *
     * @Route("/delete")
     *
     * @return Response
     */
    public function delete(Request $request): Response
    {
        return new JsonResponse(['success' => true]);
    }

    /**
     * @param Request $request
     * @param ActivityService $activityService
     *
     * @Route("/activity", methods={"POST"})
     *
     * @return Response
     */
    public function activity(Request $request, ActivityService $activityService): Response
    {
        $activityData = $request->request->get('activity');
        /** @var Activity $activity */
        $activity = $this->serializer->deserialize($activityData, Activity::class, 'json');

        $result = $activityService->handleActivity($activity, $request->request->get('systemUrl'));

        return new JsonResponse(['success' => $result]);
    }
}
