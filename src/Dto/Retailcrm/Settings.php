<?php

namespace App\Dto\Retailcrm;

class Settings
{
    /**
     * @var string|null
     */
    public $defaultPayerType;

    /**
     * @var string|null
     */
    public $costCalculateBy;

    /**
     * @var bool
     */
    public $nullDeclaredValue;

    /**
     * @var bool
     */
    public $lockedByDefault;

    /**
     * @var PaymentType[]|null
     */
    public $paymentTypes;

    /**
     * @var ShipmentPoint[]|null
     */
    public $shipmentPoints;

    /**
     * @var SettingsStatus[]|null
     */
    public $statuses;

    /**
     * @var array|null
     */
    public $deliveryExtraData;

    /**
     * @var array|null
     */
    public $shipmentExtraData;
}
