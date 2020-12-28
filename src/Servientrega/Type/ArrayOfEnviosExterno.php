<?php

namespace App\Servientrega\Type;

class ArrayOfEnviosExterno
{
    /**
     * @var \App\Servientrega\Type\EnviosExterno
     */
    private $EnviosExterno;

    /**
     * @return \App\Servientrega\Type\EnviosExterno
     */
    public function getEnviosExterno()
    {
        return $this->EnviosExterno;
    }

    /**
     * @param \App\Servientrega\Type\EnviosExterno $EnviosExterno
     *
     * @return ArrayOfEnviosExterno
     */
    public function withEnviosExterno($EnviosExterno)
    {
        $new                = clone $this;
        $new->EnviosExterno = $EnviosExterno;

        return $new;
    }
}
