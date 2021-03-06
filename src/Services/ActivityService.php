<?php

namespace App\Services;

use App\Dto\Callback\Activity;
use App\Entity\Connection;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Security\Core\Security;

/**
 * Class ActivityService
 */
class ActivityService
{
    private $entityManager;
    private $security;
    private $logger;

    /**
     * ActivityService constructor.
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        Security $security,
        LoggerInterface $logger
    ) {
        $this->entityManager = $entityManager;
        $this->security      = $security;
        $this->logger        = $logger;
    }

    public function handleActivity(Activity $activity, string $systemUrl): bool
    {
        try {
            /** @var Connection $connection */
            $connection = $this->security->getUser();
            if (!$activity->active || $activity->freeze) {
                $connection->setIsActive(false);
            }

            $connection->setCrmUrl($systemUrl);

            $this->entityManager->persist($connection);
            $this->entityManager->flush();
        } catch (\Throwable $exception) {
            $this->logger->error(
                $exception->getMessage(), ['trace' => $exception->getTraceAsString(), 'system' => $systemUrl]
            );

            return false;
        }

        return true;
    }
}
