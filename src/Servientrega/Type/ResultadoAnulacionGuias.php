<?php

namespace App\Servientrega\Type;

class ResultadoAnulacionGuias
{

    /**
     * @var float
     */
    private $Num_Guia;

    /**
     * @var string
     */
    private $Descripcion;

    /**
     * @return float
     */
    public function getNum_Guia()
    {
        return $this->Num_Guia;
    }

    /**
     * @param float $Num_Guia
     * @return ResultadoAnulacionGuias
     */
    public function withNum_Guia($Num_Guia)
    {
        $new = clone $this;
        $new->Num_Guia = $Num_Guia;

        return $new;
    }

    /**
     * @return string
     */
    public function getDescripcion()
    {
        return $this->Descripcion;
    }

    /**
     * @param string $Descripcion
     * @return ResultadoAnulacionGuias
     */
    public function withDescripcion($Descripcion)
    {
        $new = clone $this;
        $new->Descripcion = $Descripcion;

        return $new;
    }


}

