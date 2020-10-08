<?php

namespace App\Dto\Retailcrm;

class CalculateResponse
{
    const TARIFF_COURIER = 'courier';
    const TARIFF_SELF_DELIVERY = 'selfDelivery';

    /**
     * @var string|null
     */
    public $code;

    /**
     * @var string|null
     */
    public $group;

    /**
     * @var string|null
     */
    public $name;

    /**
     * @var string|null
     */
    public $type;

    /**
     * @var string|null
     */
    public $description;

    /**
     * @var float|null
     */
    public $cost;

    /**
     * @var integer|null
     */
    public $minTerm;

    /**
     * @var integer|null
     */
    public $maxTerm;

    /**
     * @var array|null
     */
    public $extraData;

    /**
     * @var array|null
     */
    public $extraDataAvailable;

    /**
     * @var Terminal[]|null
     */
    public $pickuppointList;
}
