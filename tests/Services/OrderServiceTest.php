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

    public function testGetStickers()
    {
        /** @var OrderService $orderService */
        $orderService = static::$container->get(OrderService::class);

        $orderService->createOrder($this->connection, 111, '111222333', base64_encode('sticker'));

        $stickers = $orderService->getStickers($this->connection, ['111222333']);

        static::assertNotEmpty($stickers);
        static::assertEquals('sticker', $stickers[0]);
    }
}
