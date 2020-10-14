<?php

namespace App\Services;

use App\Entity\Connection;
use App\Entity\Order;
use App\Repository\OrderRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class OrderService
 *
 * @package App\Services
 */
class OrderService
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var OrderRepository
     */
    private $orderRepository;

    public function __construct(EntityManagerInterface $entityManager, OrderRepository $orderRepository)
    {
        $this->entityManager = $entityManager;
        $this->orderRepository = $orderRepository;
    }

    /**
     * @param Connection $connection
     * @param int $orderId
     * @param string $track
     */
    public function createOrder(Connection $connection, int $orderId, string $track): void
    {
        $order = new Order();
        $order->setConnection($connection);
        $order->setIsClosed(false);
        $order->setOrderId($orderId);
        $order->setTrackNumber($track);

        $this->entityManager->persist($order);
        $this->entityManager->flush();
    }

    /**
     * @param Connection $connection
     *
     * @return Order[]
     */
    public function getActiveOrders(Connection $connection): array
    {
        return $this->orderRepository->findBy(['connection' => $connection, 'isClosed' => false]);
    }

    /**
     * @param Connection $connection
     * @param string $trackNumber
     * @param string $status
     * @param string $orderId
     *
     * @return void
     */
    public function closeOrderIfNeed(Connection $connection, string $trackNumber, string $orderId, string $status): void
    {
        if ($status === "3") {
            $this->orderRepository->untrackOrder($connection, $trackNumber, $orderId);
        }
    }
}
