<?php

namespace App\Factory;

use App\Entity\Connection;
use App\Servientrega\ServientregaRestClient;

/**
 * Class ServientregaRestClientFactory
 *
 * @package App\Factory
 */
class ServientregaRestClientFactory extends BaseClientFactory
{
    /**
     * @param Connection|null $connection
     *
     * @return ServientregaRestClient
     */
    public function factory(?Connection $connection = null): ServientregaRestClient
    {
        $user = $this->security->getUser() ?? $connection;
        $token = $user ? $user->getToken() : null;

        if (null === $token || null === $user) {
            return new ServientregaRestClient();
        } else {
            return new ServientregaRestClient($token->getToken());
        }
    }
}
