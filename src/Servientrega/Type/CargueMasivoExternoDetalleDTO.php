<?php

namespace App\Servientrega\Type;

class CargueMasivoExternoDetalleDTO
{

    /**
     * @var \App\Servientrega\Type\ArrayOfEnviosExternoDetalle
     */
    private $objEnvios;

    /**
     * @return \App\Servientrega\Type\ArrayOfEnviosExternoDetalle
     */
    public function getObjEnvios()
    {
        return $this->objEnvios;
    }

    /**
     * @param \App\Servientrega\Type\ArrayOfEnviosExternoDetalle $objEnvios
     * @return CargueMasivoExternoDetalleDTO
     */
    public function withObjEnvios($objEnvios)
    {
        $new = clone $this;
        $new->objEnvios = $objEnvios;

        return $new;
    }


}

