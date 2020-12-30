<?php

namespace App\Dto\Retailcrm;

class DeliveryAddress
{
    /**
     * @var string|null
     */
    public $index;

    /**
     * @var string|null
     */
    public $countryIso;

    /**
     * @var string|null
     */
    public $region;

    /**
     * @var int|null
     */
    public $regionId;

    /**
     * @var string|null
     */
    public $city;

    /**
     * @var int|null
     */
    public $cityId;

    /**
     * @var string|null
     */
    public $cityType;

    /**
     * @var string|null
     */
    public $street;

    /**
     * @var int|null
     */
    public $streetId;

    /**
     * @var string|null
     */
    public $streetType;

    /**
     * @var string|null
     */
    public $building;

    /**
     * @var string|null
     */
    public $flat;

    /**
     * @var string|null
     */
    public $intercomCode;

    /**
     * @var int|null
     */
    public $floor;

    /**
     * @var int|null
     */
    public $block;

    /**
     * @var string|null
     */
    public $house;

    /**
     * @var string|null
     */
    public $metro;

    /**
     * @var string|null
     */
    public $notes;

    /**
     * @var string|null
     */
    public $text;

    /**
     * @var string|null
     */
    public $terminal;

    /**
     * DeliveryAddress constructor.
     */
    public static function create(?string $city, ?string $street): self
    {
        $instance = new self();

        $instance->city   = $city;
        $instance->street = $street;

        return $instance;
    }
}
