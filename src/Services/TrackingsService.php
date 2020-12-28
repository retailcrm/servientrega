<?php

namespace App\Services;

use App\Dto\Retailcrm\TrackingStatusUpdate;
use App\Entity\Connection;
use App\Entity\Order;
use App\Factory\ServientregaTrackingClientFactory;
use App\Utils\DataBuilders;
use Psr\Log\LoggerInterface;

/**
 * Class TrackingsService
 */
class TrackingsService
{
    /**
     * @var OrderService
     */
    private $orderService;

    /**
     * @var ServientregaTrackingClientFactory
     */
    private $trackingClientFactory;

    /**
     * @var RetailcrmService
     */
    private $retailcrmService;

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(
        OrderService $orderService,
        ServientregaTrackingClientFactory $trackingClientFactory,
        RetailcrmService $retailcrmService,
        LoggerInterface $logger
    ) {
        $this->orderService          = $orderService;
        $this->trackingClientFactory = $trackingClientFactory;
        $this->retailcrmService      = $retailcrmService;
        $this->logger                = $logger;
    }

    public function updateStatuses(Connection $connection): bool
    {
        $mapping = [];
        $orders  = $this->orderService->getActiveOrders($connection);
        foreach ($orders as $order) {
            $mapping[$order->getTrackNumber()] = $order->getOrderId();
        }

        $orders = array_chunk($orders, 100);

        foreach ($orders as $orderChunk) {
            try {
                $statuses = $this->handleChunk($orderChunk);
                $this->retailcrmService->deliveryTracking(
                    $connection,
                    $statuses
                );

                foreach ($statuses as $status) {
                    $this->orderService->closeOrderIfNeed(
                        $connection,
                        $status->deliveryId,
                        $mapping[$status->deliveryId],
                        $status->history[0]->code
                    );
                }
            } catch (\Throwable $exception) {
                $this->logger->error(sprintf('Update statuses error: %s', $exception->getMessage()));

                continue;
            }
        }

        return true;
    }

    /**
     * @param Order[] $orders
     *
     * @return TrackingStatusUpdate[]
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function handleChunk(array $orders): array
    {
        $trackNumbers = [];

        foreach ($orders as $order) {
            $trackNumbers[] = $order->getTrackNumber();
        }

        $response = $this->trackingClientFactory->factory()->getDeliveryStatus($trackNumbers);

        return DataBuilders::buildTrackingStatus($response);
    }
}
