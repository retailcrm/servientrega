<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\ResultInterface;

class GenerarGuiaStickerMobileResponse implements ResultInterface
{

    /**
     * @var bool
     */
    private $GenerarGuiaStickerMobileResult;

    /**
     * @var string
     */
    private $bytesReport;

    /**
     * @return bool
     */
    public function getGenerarGuiaStickerMobileResult()
    {
        return $this->GenerarGuiaStickerMobileResult;
    }

    /**
     * @param bool $GenerarGuiaStickerMobileResult
     * @return GenerarGuiaStickerMobileResponse
     */
    public function withGenerarGuiaStickerMobileResult($GenerarGuiaStickerMobileResult)
    {
        $new = clone $this;
        $new->GenerarGuiaStickerMobileResult = $GenerarGuiaStickerMobileResult;

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
     * @return GenerarGuiaStickerMobileResponse
     */
    public function withBytesReport($bytesReport)
    {
        $new = clone $this;
        $new->bytesReport = $bytesReport;

        return $new;
    }


}

