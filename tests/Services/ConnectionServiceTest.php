<?php

namespace App\Tests\Services;

use App\Dto\Front\Connection;
use App\Services\ConnectionService;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ConnectionServiceTest extends WebTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        static::bootKernel();
    }

    public function testCreate()
    {
        $dtoConnection = new Connection();
        $dtoConnection->crmUrl = 'https://test2.retailcrm.es';
        $dtoConnection->apiKey = 'test_api_key';
        $dtoConnection->servientregaLogin = 'test';
        $dtoConnection->servientregaPassword = 'test';
        $dtoConnection->servientregaBillingCode = 'test';
        $dtoConnection->servientregaNamePack = 'test';

        /** @var \App\Entity\Connection $connection */
        $connection = static::$container->get(ConnectionService::class)->create($dtoConnection);

        static::assertEquals($dtoConnection->crmUrl, $connection->getCrmUrl());
        static::assertEquals(true, $connection->isActive());
        static::assertNotEmpty($connection->getClientId());
    }
}
