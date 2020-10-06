<?php

namespace App\Factory;

use Symfony\Component\Security\Core\Security;

/**
 * Class BaseClientFactory
 *
 * @package App\Factory
 */
abstract class BaseClientFactory
{
    /**
     * @var Security
     */
    protected $security;

    /**
     * RetailcrmClientFactory constructor.
     *
     * @param Security $security
     */
    public function __construct(Security $security)
    {
        $this->security = $security;
    }
}
