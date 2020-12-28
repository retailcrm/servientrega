<?php

namespace App\Dto\Retailcrm;

class IntegrationModule
{
    /**
     * @var string|null
     */
    public $code;

    /**
     * @var string|null
     */
    public $integrationCode;

    /**
     * @var bool
     */
    public $active = true;

    /**
     * @var bool
     */
    public $freeze;

    /**
     * @var string|null
     */
    public $name;

    /**
     * @var string|null
     */
    public $logo;

    /**
     * @var string|null
     */
    public $clientId;

    /**
     * @var string|null
     */
    public $baseUrl;

    /**
     * @var array|null
     */
    public $actions;

    /**
     * @var array|null
     */
    public $availableCountries;

    /**
     * @var string|null
     */
    public $accountUrl;

    /**
     * @var Integrations
     */
    public $integrations;
}
