<?php

namespace App\Dto\Retailcrm;

final class Delivery
{
    /**
     * @var string
     */
    public $trackNumber;

    /**
     * @var \DateTimeImmutable
     */
    public $shipmentDate;

    /**
     * @var \DateTimeImmutable
     */
    public $deliveryDate;

    /**
     * @var DeliveryAddress
     */
    public $shipmentAddress;

    /**
     * @var DeliveryAddress
     */
    public $deliveryAddress;

    /**
     * Delivery constructor.
     */
    public function __construct(
        string $trackNumber,
        \DateTimeImmutable $shipmentDate,
        \DateTimeImmutable $deliveryDate,
        DeliveryAddress $shipmentAddress,
        DeliveryAddress $deliveryAddress
    ) {
        $this->trackNumber     = $trackNumber;
        $this->shipmentDate    = $shipmentDate;
        $this->deliveryDate    = $deliveryDate;
        $this->shipmentAddress = $shipmentAddress;
        $this->deliveryAddress = $deliveryAddress;
    }
}
