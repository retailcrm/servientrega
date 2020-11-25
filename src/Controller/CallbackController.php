<?php

namespace App\Controller;

use App\Dto\Callback\Activity;
use App\Dto\Retailcrm\CalculateRequest;
use App\Dto\Retailcrm\PrintRequest;
use App\Dto\Retailcrm\SaveRequest;
use App\Entity\Connection;
use App\Services\ActivityService;
use App\Services\OrderService;
use App\Services\PrintService;
use App\Services\ServientregaService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Throwable;

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

    /**
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * CallbackController constructor.
     *
     * @param SerializerInterface $serializer
     * @param ServientregaService $servientregaService
     * @param TranslatorInterface $translator
     * @param LoggerInterface $logger
     */
    public function __construct(
        SerializerInterface $serializer,
        ServientregaService $servientregaService,
        TranslatorInterface $translator,
        LoggerInterface $logger
    ) {
        $this->serializer = $serializer;
        $this->servientregaService = $servientregaService;
        $this->translator = $translator;
        $this->logger = $logger;
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
        } catch (Throwable $exception) {
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
        } catch (Throwable $exception) {
            $this->logger->error($exception->getMessage());

            return new JsonResponse(['success' => false]);
        }

        $track = $response
            ->getEnvios()
            ->getCargueMasivoExternoDTO()[0]
            ->getObjEnvios()
            ->getEnviosExterno()[0]
            ->getNum_Guia()
        ;

        if (!$track) {
            $errorMsg = '';
            foreach ((array) $response->getArrayGuias()->getString() as $error) {
                $errorMsg .= $error . " | ";
            }

            return new JsonResponse(
                ['success' => false, 'errorMsg' => sprintf("Errors: %s", trim($errorMsg, " |"))]
            );
        }

        $orderService->createOrder($user, (int) $saveRequest->order, (string) $track);

        $result = [
            'deliveryId' => $track
        ];

        return new JsonResponse(['success' => true, 'result' => $result]);
    }

    /**
     * @param PrintRequest $printRequest
     * @param PrintService $printService
     *
     * @Route("/print")
     *
     * @return Response
     */
    public function print(PrintRequest $printRequest, PrintService $printService): Response
    {
        $response = '';

        /** @var Connection $user */
        $user = $this->getUser();

        switch ($printRequest->entityType) {
            case PrintRequest::ORDER_TYPE:
                if ('sticker' === $printRequest->type) {
                    if (count($printRequest->deliveryIds[0]) > 1) {
                        $response = $printService->printStickers(
                            $printRequest->deliveryIds[0], $user->getServientregaBillingCode()
                        );
                    } else {
                        $response = $printService->printSticker(
                            $printRequest->deliveryIds[0][0], $user->getServientregaBillingCode()
                        );
                    }
                }

                break;

            case PrintRequest::SHIPMENT_TYPE:
                break;
        }

        if (null === $response) {
            return new JsonResponse([
                'success' => false,
                'errorMsg' => $this->translator->trans('print.error', [], 'servientrega')
            ], 400);
        }

        return new Response(
            $response,
        Response::HTTP_OK,
            ['Content-Type' => 'application/pdf']
        );
    }

    /**
     *
     * @Route("/delete")
     *
     * @return Response
     */
    public function delete(): Response
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
