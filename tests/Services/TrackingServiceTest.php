<?php

namespace App\Tests\Services;

use App\Entity\Order;
use App\Factory\ServientregaTrackingClientFactory;
use App\Services\OrderService;
use App\Services\RetailcrmService;
use App\Services\TrackingsService;
use App\Tests\WebTestCase;
use Psr\Log\NullLogger;

class TrackingServiceTest extends WebTestCase
{
    public function testUpdateStatuses()
    {
        $orderService = $this->createMock(OrderService::class);
        $trackingClientFactory = static::$container->get(ServientregaTrackingClientFactory::class);
        $retailcrmService = $this->createMock(RetailcrmService::class);

        $orderService->method('getActiveOrders')->willReturn(
            [
                (new Order())
                    ->setConnection($this->connection)
                    ->setIsClosed(false)
                    ->setOrderId(1)
                    ->setTrackNumber('1')
            ]
        );

        $service = new TrackingsService(
            $orderService,
            $trackingClientFactory,
            $retailcrmService,
            new NullLogger()
        );

        $result = $service->updateStatuses($this->connection);

        static::assertTrue($result);
    }
}
