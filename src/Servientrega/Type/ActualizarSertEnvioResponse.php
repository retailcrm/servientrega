<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\ResultInterface;

class ActualizarSertEnvioResponse implements ResultInterface
{

    /**
     * @var bool
     */
    private $ActualizarSertEnvioResult;

    /**
     * @return bool
     */
    public function getActualizarSertEnvioResult()
    {
        return $this->ActualizarSertEnvioResult;
    }

    /**
     * @param bool $ActualizarSertEnvioResult
     * @return ActualizarSertEnvioResponse
     */
    public function withActualizarSertEnvioResult($ActualizarSertEnvioResult)
    {
        $new = clone $this;
        $new->ActualizarSertEnvioResult = $ActualizarSertEnvioResult;

        return $new;
    }


}

