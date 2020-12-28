<?php

namespace App\Servientrega\Type;

class ArrayOfCargueMasivoExternoDTO
{
    /**
     * @var \App\Servientrega\Type\CargueMasivoExternoDTO
     */
    private $CargueMasivoExternoDTO;

    /**
     * @return \App\Servientrega\Type\CargueMasivoExternoDTO
     */
    public function getCargueMasivoExternoDTO()
    {
        return $this->CargueMasivoExternoDTO;
    }

    /**
     * @param \App\Servientrega\Type\CargueMasivoExternoDTO $CargueMasivoExternoDTO
     *
     * @return ArrayOfCargueMasivoExternoDTO
     */
    public function withCargueMasivoExternoDTO($CargueMasivoExternoDTO)
    {
        $new                         = clone $this;
        $new->CargueMasivoExternoDTO = $CargueMasivoExternoDTO;

        return $new;
    }
}
