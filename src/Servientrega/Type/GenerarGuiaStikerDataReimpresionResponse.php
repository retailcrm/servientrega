<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\ResultInterface;

class GenerarGuiaStikerDataReimpresionResponse implements ResultInterface
{

    /**
     * @var \App\Servientrega\Type\GenerarGuiaStikerDataReimpresionResult
     */
    private $GenerarGuiaStikerDataReimpresionResult;

    /**
     * @return \App\Servientrega\Type\GenerarGuiaStikerDataReimpresionResult
     */
    public function getGenerarGuiaStikerDataReimpresionResult()
    {
        return $this->GenerarGuiaStikerDataReimpresionResult;
    }

    /**
     * @param \App\Servientrega\Type\GenerarGuiaStikerDataReimpresionResult $GenerarGuiaStikerDataReimpresionResult
     * @return GenerarGuiaStikerDataReimpresionResponse
     */
    public function withGenerarGuiaStikerDataReimpresionResult($GenerarGuiaStikerDataReimpresionResult)
    {
        $new = clone $this;
        $new->GenerarGuiaStikerDataReimpresionResult = $GenerarGuiaStikerDataReimpresionResult;

        return $new;
    }


}

