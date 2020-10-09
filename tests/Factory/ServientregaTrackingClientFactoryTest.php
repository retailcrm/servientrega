<?php

namespace App\Tests\Factory;

use App\Factory\ServientregaTrackingClientFactory;
use App\Servientrega\ServientregaTrackingClient;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\SerializerInterface;

class ServientregaTrackingClientFactoryTest extends TestCase
{
    public function testFactory()
    {
        $serializer = $this->createMock(SerializerInterface::class);

        $client = (new ServientregaTrackingClientFactory($serializer))->factory();

        static::assertInstanceOf(ServientregaTrackingClient::class, $client);
    }
}
