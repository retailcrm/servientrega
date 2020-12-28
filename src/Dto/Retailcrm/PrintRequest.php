<?php

namespace App\Dto\Retailcrm;

class PrintRequest
{
    const ORDER_TYPE    = 'order';
    const SHIPMENT_TYPE = 'shipment';

    /**
     * @var string
     */
    public $entityType;

    /**
     * @var string
     */
    public $type;

    /**
     * @var array
     */
    public $deliveryIds;
}
