<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\RequestInterface;

class CargueMasivoExternoDetalle implements RequestInterface
{
    /**
     * @var \App\Servientrega\Type\ArrayOfCargueMasivoExternoDetalleDTO
     */
    private $envios;

    /**
     * @var \App\Servientrega\Type\ArrayOfString
     */
    private $arrayGuias;

    /**
     * Constructor
     *
     * @var \App\Servientrega\Type\ArrayOfCargueMasivoExternoDetalleDTO
     * @var \App\Servientrega\Type\ArrayOfString
     */
    public function __construct($envios, $arrayGuias)
    {
        $this->envios     = $envios;
        $this->arrayGuias = $arrayGuias;
    }

    /**
     * @return \App\Servientrega\Type\ArrayOfCargueMasivoExternoDetalleDTO
     */
    public function getEnvios()
    {
        return $this->envios;
    }

    /**
     * @param \App\Servientrega\Type\ArrayOfCargueMasivoExternoDetalleDTO $envios
     *
     * @return CargueMasivoExternoDetalle
     */
    public function withEnvios($envios)
    {
        $new         = clone $this;
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
     *
     * @return CargueMasivoExternoDetalle
     */
    public function withArrayGuias($arrayGuias)
    {
        $new             = clone $this;
        $new->arrayGuias = $arrayGuias;

        return $new;
    }
}
