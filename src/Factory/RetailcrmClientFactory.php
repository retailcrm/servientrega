<?php

namespace App\Factory;

use App\Entity\Connection;
use RetailCrm\ApiClient;

/**
 * Class RetailcrmClientFactory
 */
class RetailcrmClientFactory extends BaseClientFactory
{
    public function create(?Connection $connection = null): ApiClient
    {
        $user = $this->security->getUser() ?? $connection;
        if (null === $user) {
            throw new \RuntimeException('Client is not defined');
        }

        return new ApiClient($user->getCrmUrl(), $user->getCrmApiKey());
    }
}
