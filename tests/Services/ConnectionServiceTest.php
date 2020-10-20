<?php

namespace App\Tests\Services;

use App\Dto\Front\Connection;
use App\Services\ConnectionService;
use App\Services\ServientregaService;
use App\Servientrega\RestType\LoginResponse;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use DateTimeImmutable;

class ConnectionServiceTest extends \App\Tests\WebTestCase
{
    public function testCreateConnection()
    {
        $dtoConnection = new Connection();
        $dtoConnection->crmUrl = 'https://test2.retailcrm.es';
        $dtoConnection->apiKey = 'test_api_key';
        $dtoConnection->servientregaLogin = '';
        $dtoConnection->servientregaPassword = '';
        $dtoConnection->servientregaBillingCode = '';
        $dtoConnection->servientregaNamePack = '';

        /** @var \App\Entity\Connection $connection */
        $connection = static::$container->get(ConnectionService::class)->createConnection($dtoConnection);

        static::assertEquals($dtoConnection->crmUrl, $connection->getCrmUrl());
        static::assertFalse($connection->isActive());
        static::assertNotEmpty($connection->getClientId());
    }

    public function testSaveConnection()
    {
        $dtoConnection = new Connection();
        $dtoConnection->crmUrl = 'https://test2.retailcrm.es';
        $dtoConnection->apiKey = 'test_api_key';

        $connection = new \App\Entity\Connection();

        static::$container->get(ConnectionService::class)->saveConnection($connection, $dtoConnection);

        static::assertEquals($dtoConnection->crmUrl, $connection->getCrmUrl());
        static::assertEquals($dtoConnection->apiKey, $connection->getCrmApiKey());
    }

    public function testAddAccountData()
    {
        $dtoConnection = new Connection();
        $dtoConnection->servientregaLogin = 'test';
        $dtoConnection->servientregaPassword = 'test';
        $dtoConnection->servientregaBillingCode = 'test';
        $dtoConnection->servientregaNamePack = 'test';

        $connection = new \App\Entity\Connection();

        static::$container->get(ConnectionService::class)->addAccountData($dtoConnection, $connection);

        static::assertEquals($dtoConnection->servientregaLogin, $connection->getServientregaLogin());
        static::assertNotEmpty($connection->getServientregaPassword());
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

    public function testGetConnections()
    {
        $result = static::$container->get(ConnectionService::class)->getConnections();

        static::assertNotEmpty($result);
        static::assertInstanceOf(\App\Entity\Connection::class, $result[0]);
    }
}
