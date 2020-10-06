<?php

namespace App\Servientrega\Type;

class ArrayOfResultadoAnulacionGuias
{

    /**
     * @var \App\Servientrega\Type\ResultadoAnulacionGuias
     */
    private $ResultadoAnulacionGuias;

    /**
     * @return \App\Servientrega\Type\ResultadoAnulacionGuias
     */
    public function getResultadoAnulacionGuias()
    {
        return $this->ResultadoAnulacionGuias;
    }

    /**
     * @param \App\Servientrega\Type\ResultadoAnulacionGuias $ResultadoAnulacionGuias
     * @return ArrayOfResultadoAnulacionGuias
     */
    public function withResultadoAnulacionGuias($ResultadoAnulacionGuias)
    {
        $new = clone $this;
        $new->ResultadoAnulacionGuias = $ResultadoAnulacionGuias;

        return $new;
    }


}

