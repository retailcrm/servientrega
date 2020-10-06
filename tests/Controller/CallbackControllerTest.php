<?php

namespace App\Tests\Controller;

use App\Repository\ConnectionRepository;
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
}
