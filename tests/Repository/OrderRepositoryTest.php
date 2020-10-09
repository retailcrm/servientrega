<?php

namespace App\Tests\Repository;

use App\Entity\Order;
use App\Repository\OrderRepository;
use App\Tests\WebTestCase;
use Doctrine\ORM\EntityManagerInterface;

class OrderRepositoryTest extends WebTestCase
{
    public function testUntrackOrder()
    {
        $orderRepository = static::$container->get(OrderRepository::class);
        $entityManager = static::$container->get(EntityManagerInterface::class);

        $order = new Order();
        $order
            ->setTrackNumber('123')
            ->setOrderId('123')
            ->setIsClosed(false)
            ->setConnection($this->connection);

        $entityManager->persist($order);
        $entityManager->flush();

        $orderRepository->untrackOrder($this->connection, '123', '123');

        $entityManager->clear();

        $result = $orderRepository->find($order->getId());

        static::assertTrue($result->isClosed());
    }
}
