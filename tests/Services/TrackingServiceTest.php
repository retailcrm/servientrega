<?php

namespace App\Tests\Services;

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
