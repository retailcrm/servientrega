<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\ResultInterface;

class ValidarActualizarEnvioResponse implements ResultInterface
{
    /**
     * @var \App\Servientrega\Type\ValidarActualizarEnvioResult
     */
    private $ValidarActualizarEnvioResult;

    /**
     * @return \App\Servientrega\Type\ValidarActualizarEnvioResult
     */
    public function getValidarActualizarEnvioResult()
    {
        return $this->ValidarActualizarEnvioResult;
    }

    /**
     * @param \App\Servientrega\Type\ValidarActualizarEnvioResult $ValidarActualizarEnvioResult
     *
     * @return ValidarActualizarEnvioResponse
     */
    public function withValidarActualizarEnvioResult($ValidarActualizarEnvioResult)
    {
        $new                               = clone $this;
        $new->ValidarActualizarEnvioResult = $ValidarActualizarEnvioResult;

        return $new;
    }
}
