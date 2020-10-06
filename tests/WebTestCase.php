<?php

namespace App\Tests;

use App\Entity\Connection;
use App\Repository\ConnectionRepository;

abstract class WebTestCase extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
{
    protected $client;

    /** @var Connection */
    protected $connection;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = static::createClient();
        /** @var ConnectionRepository $repo */
        $repo = static::$container->get(ConnectionRepository::class);
        $this->connection = $repo->findOneBy([]);
    }
}
