<?php

namespace App\Command;

use App\Services\ConnectionService;
use App\Services\TrackingsService;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class TrackingCommand
 *
 * @package App\Command
 */
class TrackingCommand extends Command
{
    use LockableTrait;

    /**
     * @var TrackingsService
     */
    private $trackingService;

    /**
     * @var ConnectionService
     */
    private $connectionService;

    /**
     * @var LoggerInterface
     */
    private $logger;

    protected static $defaultName = 'app:tracking';

    public function __construct(
        TrackingsService $trackingService,
        ConnectionService $connectionService,
        LoggerInterface $logger,
        string $name = null
    ) {
        parent::__construct($name);

        $this->trackingService = $trackingService;
        $this->connectionService = $connectionService;
        $this->logger = $logger;
    }

    protected function configure()
    {
        $this
            ->setDescription('Update statuses in RetailCRM')
            ->addOption(
                'client',
                'c',
                InputOption::VALUE_OPTIONAL
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $clientId = $input->getOption('client')
            ? (int) $input->getOption('client')
            : null;

        $clientLock = $clientId ?? 0;
        $lockName = "{$this->getName()}_client={$clientLock}.lock";

        if (!$this->lock($lockName)) {
            $this->logger->info(sprintf("Command %s already running.", $lockName));

            return 0;
        }

        if (null !== $clientId) {
            $connection = $this->connectionService->getConnection($clientId);
            if (null === $connection) {
                $this->logger->warning(sprintf("Client with id %d not found", $clientId));

                return 1;
            }

            $connections = [$connection];
        } else {
            $connections = $this->connectionService->getConnections();
        }

        foreach ($connections as $connection) {
            if (!$this->trackingService->updateStatuses($connection)) {
                return 1;
            }
        }

        $this->logger->debug("Statuses updated successfully");

        return 0;
    }
}
