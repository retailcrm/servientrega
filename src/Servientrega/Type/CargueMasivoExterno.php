<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\RequestInterface;

class CargueMasivoExterno implements RequestInterface
{

    /**
     * @var \App\Servientrega\Type\ArrayOfCargueMasivoExternoDTO
     */
    private $envios;

    /**
     * @var \App\Servientrega\Type\ArrayOfString
     */
    private $arrayGuias;

    /**
     * Constructor
     *
     * @var \App\Servientrega\Type\ArrayOfCargueMasivoExternoDTO $envios
     * @var \App\Servientrega\Type\ArrayOfString $arrayGuias
     */
    public function __construct($envios, $arrayGuias)
    {
        $this->envios = $envios;
        $this->arrayGuias = $arrayGuias;
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
     * @return CargueMasivoExterno
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
     * @return CargueMasivoExterno
     */
    public function withArrayGuias($arrayGuias)
    {
        $new = clone $this;
        $new->arrayGuias = $arrayGuias;

        return $new;
    }


}

