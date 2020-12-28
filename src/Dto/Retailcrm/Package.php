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
     * @var int|null
     */
    public $width;

    /**
     * @var int|null
     */
    public $length;

    /**
     * @var int|null
     */
    public $height;

    /**
     * @var PackageItem[]|null
     */
    public $items;
}
