<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\ResultInterface;

class ConsultarUnidadEmpaqueIdLoginResponse implements ResultInterface
{
    /**
     * @var \App\Servientrega\Type\ConsultarUnidadEmpaqueIdLoginResult
     */
    private $ConsultarUnidadEmpaqueIdLoginResult;

    /**
     * @return \App\Servientrega\Type\ConsultarUnidadEmpaqueIdLoginResult
     */
    public function getConsultarUnidadEmpaqueIdLoginResult()
    {
        return $this->ConsultarUnidadEmpaqueIdLoginResult;
    }

    /**
     * @param \App\Servientrega\Type\ConsultarUnidadEmpaqueIdLoginResult $ConsultarUnidadEmpaqueIdLoginResult
     *
     * @return ConsultarUnidadEmpaqueIdLoginResponse
     */
    public function withConsultarUnidadEmpaqueIdLoginResult($ConsultarUnidadEmpaqueIdLoginResult)
    {
        $new                                      = clone $this;
        $new->ConsultarUnidadEmpaqueIdLoginResult = $ConsultarUnidadEmpaqueIdLoginResult;

        return $new;
    }
}
