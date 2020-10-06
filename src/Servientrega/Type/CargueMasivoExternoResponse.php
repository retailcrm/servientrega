<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\ResultInterface;

class CargueMasivoExternoResponse implements ResultInterface
{

    /**
     * @var bool
     */
    private $CargueMasivoExternoResult;

    /**
     * @var \App\Servientrega\Type\ArrayOfCargueMasivoExternoDTO
     */
    private $envios;

    /**
     * @var \App\Servientrega\Type\ArrayOfString
     */
    private $arrayGuias;

    /**
     * @return bool
     */
    public function getCargueMasivoExternoResult()
    {
        return $this->CargueMasivoExternoResult;
    }

    /**
     * @param bool $CargueMasivoExternoResult
     * @return CargueMasivoExternoResponse
     */
    public function withCargueMasivoExternoResult($CargueMasivoExternoResult)
    {
        $new = clone $this;
        $new->CargueMasivoExternoResult = $CargueMasivoExternoResult;

        return $new;
    }

    /**
     * @return \App\Servientrega\Type\ArrayOfCargueMasivoExternoDTO
     */
    public function getEnvios()
    {
        return $this->envios;
    }

    /**
     * @param \App\Servientrega\Type\ArrayOfCargueMasivoExternoDTO $envios
     * @return CargueMasivoExternoResponse
     */
    public function withEnvios($envios)
    {
        $new = clone $this;
        $new->envios = $envios;

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
     * @return CargueMasivoExternoResponse
     */
    public function withArrayGuias($arrayGuias)
    {
        $new = clone $this;
        $new->arrayGuias = $arrayGuias;

        return $new;
    }


}

