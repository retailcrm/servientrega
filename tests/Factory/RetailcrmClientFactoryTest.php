<?php

namespace App\Tests\Factory;

use App\Entity\Connection;
use App\Factory\RetailcrmClientFactory;
use PHPUnit\Framework\TestCase;
use RetailCrm\ApiClient;
use Symfony\Component\Security\Core\Security;

class RetailcrmClientFactoryTest extends TestCase
{
    public function testCreate()
    {
        $securityMock = $this->createMock(Security::class);
        $securityMock
            ->method('getUser')
            ->willReturn(
                (new Connection())->setCrmUrl('https://test.retailcrm.es')
                ->setCrmApiKey('test_key')
            );

        $client = (new RetailcrmClientFactory($securityMock))->create();

        static::assertInstanceOf(ApiClient::class, $client);
    }
}
