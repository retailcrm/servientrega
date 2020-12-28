<?php

namespace App\Servientrega\Type;

class ArrayOfEnviosUnidadEmpaqueCargue
{
    /**
     * @var \App\Servientrega\Type\EnviosUnidadEmpaqueCargue
     */
    private $EnviosUnidadEmpaqueCargue;

    /**
     * @return \App\Servientrega\Type\EnviosUnidadEmpaqueCargue
     */
    public function getEnviosUnidadEmpaqueCargue()
    {
        return $this->EnviosUnidadEmpaqueCargue;
    }

    /**
     * @param \App\Servientrega\Type\EnviosUnidadEmpaqueCargue $EnviosUnidadEmpaqueCargue
     *
     * @return ArrayOfEnviosUnidadEmpaqueCargue
     */
    public function withEnviosUnidadEmpaqueCargue($EnviosUnidadEmpaqueCargue)
    {
        $new                            = clone $this;
        $new->EnviosUnidadEmpaqueCargue = $EnviosUnidadEmpaqueCargue;

        return $new;
    }
}
