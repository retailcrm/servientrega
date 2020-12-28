<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\ResultInterface;

class ConsultarRestriccionesFisicasEnviosResponse implements ResultInterface
{
    /**
     * @var \App\Servientrega\Type\ConsultarRestriccionesFisicasEnviosResult
     */
    private $ConsultarRestriccionesFisicasEnviosResult;

    /**
     * @return \App\Servientrega\Type\ConsultarRestriccionesFisicasEnviosResult
     */
    public function getConsultarRestriccionesFisicasEnviosResult()
    {
        return $this->ConsultarRestriccionesFisicasEnviosResult;
    }

    /**
     * @param \App\Servientrega\Type\ConsultarRestriccionesFisicasEnviosResult $ConsultarRestriccionesFisicasEnviosResult
     *
     * @return ConsultarRestriccionesFisicasEnviosResponse
     */
    public function withConsultarRestriccionesFisicasEnviosResult($ConsultarRestriccionesFisicasEnviosResult)
    {
        $new                                            = clone $this;
        $new->ConsultarRestriccionesFisicasEnviosResult = $ConsultarRestriccionesFisicasEnviosResult;

        return $new;
    }
}
