<?php

namespace App\Dto\Retailcrm;

class DeliveryTime
{
    /**
     * @var \DateTimeInterface|null
     */
    public $from;

    /**
     * @var \DateTimeInterface|null
     */
    public $to;

    /**
     * @var string|null
     */
    public $custom;
}
