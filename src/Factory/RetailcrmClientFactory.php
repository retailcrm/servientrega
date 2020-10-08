<?php

namespace App\Factory;

use App\Entity\Connection;
use RetailCrm\ApiClient;
use RuntimeException;

/**
 * Class RetailcrmClientFactory
 *
 * @package App\Factory
 */
class RetailcrmClientFactory extends BaseClientFactory
{
    /**
     * @param Connection|null $connection
     *
     * @return ApiClient
     */
    public function create(?Connection $connection = null): ApiClient
    {
        $user = $this->security->getUser() ?? $connection;
        if (null === $user) {
            throw new RuntimeException('Client is not defined');
        }

        return new ApiClient($user->getCrmUrl(), $user->getCrmApiKey());
    }
}
