<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\ResultInterface;

class GenerarGuiaStikerDataResponse implements ResultInterface
{

    /**
     * @var \App\Servientrega\Type\GenerarGuiaStikerDataResult
     */
    private $GenerarGuiaStikerDataResult;

    /**
     * @return \App\Servientrega\Type\GenerarGuiaStikerDataResult
     */
    public function getGenerarGuiaStikerDataResult()
    {
        return $this->GenerarGuiaStikerDataResult;
    }

    /**
     * @param \App\Servientrega\Type\GenerarGuiaStikerDataResult $GenerarGuiaStikerDataResult
     * @return GenerarGuiaStikerDataResponse
     */
    public function withGenerarGuiaStikerDataResult($GenerarGuiaStikerDataResult)
    {
        $new = clone $this;
        $new->GenerarGuiaStikerDataResult = $GenerarGuiaStikerDataResult;

        return $new;
    }


}

