<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\ResultInterface;

class ActualizarEnvioAgregarUnidadesResponse implements ResultInterface
{

    /**
     * @var bool
     */
    private $ActualizarEnvioAgregarUnidadesResult;

    /**
     * @return bool
     */
    public function getActualizarEnvioAgregarUnidadesResult()
    {
        return $this->ActualizarEnvioAgregarUnidadesResult;
    }

    /**
     * @param bool $ActualizarEnvioAgregarUnidadesResult
     * @return ActualizarEnvioAgregarUnidadesResponse
     */
    public function withActualizarEnvioAgregarUnidadesResult($ActualizarEnvioAgregarUnidadesResult)
    {
        $new = clone $this;
        $new->ActualizarEnvioAgregarUnidadesResult = $ActualizarEnvioAgregarUnidadesResult;

        return $new;
    }


}

