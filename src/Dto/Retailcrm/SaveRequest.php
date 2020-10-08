<?php

namespace App\Dto\Retailcrm;

class SaveRequest
{
    /**
     * @var string|null
     */
    public $deliveryId;

    /**
     * @var string|null
     */
    public $order;

    /**
     * @var string|null
     */
    public $orderNumber;

    /**
     * @var string|null
     */
    public $site;

    /**
     * @var string|null
     */
    public $siteName;

    /**
     * @var string|null
     */
    public $legalEntity;

    /**
     * @var Customer
     */
    public $customer;

    /**
     * @var Manager
     */
    public $manager;

    /**
     * @var Package[]|null
     */
    public $packages;

    /**
     * @var SaveDeliveryData
     */
    public $delivery;

    /**
     * @var string|null
     */
    public $currency;
}
