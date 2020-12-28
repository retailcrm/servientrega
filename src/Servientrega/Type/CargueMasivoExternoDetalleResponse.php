<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\ResultInterface;

class CargueMasivoExternoDetalleResponse implements ResultInterface
{
    /**
     * @var bool
     */
    private $CargueMasivoExternoDetalleResult;

    /**
     * @var \App\Servientrega\Type\ArrayOfString
     */
    private $arrayGuias;

    /**
     * @return bool
     */
    public function getCargueMasivoExternoDetalleResult()
    {
        return $this->CargueMasivoExternoDetalleResult;
    }

    /**
     * @param bool $CargueMasivoExternoDetalleResult
     *
     * @return CargueMasivoExternoDetalleResponse
     */
    public function withCargueMasivoExternoDetalleResult($CargueMasivoExternoDetalleResult)
    {
        $new                                   = clone $this;
        $new->CargueMasivoExternoDetalleResult = $CargueMasivoExternoDetalleResult;

        return $new;
    }

    /**
     * @return \App\Servientrega\Type\ArrayOfString
     */
    public function getArrayGuias()
    {
        return $this->arrayGuias;
    }

    /**
     * @param \App\Servientrega\Type\ArrayOfString $arrayGuias
     *
     * @return CargueMasivoExternoDetalleResponse
     */
    public function withArrayGuias($arrayGuias)
    {
        $new             = clone $this;
        $new->arrayGuias = $arrayGuias;

        return $new;
    }
}
