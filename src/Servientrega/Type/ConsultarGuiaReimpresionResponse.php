<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\ResultInterface;

class ConsultarGuiaReimpresionResponse implements ResultInterface
{

    /**
     * @var bool
     */
    private $ConsultarGuiaReimpresionResult;

    /**
     * @return bool
     */
    public function getConsultarGuiaReimpresionResult()
    {
        return $this->ConsultarGuiaReimpresionResult;
    }

    /**
     * @param bool $ConsultarGuiaReimpresionResult
     * @return ConsultarGuiaReimpresionResponse
     */
    public function withConsultarGuiaReimpresionResult($ConsultarGuiaReimpresionResult)
    {
        $new = clone $this;
        $new->ConsultarGuiaReimpresionResult = $ConsultarGuiaReimpresionResult;

        return $new;
    }


}

