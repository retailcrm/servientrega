<?php

namespace App\Dto\Retailcrm;

class Package
{
    /**
     * @var string|null
     */
    public $packageId;

    /**
     * @var float|null
     */
    public $weight;

    /**
     * @var integer|null
     */
    public $width;

    /**
     * @var integer|null
     */
    public $length;

    /**
     * @var integer|null
     */
    public $height;

    /**
     * @var PackageItem[]|null
     */
    public $items;
}
