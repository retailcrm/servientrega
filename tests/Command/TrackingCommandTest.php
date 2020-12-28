<?php

namespace App\Tests\Command;

use App\Entity\Connection;
use App\Services\ConnectionService;
use App\Services\TrackingsService;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class TrackingCommandTest extends KernelTestCase
{
    public function testExecute()
    {
        $kernel      = static::bootKernel();
        $application = new Application($kernel);

        $trackingService   = $this->createMock(TrackingsService::class);
        $connectionService = $this->createMock(ConnectionService::class);

        $trackingService->method('updateStatuses')->willReturn(true);
        $connectionService->method('getConnections')->willReturn([new Connection()]);

        static::$container->set(TrackingsService::class, $trackingService);
        static::$container->set(ConnectionService::class, $connectionService);

        $command       = $application->find('app:tracking');
        $commandTester = new CommandTester($command);
        $commandTester->execute([]);

        static::assertEquals(0, $commandTester->getStatusCode());
    }

    public function testExecuteWithInputParams()
    {
        $kernel      = static::bootKernel();
        $application = new Application($kernel);

        $trackingService   = $this->createMock(TrackingsService::class);
        $connectionService = $this->createMock(ConnectionService::class);

        $trackingService->method('updateStatuses')->willReturn(true);
        $connectionService->method('getConnection')->willReturn(new Connection());

        static::$container->set(TrackingsService::class, $trackingService);
        static::$container->set(ConnectionService::class, $connectionService);

        $command       = $application->find('app:tracking');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'command'  => $command->getName(),
            '--client' => '1',
        ]);

        static::assertEquals(0, $commandTester->getStatusCode());
    }
}
