<?php

namespace App\Tests\Controller;

use App\Dto\Retailcrm\CalculateRequest;
use App\Dto\Retailcrm\DeliveryAddress;
use App\Dto\Retailcrm\Package;
use App\Factory\ServientregaRestClientFactory;
use App\Factory\ServientregaSoapClientFactory;
use App\Repository\ConnectionRepository;
use App\Servientrega\RestType\CalculateResponse;
use App\Servientrega\ServientregaClient;
use App\Servientrega\ServientregaRestClient;
use App\Servientrega\Type\GenerarGuiaStickerResponse;
use App\Tests\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class CallbackControllerTest extends WebTestCase
{
    public function testActivity()
    {
        $this->client->request(
            'POST',
            '/callback/activity',
            [
                'clientId' => $this->connection->getClientId(),
                'systemUrl' => $this->connection->getCrmUrl(),
                'activity' => '{"active": false, "freeze": false}'
            ]
        );

        static::assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());

        $data = json_decode($this->client->getResponse()->getContent(), true);

        static::assertEquals(true, $data['success']);

        $connection = static::$container->get(ConnectionRepository::class)
            ->findOneBy(['clientId' => $this->connection->getClientId()]);

        static::assertEquals(false, $connection->isActive());
    }

    public function testCalculate()
    {
        $calculateResponse = new CalculateResponse();
        $calculateResponse->ValorTotal = 100;
        $calculateResponse->ValorFlete = 100;
        $calculateResponse->ValorSobreFlete = 100;

        $restClient = $this->createMock(ServientregaRestClient::class);
        $restClient->method('calculate')->willReturn($calculateResponse);

        $restClientFactory = $this->createMock(ServientregaRestClientFactory::class);
        $restClientFactory->method('factory')->willReturn($restClient);

        $this->client->getContainer()->set(ServientregaRestClientFactory::class, $restClientFactory);

        $this->client->request(
            'POST',
            '/callback/calculate',
            [
                'clientId' => $this->connection->getClientId(),
                'calculate' => json_encode($this->getCalculateData())
            ]
        );

        $data = json_decode($this->client->getResponse()->getContent(), true);

        static::assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
        static::assertTrue($data['success']);
        static::assertNotEmpty($data['result']);
    }

    private function getCalculateData(): CalculateRequest
    {
        $calculateRequest = new CalculateRequest();
        $package = new Package();
        $package->height = 100;
        $package->width = 100;
        $package->length = 100;
        $package->weight = 100;

        $calculateRequest->packages = [$package];
        $calculateRequest->declaredValue = 500;

        $shipmentAddress = new DeliveryAddress();
        $deliveryAddress = new DeliveryAddress();
        $shipmentAddress->index = '123456';
        $deliveryAddress->index = '654321';

        $calculateRequest->shipmentAddress = $shipmentAddress;
        $calculateRequest->deliveryAddress = $deliveryAddress;

        return $calculateRequest;
    }

    public function testPrintStickers()
    {
        $pdf = new \TCPDI();
        $pdf->AddPage();
        $pdf->SetFont('symbol','B',16);
        $pdf->Cell(40,10,'Hello World!');
        $output = $pdf->Output('doc.pdf', 'S');

        $client = $this->createMock(ServientregaClient::class);
        $client->method('generarGuiaSticker')->willReturnOnConsecutiveCalls(
            (new GenerarGuiaStickerResponse())->withGenerarGuiaStickerResult(true)
                ->withBytesReport(
                    base64_encode($output)
                ),
            (new GenerarGuiaStickerResponse())->withGenerarGuiaStickerResult(true)
                ->withBytesReport(
                    base64_encode($output)
                )
        );

        $soapClientFactory = $this->createMock(ServientregaSoapClientFactory::class);
        $soapClientFactory->method('factory')->willReturn($client);

        $this->client->getContainer()->set(ServientregaSoapClientFactory::class, $soapClientFactory);

        $this->client->request(
            'POST',
            '/callback/print',
            [
                'clientId' => $this->connection->getClientId(),
                'print' => '{"entityType": "order", "type": "sticker", "deliveryIds": [["1", "2"]]}'
            ]
        );

        static::assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
        static::assertNotEmpty($this->client->getResponse()->getContent());
        static::assertEquals('application/pdf', $this->client->getResponse()->headers->all('Content-Type')[0]);
    }

    public function testPrintSticker()
    {
        $pdf = new \TCPDI();
        $pdf->AddPage();
        $pdf->SetFont('symbol','B',16);
        $pdf->Cell(40,10,'Hello World!');
        $output = $pdf->Output('doc.pdf', 'S');

        $client = $this->createMock(ServientregaClient::class);
        $client->method('generarGuiaSticker')->willReturnOnConsecutiveCalls(
            (new GenerarGuiaStickerResponse())->withGenerarGuiaStickerResult(true)
                ->withBytesReport(
                    base64_encode($output)
                )
        );

        $soapClientFactory = $this->createMock(ServientregaSoapClientFactory::class);
        $soapClientFactory->method('factory')->willReturn($client);

        $this->client->getContainer()->set(ServientregaSoapClientFactory::class, $soapClientFactory);

        $this->client->request(
            'POST',
            '/callback/print',
            [
                'clientId' => $this->connection->getClientId(),
                'print' => '{"entityType": "order", "type": "sticker", "deliveryIds": [["1"]]}'
            ]
        );

        static::assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
        static::assertEquals($output, $this->client->getResponse()->getContent());
        static::assertEquals('application/pdf', $this->client->getResponse()->headers->all('Content-Type')[0]);
    }
}
