<?php

namespace App\Servientrega\Type;

class ArrayOfCargueMasivoExternoDetalleDTO
{
    /**
     * @var \App\Servientrega\Type\CargueMasivoExternoDetalleDTO
     */
    private $CargueMasivoExternoDetalleDTO;

    /**
     * @return \App\Servientrega\Type\CargueMasivoExternoDetalleDTO
     */
    public function getCargueMasivoExternoDetalleDTO()
    {
        return $this->CargueMasivoExternoDetalleDTO;
    }

    /**
     * @param \App\Servientrega\Type\CargueMasivoExternoDetalleDTO $CargueMasivoExternoDetalleDTO
     *
     * @return ArrayOfCargueMasivoExternoDetalleDTO
     */
    public function withCargueMasivoExternoDetalleDTO($CargueMasivoExternoDetalleDTO)
    {
        $new                                = clone $this;
        $new->CargueMasivoExternoDetalleDTO = $CargueMasivoExternoDetalleDTO;

        return $new;
    }
}
