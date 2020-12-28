<?php

namespace App\Factory;

use Symfony\Component\Security\Core\Security;

/**
 * Class BaseClientFactory
 */
abstract class BaseClientFactory
{
    /**
     * @var Security
     */
    protected $security;

    /**
     * RetailcrmClientFactory constructor.
     */
    public function __construct(Security $security)
    {
        $this->security = $security;
    }
}
