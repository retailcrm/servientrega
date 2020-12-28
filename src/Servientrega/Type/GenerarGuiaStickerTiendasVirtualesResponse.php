<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\ResultInterface;

class GenerarGuiaStickerTiendasVirtualesResponse implements ResultInterface
{
    /**
     * @var bool
     */
    private $GenerarGuiaStickerTiendasVirtualesResult;

    /**
     * @var string
     */
    private $bytesReport;

    /**
     * @return bool
     */
    public function getGenerarGuiaStickerTiendasVirtualesResult()
    {
        return $this->GenerarGuiaStickerTiendasVirtualesResult;
    }

    /**
     * @param bool $GenerarGuiaStickerTiendasVirtualesResult
     *
     * @return GenerarGuiaStickerTiendasVirtualesResponse
     */
    public function withGenerarGuiaStickerTiendasVirtualesResult($GenerarGuiaStickerTiendasVirtualesResult)
    {
        $new                                           = clone $this;
        $new->GenerarGuiaStickerTiendasVirtualesResult = $GenerarGuiaStickerTiendasVirtualesResult;

        return $new;
    }

    /**
     * @return string
     */
    public function getBytesReport()
    {
        return $this->bytesReport;
    }

    /**
     * @param string $bytesReport
     *
     * @return GenerarGuiaStickerTiendasVirtualesResponse
     */
    public function withBytesReport($bytesReport)
    {
        $new              = clone $this;
        $new->bytesReport = $bytesReport;

        return $new;
    }
}
