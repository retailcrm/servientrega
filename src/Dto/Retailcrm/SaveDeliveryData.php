<?php

namespace App\Dto\Retailcrm;

class SaveDeliveryData
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
     * @var boolean
     */
    public $withCod;

    /**
     * @var float|null
     */
    public $cod;

    /**
     * @var float|null
     */
    public $cost;

    /**
     * @var string|null
     */
    public $tariff;

    /**
     * @var string|null
     */
    public $payerType;

    /**
     * @var \DateTimeInterface|null
     */
    public $shipmentDate;

    /**
     * @var \DateTimeInterface|null
     *
     * @Serializer\Groups({"get"})
     * @Serializer\SerializedName("deliveryDate")
     * @Serializer\Type("DateTime<'Y-m-d'>")
     */
    public $deliveryDate;

    /**
     * @var DeliveryTime
     */
    public $deliveryTime;

    /**
     * @var array|null
     */
    public $extraData;
}
