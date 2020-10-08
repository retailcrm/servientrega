<?php

namespace App\Tests\Services;

use App\Services\OrderService;
use App\Tests\WebTestCase;

class OrderServiceTest extends WebTestCase
{
    public function testCreateOrder()
    {
        /** @var OrderService $orderService */
        $orderService = static::$container->get(OrderService::class);

        $orderService->createOrder($this->connection, 1, 'track');
        $orders = $orderService->getActiveOrders($this->connection);

        static::assertNotEmpty($orders);
    }
}
