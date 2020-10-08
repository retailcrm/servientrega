<?php

namespace App\Dto\Retailcrm;

class Configuration
{
    const PAYER_TYPE_RECEIVER = 'receiver';
    const PAYER_TYPE_SENDER = 'sender';

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
     * @var integer|null
     */
    public $platePrintLimit = 100;

    /**
     * @var boolean
     */
    public $rateDeliveryCost = true;

    /**
     * @var boolean
     */
    public $allowPackages = false;

    /**
     * @var boolean
     */
    public $codAvailable = false;

    /**
     * @var boolean
     */
    public $selfShipmentAvailable = false;

    /**
     * @var boolean
     */
    public $duplicateOrderProductSupported = false;

    /**
     * @var boolean
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
