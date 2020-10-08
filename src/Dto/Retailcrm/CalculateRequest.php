<?php

namespace App\Dto\Retailcrm;

class CalculateRequest
{
    /**
     * @var DeliveryAddress
     */
    public $shipmentAddress;

    /**
     * @var DeliveryAddress
     */
    public $deliveryAddress;

    /**
     * @var Package[]|null
     */
    public $packages;

    /**
     * @var float|null
     */
    public $declaredValue;

    /**
     * @var float|null
     */
    public $cod;

    /**
     * @var string|null
     */
    public $payerType;

    /**
     * @var \DateTimeInterface|null
     */
    public $deliveryDate;

    /**
     * @var DeliveryTime
     */
    public $deliveryTime;

    /**
     * @var string|null
     */
    public $currency;

    /**
     * @var array|null
     */
    public $extraData;
}
