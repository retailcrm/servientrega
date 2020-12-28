<?php

namespace App\Services;

use App\Entity\Connection;
use iio\libmergepdf\Driver\TcpdiDriver;
use iio\libmergepdf\Merger;

/**
 * Class PrintService
 */
class PrintService
{
    /**
     * @var OrderService
     */
    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function printSticker(Connection $connection, string $deliveryId): ?string
    {
        $stickers = $this->orderService->getStickers($connection, [$deliveryId]);
        if (empty($stickers)) {
            return null;
        }

        return $stickers[0];
    }

    public function printStickers(Connection $connection, array $deliveryIds): ?string
    {
        $merger   = new Merger(new TcpdiDriver());
        $stickers = $this->orderService->getStickers($connection, $deliveryIds);
        if (empty($stickers)) {
            return null;
        }

        foreach ($stickers as $sticker) {
            if (null !== $sticker) {
                $merger->addRaw($sticker);
            }
        }

        return $merger->merge();
    }
}
