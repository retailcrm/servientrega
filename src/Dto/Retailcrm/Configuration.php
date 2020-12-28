<?php

namespace App\Dto\Retailcrm;

class Configuration
{
    const PAYER_TYPE_RECEIVER = 'receiver';
    const PAYER_TYPE_SENDER   = 'sender';

    /**
     * @var string|null
     */
    public $description;

    /**
     * @var array|null
     */
    public $actions;

    /**
     * @var array|null
     */
    public $payerType;

    /**
     * @var int|null
     */
    public $platePrintLimit = 100;

    /**
     * @var bool
     */
    public $rateDeliveryCost = true;

    /**
     * @var bool
     */
    public $allowPackages = false;

    /**
     * @var bool
     */
    public $codAvailable = false;

    /**
     * @var bool
     */
    public $selfShipmentAvailable = false;

    /**
     * @var bool
     */
    public $duplicateOrderProductSupported = false;

    /**
     * @var bool
     */
    public $allowTrackNumber;

    /**
     * @var array|null
     */
    public $availableCountries;

    /**
     * @var array|null
     */
    public $requiredFields;

    /**
     * @var Status[]|null
     */
    public $statusList;

    /**
     * @var Plate[]|null
     */
    public $plateList;

    /**
     * @var DeliveryDataField[]|null
     */
    public $deliveryDataFieldList;

    /**
     * @var DeliveryDataField[]|null
     */
    public $shipmentDataFieldList;

    /**
     * @var Settings
     */
    public $settings;
}
