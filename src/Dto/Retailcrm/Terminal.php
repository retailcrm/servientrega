<?php

namespace App\Dto\Retailcrm;

class Terminal
{
    /**
     * @var string|null
     */
    public $code;

    /**
     * @var string|null
     */
    public $name;

    /**
     * @var string|null
     */
    public $address;

    /**
     * @var string|null
     */
    public $schedule;

    /**
     * @var string|null
     */
    public $phone;

    /**
     * @var array|null
     */
    public $extraData;

    /**
     * @var Coordinates
     */
    public $coordinates;
}
