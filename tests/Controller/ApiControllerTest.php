<?php

namespace App\Tests\Controller;

use App\Tests\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ApiControllerTest extends WebTestCase
{
    public function testGetConnection()
    {
        $session = static::$container->get(SessionInterface::class);
        $session->set('clientId', $this->connection->getClientId());
        $this->client->request('GET', '/api/connection');

        static::assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
        static::assertNotEmpty($this->client->getResponse()->getContent());
    }
}
