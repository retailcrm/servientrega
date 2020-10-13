<?php

namespace App\Services;

use iio\libmergepdf\Driver\TcpdiDriver;
use iio\libmergepdf\Merger;

/**
 * Class PrintService
 *
 * @package App\Services
 */
class PrintService
{
    /**
     * @var ServientregaService
     */
    private $servientregaService;

    public function __construct(ServientregaService $servientregaService)
    {
        $this->servientregaService = $servientregaService;
    }

    /**
     * @param string $deliveryId
     *
     * @return string|null
     */
    public function printSticker(string $deliveryId): ?string
    {
        return $this->servientregaService->getSticker($deliveryId);
    }

    /**
     * @param array $deliveryIds
     *
     * @return string|null
     */
    public function printStickers(array $deliveryIds): ?string
    {
        $merger = new Merger(new TcpdiDriver());

        foreach ($deliveryIds as $deliveryId) {
            $sticker = $this->servientregaService->getSticker($deliveryId);
            if (null !== $sticker) {
                $merger->addRaw($sticker);
            }
        }

        return $merger->merge();
    }
}
