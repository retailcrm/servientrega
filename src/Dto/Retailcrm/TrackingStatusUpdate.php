<?php

namespace App\Dto\Retailcrm;

class TrackingStatusUpdate
{
    /**
     * @var string
     */
    public $deliveryId;

    /**
     * @var TrackingStatusUpdateHistory[]|null
     */
    public $history;

    /**
     * @var string|null
     */
    public $trackNumber;

    /**
     * @var float|null
     */
    public $cost;

    /**
     * @var array|null
     */
    public $extraData;
}
