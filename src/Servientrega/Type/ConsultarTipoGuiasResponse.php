<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\ResultInterface;

class ConsultarTipoGuiasResponse implements ResultInterface
{
    /**
     * @var \App\Servientrega\Type\ArrayOfConsultarTipoGuiasXCodSer
     */
    private $ConsultarTipoGuiasResult;

    /**
     * @var string
     */
    private $Mensaje;

    /**
     * @return \App\Servientrega\Type\ArrayOfConsultarTipoGuiasXCodSer
     */
    public function getConsultarTipoGuiasResult()
    {
        return $this->ConsultarTipoGuiasResult;
    }

    /**
     * @param \App\Servientrega\Type\ArrayOfConsultarTipoGuiasXCodSer $ConsultarTipoGuiasResult
     *
     * @return ConsultarTipoGuiasResponse
     */
    public function withConsultarTipoGuiasResult($ConsultarTipoGuiasResult)
    {
        $new                           = clone $this;
        $new->ConsultarTipoGuiasResult = $ConsultarTipoGuiasResult;

        return $new;
    }

    /**
     * @return string
     */
    public function getMensaje()
    {
        return $this->Mensaje;
    }

    /**
     * @param string $Mensaje
     *
     * @return ConsultarTipoGuiasResponse
     */
    public function withMensaje($Mensaje)
    {
        $new          = clone $this;
        $new->Mensaje = $Mensaje;

        return $new;
    }
}
