<?php

namespace App\Servientrega\Type;

class ArrayOfEnviosExternoDetalle
{
    /**
     * @var \App\Servientrega\Type\EnviosExternoDetalle
     */
    private $EnviosExternoDetalle;

    /**
     * @return \App\Servientrega\Type\EnviosExternoDetalle
     */
    public function getEnviosExternoDetalle()
    {
        return $this->EnviosExternoDetalle;
    }

    /**
     * @param \App\Servientrega\Type\EnviosExternoDetalle $EnviosExternoDetalle
     *
     * @return ArrayOfEnviosExternoDetalle
     */
    public function withEnviosExternoDetalle($EnviosExternoDetalle)
    {
        $new                       = clone $this;
        $new->EnviosExternoDetalle = $EnviosExternoDetalle;

        return $new;
    }
}
