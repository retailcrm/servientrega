<?php

namespace App\Servientrega\Type;

class CargueMasivoExternoDTO
{
    /**
     * @var \App\Servientrega\Type\ArrayOfEnviosExterno
     */
    private $objEnvios;

    /**
     * @return \App\Servientrega\Type\ArrayOfEnviosExterno
     */
    public function getObjEnvios()
    {
        return $this->objEnvios;
    }

    /**
     * @param \App\Servientrega\Type\ArrayOfEnviosExterno $objEnvios
     *
     * @return CargueMasivoExternoDTO
     */
    public function withObjEnvios($objEnvios)
    {
        $new            = clone $this;
        $new->objEnvios = $objEnvios;

        return $new;
    }
}
