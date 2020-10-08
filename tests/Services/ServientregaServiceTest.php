<?php

namespace App\Tests\Services;

use App\Factory\ServientregaRestClientFactory;
use App\Factory\ServientregaSoapClientFactory;
use App\Services\ServientregaService;
use App\Servientrega\RestType\LoginRequest;
use App\Servientrega\RestType\LoginResponse;
use App\Servientrega\ServientregaClient;
use App\Servientrega\ServientregaRestClient;
use App\Servientrega\Type\EncriptarContrasenaResponse;
use App\Tests\WebTestCase;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\NullLogger;
use Symfony\Contracts\Translation\TranslatorInterface;
use DateTimeImmutable;

class ServientregaServiceTest extends WebTestCase
{
    public function testEncryptPassword()
    {
        $soapFactory = $this->createMock(ServientregaSoapClientFactory::class);
        $restFactory = $this->createMock(ServientregaRestClientFactory::class);
        $em = $this->createMock(EntityManagerInterface::class);
        $trans = $this->createMock(TranslatorInterface::class);

        $soapClient = $this->createMock(ServientregaClient::class);
        $soapClient->method('encriptarContrasena')->willReturn(
            (new EncriptarContrasenaResponse())->withEncriptarContrasenaResult('test_encrypt')
        );

        $soapFactory->method('factory')->willReturn($soapClient);

        $service = new ServientregaService($soapFactory, $restFactory, $em, $trans, new NullLogger());

        $result = $service->encryptPassword('test');

        static::assertEquals('test_encrypt', $result);
    }

    public function testGetToken()
    {
        $soapFactory = $this->createMock(ServientregaSoapClientFactory::class);
        $restFactory = $this->createMock(ServientregaRestClientFactory::class);
        $em = $this->createMock(EntityManagerInterface::class);
        $trans = $this->createMock(TranslatorInterface::class);

        $loginResponse = new LoginResponse();
        $loginResponse->login = 'test';
        $loginResponse->nombre = 'test';
        $loginResponse->idCliente = 'test';
        $loginResponse->estado = false;
        $loginResponse->token = 'test';
        $loginResponse->codFacturacion = 'test';
        $loginResponse->expiration = new DateTimeImmutable();

        $restClient = $this->createMock(ServientregaRestClient::class);
        $restClient->method('authenticationLogin')->willReturn(
            $loginResponse
        );

        $restFactory->method('factory')->willReturn($restClient);

        $service = new ServientregaService($soapFactory, $restFactory, $em, $trans, new NullLogger());

        $result = $service->getToken(new LoginRequest());

        static::assertNotEmpty($result);
    }
}
