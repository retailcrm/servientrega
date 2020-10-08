<?php

namespace App\Tests\Factory;

use App\Entity\Connection;
use App\Entity\Token;
use App\Factory\ServientregaRestClientFactory;
use App\Servientrega\ServientregaRestClient;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Security\Core\Security;

class ServientregaRestClientFactoryTest extends TestCase
{
    public function testFactory()
    {
        $securityMock = $this->createMock(Security::class);
        $securityMock
            ->method('getUser')
            ->willReturn(
                (new Connection())
                    ->setToken((new Token())->setToken('test'))
            );

        $client = (new ServientregaRestClientFactory($securityMock))->factory();

        static::assertInstanceOf(ServientregaRestClient::class, $client);
    }
}
