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
     * @param string $billingCode
     *
     * @return string|null
     */
    public function printSticker(string $deliveryId, string $billingCode): ?string
    {
        return $this->servientregaService->getSticker($deliveryId, $billingCode);
    }

    /**
     * @param array $deliveryIds
     * @param string $billingCode
     *
     * @return string|null
     */
    public function printStickers(array $deliveryIds, string $billingCode): ?string
    {
        $merger = new Merger(new TcpdiDriver());

        foreach ($deliveryIds as $deliveryId) {
            $sticker = $this->servientregaService->getSticker($deliveryId, $billingCode);
            if (null !== $sticker) {
                $merger->addRaw($sticker);
            }
        }

        return $merger->merge();
    }
}
