<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\ResultInterface;

class InsertarSertEnvioResponse implements ResultInterface
{

    /**
     * @var bool
     */
    private $InsertarSertEnvioResult;

    /**
     * @return bool
     */
    public function getInsertarSertEnvioResult()
    {
        return $this->InsertarSertEnvioResult;
    }

    /**
     * @param bool $InsertarSertEnvioResult
     * @return InsertarSertEnvioResponse
     */
    public function withInsertarSertEnvioResult($InsertarSertEnvioResult)
    {
        $new = clone $this;
        $new->InsertarSertEnvioResult = $InsertarSertEnvioResult;

        return $new;
    }


}

