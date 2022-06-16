<?php

namespace App\Tests\Controller;

use App\Entity\Connection;
use App\Factory\RetailcrmClientFactory;
use App\Services\RegisterService;
use App\Tests\WebTestCase;
use RetailCrm\ApiClient;
use RetailCrm\Client\ApiVersion5;
use RetailCrm\Response\ApiResponse;
use Symfony\Component\HttpFoundation\Response;

class RegisterControllerTest extends WebTestCase
{
    public function testConfig(): void
    {
        $this->client->request('GET', '/api/register');

        self::assertResponseStatusCodeSame(Response::HTTP_OK);
        self::assertNotEmpty($this->client->getResponse()->getContent());
    }

    public function testRegisterInvalidToken(): void
    {
        $this->client->request('POST', '/api/register', [
            'register' => json_encode([
                'token'     => 'invalid',
                'apiKey'    => 'apiKey',
                'systemUrl' => 'systemUrl',
            ], JSON_THROW_ON_ERROR),
        ]);

        self::assertResponseStatusCodeSame(Response::HTTP_UNAUTHORIZED);
        self::assertNotEmpty($this->client->getResponse()->getContent());
        self::assertEquals(json_encode([
            'accountUrl' => null,
            'success'    => false,
            'errorMsg'   => 'Invalid token',
        ]), $this->client->getResponse()->getContent());
    }

    // todo add test for the existing connection

    public function testRegisterFailure(): void
    {
        $response = new ApiResponse(404, json_encode([
            'success'  => false,
            'errorMsg' => 'Wrong "apiKey" value.',
        ]));

        $apiClientRequest = $this->createMock(ApiVersion5::class);
        $apiClientRequest->method('integrationModulesEdit')->willReturn($response);

        $apiClient          = new ApiClient('https://newaccount-5.simla.com', 'newaccount-5');
        $apiClient->request = $apiClientRequest;

        $restClientFactory = $this->createMock(RetailcrmClientFactory::class);
        $restClientFactory->method('create')->willReturn($apiClient);

        $this->client->getContainer()->set(RetailcrmClientFactory::class, $restClientFactory);

        $this->client->request('POST', '/api/register', [
            'register' => json_encode([
                'token'     => $this->generateToken('newaccount-5'),
                'apiKey'    => 'newaccount-5',
                'systemUrl' => 'https://newaccount-5.simla.com',
            ], JSON_THROW_ON_ERROR),
        ]);

        self::assertNull(
            $this->client->getContainer()
                ->get('doctrine.orm.entity_manager')
                ->getRepository(Connection::class)
                ->findOneBy(['crmApiKey' => 'newaccount-5'])
        );
        self::assertResponseStatusCodeSame(Response::HTTP_BAD_REQUEST);
        self::assertEquals(json_encode([
            'accountUrl' => null,
            'success'    => false,
            'errorMsg'   => '',
        ]), $this->client->getResponse()->getContent());
    }

    public function testRegister()
    {
        $response = new ApiResponse(200, json_encode([
            'success' => true,
        ]));

        $apiClientRequest = $this->createMock(ApiVersion5::class);
        $apiClientRequest->method('integrationModulesEdit')->willReturn($response);

        $apiClient          = new ApiClient('https://newaccount.simla.com', 'newaccount');
        $apiClient->request = $apiClientRequest;

        $restClientFactory = $this->createMock(RetailcrmClientFactory::class);
        $restClientFactory->method('create')->willReturn($apiClient);

        $this->client->getContainer()->set(RetailcrmClientFactory::class, $restClientFactory);

        $this->client->request('POST', '/api/register', [
            'register' => json_encode([
                'token'     => $this->generateToken('newaccount'),
                'apiKey'    => 'newaccount',
                'systemUrl' => 'https://newaccount.simla.com',
            ], JSON_THROW_ON_ERROR),
        ]);

        /** @var Connection $newConnection */
        $newConnection = $this->client->getContainer()
            ->get('doctrine.orm.entity_manager')
            ->getRepository(Connection::class)
            ->findOneBy(['crmApiKey' => 'newaccount']);

        self::assertNotNull($newConnection);
        self::assertEquals($newConnection->getCrmUrl(), 'https://newaccount.simla.com');
        self::assertResponseStatusCodeSame(Response::HTTP_CREATED);
        self::assertEquals(json_encode([
            'accountUrl' => $this->getAccountUrl(),
            'success'    => true,
            'errorMsg'   => null,
        ]), $this->client->getResponse()->getContent());
    }

    private function generateToken(string $apiKey): string
    {
        $getEnv = new \ReflectionMethod($this->client->getContainer(), 'getEnv');
        $getEnv->setAccessible(true);

        $secret = $getEnv->invoke($this->client->getContainer(), 'ONE_STEP_CONNECTION_SECRET');

        return hash_hmac('sha256', $apiKey, $secret);
    }

    private function getAccountUrl(): string
    {
        return $this->client->getContainer()->get(RegisterService::class)->getAccountUrl();
    }
}
