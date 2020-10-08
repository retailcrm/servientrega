<?php

namespace App\Dto\Retailcrm;

class PackageItem
{
    /**
     * @var string|null
     */
    public $offerId;

    /**
     * @var string|null
     */
    public $name;

    /**
     * @var float|null
     */
    public $declaredValue;

    /**
     * @var float|null
     */
    public $cod;

    /**
     * @var float|null
     */
    public $quantity;

    /**
     * @var array|null
     */
    public $properties;
}
