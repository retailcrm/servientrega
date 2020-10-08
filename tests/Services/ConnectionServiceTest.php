<?php

namespace App\Tests\Services;

use App\Dto\Front\Connection;
use App\Services\ConnectionService;
use App\Services\ServientregaService;
use App\Servientrega\RestType\LoginResponse;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use DateTimeImmutable;

class ConnectionServiceTest extends WebTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        static::bootKernel();
    }

    public function testCreateConnection()
    {
        $dtoConnection = new Connection();
        $dtoConnection->crmUrl = 'https://test2.retailcrm.es';
        $dtoConnection->apiKey = 'test_api_key';
        $dtoConnection->servientregaLogin = 'test';
        $dtoConnection->servientregaPassword = 'test';
        $dtoConnection->servientregaBillingCode = 'test';
        $dtoConnection->servientregaNamePack = 'test';

        /** @var \App\Entity\Connection $connection */
        $connection = static::$container->get(ConnectionService::class)->createConnection($dtoConnection);

        static::assertEquals($dtoConnection->crmUrl, $connection->getCrmUrl());
        static::assertEquals(true, $connection->isActive());
        static::assertNotEmpty($connection->getClientId());
    }

    public function testCreateToken()
    {
        $em = $this->createMock(EntityManagerInterface::class);
        $session = $this->createMock(SessionInterface::class);
        $servientrega = $this->createMock(ServientregaService::class);

        $loginResponse = new LoginResponse();
        $loginResponse->login = 'test';
        $loginResponse->nombre = 'test';
        $loginResponse->idCliente = 'test';
        $loginResponse->estado = false;
        $loginResponse->token = 'test';
        $loginResponse->codFacturacion = 'test';
        $loginResponse->expiration = new DateTimeImmutable();

        $servientrega->method('getToken')->willReturnOnConsecutiveCalls($loginResponse, null);

        $connection = (new \App\Entity\Connection())->setServientregaLogin('test')
            ->setServientregaPassword('test')
            ->setServientregaBillingCode('test');

        $service = new ConnectionService($em, $session, $servientrega);
        $token = $service->createToken($connection);

        static::assertNotEmpty($token);
        static::assertEquals($loginResponse->expiration, $token->getExpiration());
        static::assertEquals($loginResponse->token, $token->getToken());

        $token = $service->createToken($connection);

        static::assertNull($token);
    }
}
