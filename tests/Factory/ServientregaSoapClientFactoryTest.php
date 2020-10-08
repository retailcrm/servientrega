<?php

namespace App\Tests\Factory;

use App\Entity\Connection;
use App\Factory\ServientregaSoapClientFactory;
use App\Servientrega\ServientregaClient;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Security\Core\Security;

class ServientregaSoapClientFactoryTest extends TestCase
{
    public function testFactory()
    {
        $securityMock = $this->createMock(Security::class);
        $securityMock
            ->method('getUser')
            ->willReturn(
                (new Connection())->setServientregaLogin('test')
                ->setServientregaPassword('test')
                ->setServientregaBillingCode('test')
                ->setServientregaNamePack('test')
            );

        $client = (new ServientregaSoapClientFactory($securityMock))->factory();

        static::assertInstanceOf(ServientregaClient::class, $client);
    }
}
