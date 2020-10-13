<?php

namespace App\Dto\Retailcrm;

class PrintRequest
{
    CONST ORDER_TYPE = 'order';
    CONST SHIPMENT_TYPE = 'shipment';

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
