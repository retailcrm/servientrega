<?php

namespace App\Controller;

use App\Dto\Callback\Activity;
use App\Dto\Retailcrm\CalculateRequest;
use App\Dto\Retailcrm\Delivery;
use App\Dto\Retailcrm\DeliveryAddress;
use App\Dto\Retailcrm\PrintRequest;
use App\Dto\Retailcrm\SaveRequest;
use App\Entity\Connection;
use App\Factory\ServientregaTrackingClientFactory;
use App\Repository\OrderRepository;
use App\Services\ActivityService;
use App\Services\OrderService;
use App\Services\PrintService;
use App\Services\ServientregaService;
use App\Servientrega\Exceptions\ClientException;
use App\Servientrega\TrackingType\GuiasDTO;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Class CallbackController
 *
 * @Route("/callback")
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
     */
    public function __construct(
        SerializerInterface $serializer,
        ServientregaService $servientregaService,
        TranslatorInterface $translator,
        LoggerInterface $logger
    ) {
        $this->serializer          = $serializer;
        $this->servientregaService = $servientregaService;
        $this->translator          = $translator;
        $this->logger              = $logger;
    }

    /**
     * @Route("/calculate", methods={"POST"})
     */
    public function calculate(CalculateRequest $calculateRequest): Response
    {
        /** @var Connection $user */
        $user = $this->getUser();

        try {
            $calculateResponse = $this->servientregaService->calculate($calculateRequest, $user);
        } catch (\Throwable $exception) {
            $errorMsg = '';
            if ($exception instanceof ClientException) {
                foreach ($exception->getResponse()->ModelState as $item) {
                    foreach ($item as $error) {
                        $errorMsg .= $error . ', ';
                    }
                }
            }

            return new JsonResponse(['success' => false, 'errorMsg' => trim($errorMsg, ', ')]);
        }

        return new JsonResponse(['success' => true, 'result' => $calculateResponse]);
    }

    /**
     * @Route("/save")
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
                $errorMsg .= $error . ' | ';
            }

            return new JsonResponse(
                ['success' => false, 'errorMsg' => trim($errorMsg, ' |')]
            );
        }

        $orderService->createOrder(
            $user,
            (int) $saveRequest->order,
            (string) $track,
            $this->servientregaService->getSticker($track, $user->getServientregaBillingCode())
        );

        $result = [
            'deliveryId' => $track,
        ];

        return new JsonResponse(['success' => true, 'result' => $result]);
    }

    /**
     * @Route("/print")
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
                        $response = $printService->printStickers($user, $printRequest->deliveryIds[0]);
                    } else {
                        $response = $printService->printSticker($user, $printRequest->deliveryIds[0][0]);
                    }
                }

                break;

            case PrintRequest::SHIPMENT_TYPE:
                break;
        }

        if (null === $response) {
            return new JsonResponse([
                'success'  => false,
                'errorMsg' => $this->translator->trans('print.error', [], 'servientrega'),
            ], 400);
        }

        return new Response(
            $response,
        Response::HTTP_OK,
            ['Content-Type' => 'application/pdf']
        );
    }

    /**
     * @Route("/delete")
     */
    public function delete(): Response
    {
        return new JsonResponse(['success' => true]);
    }

    /**
     * @Route("/activity", methods={"POST"})
     */
    public function activity(Request $request, ActivityService $activityService): Response
    {
        $activityData = $request->request->get('activity');
        /** @var Activity $activity */
        $activity = $this->serializer->deserialize($activityData, Activity::class, 'json');

        $result = $activityService->handleActivity($activity, $request->request->get('systemUrl'));

        return new JsonResponse(['success' => $result]);
    }

    /**
     * @Route(path="/delivery",methods={"GET"})
     *
     * @throws GuzzleException
     */
    public function getDelivery(
        Request $request,
        OrderRepository $repository,
        ServientregaTrackingClientFactory $factory
    ): JsonResponse {
        if (empty($deliveryId = $request->query->get('deliveryId'))) {
            return $this->json([
                'success'  => false,
                'errorMsg' => $this->translator->trans('deliveryId empty'),
            ], Response::HTTP_BAD_REQUEST);
        }

        if (($order = $repository->findOneBy(['trackNumber' => $deliveryId])) === null) {
            return $this->json([
                'success'  => false,
                'errorMsg' => $this->translator->trans('Not found order'),
            ], Response::HTTP_NOT_FOUND);
        }

        /** @var Connection $connection */
        $connection = $this->getUser();

        if ($connection->getId() !== $order->getConnection()->getId()) {
            return $this->json([
                'success'  => false,
                'errorMsg' => $this->translator->trans('Order does not belong to an existing integration'),
            ], Response::HTTP_BAD_REQUEST);
        }

        /** @var GuiasDTO|false $data */
        $data = current($factory->factory()->getDeliveryStatus([$deliveryId])->GuiasDTO ?? []);

        return $this->json([
            'success' => $data ? true : false,
            'result'  => $data ? new Delivery(
                $deliveryId,
                $data->FecEnv,
                $data->FecEst,
                DeliveryAddress::create($data->CiuRem, $data->DirRem),
                DeliveryAddress::create($data->CiuRem, $data->DirRem),
            ) : null,
        ], Response::HTTP_OK, [], [ObjectNormalizer::SKIP_NULL_VALUES => true]);
    }
}
