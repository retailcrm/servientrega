<?php

namespace App\Servientrega\Type;

class ArrayOfEnviosUnidadEmpaqueCargueDetalle
{

    /**
     * @var \App\Servientrega\Type\EnviosUnidadEmpaqueCargueDetalle
     */
    private $EnviosUnidadEmpaqueCargueDetalle;

    /**
     * @return \App\Servientrega\Type\EnviosUnidadEmpaqueCargueDetalle
     */
    public function getEnviosUnidadEmpaqueCargueDetalle()
    {
        return $this->EnviosUnidadEmpaqueCargueDetalle;
    }

    /**
     * @param \App\Servientrega\Type\EnviosUnidadEmpaqueCargueDetalle $EnviosUnidadEmpaqueCargueDetalle
     * @return ArrayOfEnviosUnidadEmpaqueCargueDetalle
     */
    public function withEnviosUnidadEmpaqueCargueDetalle($EnviosUnidadEmpaqueCargueDetalle)
    {
        $new = clone $this;
        $new->EnviosUnidadEmpaqueCargueDetalle = $EnviosUnidadEmpaqueCargueDetalle;

        return $new;
    }


}

