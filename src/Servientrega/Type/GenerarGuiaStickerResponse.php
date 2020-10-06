<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\ResultInterface;

class GenerarGuiaStickerResponse implements ResultInterface
{

    /**
     * @var bool
     */
    private $GenerarGuiaStickerResult;

    /**
     * @var string
     */
    private $bytesReport;

    /**
     * @return bool
     */
    public function getGenerarGuiaStickerResult()
    {
        return $this->GenerarGuiaStickerResult;
    }

    /**
     * @param bool $GenerarGuiaStickerResult
     * @return GenerarGuiaStickerResponse
     */
    public function withGenerarGuiaStickerResult($GenerarGuiaStickerResult)
    {
        $new = clone $this;
        $new->GenerarGuiaStickerResult = $GenerarGuiaStickerResult;

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
     * @return GenerarGuiaStickerResponse
     */
    public function withBytesReport($bytesReport)
    {
        $new = clone $this;
        $new->bytesReport = $bytesReport;

        return $new;
    }


}

