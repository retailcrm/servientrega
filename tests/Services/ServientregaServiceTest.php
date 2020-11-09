<?php

namespace App\Tests\Services;

use App\Dto\Retailcrm\CalculateRequest;
use App\Dto\Retailcrm\DeliveryAddress;
use App\Dto\Retailcrm\Package;
use App\Entity\Connection;
use App\Entity\Token;
use App\Factory\ServientregaRestClientFactory;
use App\Factory\ServientregaSoapClientFactory;
use App\Services\ServientregaService;
use App\Servientrega\RestType\CalculateResponse;
use App\Servientrega\RestType\LoginRequest;
use App\Servientrega\RestType\LoginResponse;
use App\Servientrega\ServientregaClient;
use App\Servientrega\ServientregaRestClient;
use App\Servientrega\Type\EncriptarContrasenaResponse;
use App\Servientrega\Type\GenerarGuiaStickerResponse;
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

    public function testGetSticker()
    {
        $soapFactory = $this->createMock(ServientregaSoapClientFactory::class);
        $restFactory = $this->createMock(ServientregaRestClientFactory::class);
        $em = $this->createMock(EntityManagerInterface::class);
        $trans = $this->createMock(TranslatorInterface::class);

        $pdf = new \TCPDI();
        $pdf->AddPage();
        $pdf->SetFont('symbol','B',16);
        $pdf->Cell(40,10,'Hello World!');
        $output = $pdf->Output('doc.pdf', 'S');

        $soapClient = $this->createMock(ServientregaClient::class);
        $soapClient->method('generarGuiaSticker')->willReturn(
            (new GenerarGuiaStickerResponse())->withGenerarGuiaStickerResult(true)
            ->withBytesReport(base64_encode($output))
        );

        $soapFactory->method('factory')->willReturn($soapClient);

        $service = new ServientregaService($soapFactory, $restFactory, $em, $trans, new NullLogger());

        $result = $service->getSticker('123');

        static::assertEquals($output, $result);
    }

    public function testGetStickerFail()
    {
        $soapFactory = $this->createMock(ServientregaSoapClientFactory::class);
        $restFactory = $this->createMock(ServientregaRestClientFactory::class);
        $em = $this->createMock(EntityManagerInterface::class);
        $trans = $this->createMock(TranslatorInterface::class);

        $soapClient = $this->createMock(ServientregaClient::class);
        $soapClient->method('generarGuiaSticker')->willReturn(
            (new GenerarGuiaStickerResponse())->withGenerarGuiaStickerResult(false)
        );

        $soapFactory->method('factory')->willReturn($soapClient);

        $service = new ServientregaService($soapFactory, $restFactory, $em, $trans, new NullLogger());

        $result = $service->getSticker('123');

        static::assertEquals(null, $result);
    }

    public function testCalculate()
    {
        $response = new CalculateResponse();
        $response->ValorFlete = 50;
        $response->ValorSobreFlete = 50;
        $response->ValorTotal = 100;

        $client = $this->createMock(ServientregaRestClient::class);
        $client->method('calculate')->willReturn($response);

        $soapFactory = $this->createMock(ServientregaSoapClientFactory::class);
        $restFactory = $this->createMock(ServientregaRestClientFactory::class);
        $restFactory->method('factory')->willReturn($client);

        $em = $this->createMock(EntityManagerInterface::class);
        $trans = $this->createMock(TranslatorInterface::class);

        $service = new ServientregaService($soapFactory, $restFactory, $em, $trans, new NullLogger());

        $connection = (new Connection())->setToken(
            (new Token())->setToken('123')->setExpiration((new DateTimeImmutable())->modify('+24 hours'))
        );

        $request = new CalculateRequest();
        $request->packages = [
            new Package()
        ];

        $address = new DeliveryAddress();
        $address->index = 111111;

        $request->declaredValue = 100;
        $request->shipmentAddress = $address;
        $request->deliveryAddress = $address;
        $request->extraData = [
            'NumRecaudo' => 123456
        ];

        $result = $service->calculate($request, $connection);

        static::assertNotEmpty($result);
        static::assertInstanceOf(\App\Dto\Retailcrm\CalculateResponse::class, $result[0]);
        static::assertEquals(100, $result[0]->cost);
    }
}
