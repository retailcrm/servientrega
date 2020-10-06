<?php

namespace App\Controller;

use App\Dto\Callback\Activity;
use App\Services\ActivityService;
use App\Services\ServientregaService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class CallbackController
 *
 * @Route("/callback")
 *
 * @package App\Controller
 */
class CallbackController
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
     * @param Request $request
     *
     * @Route("/calculate")
     *
     * @return Response
     */
    public function calculate(Request $request): Response
    {
        return new JsonResponse();
    }

    /**
     * @param Request $request
     *
     * @Route("/save")
     *
     * @return Response
     */
    public function save(Request $request): Response
    {
        return new JsonResponse();
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
     * @Route("/shipment_point_list")
     *
     * @return Response
     */
    public function shipmentPointList(Request $request): Response
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
