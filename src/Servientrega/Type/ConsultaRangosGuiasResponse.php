<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\ResultInterface;

class ConsultaRangosGuiasResponse implements ResultInterface
{
    /**
     * @var \App\Servientrega\Type\ArrayOfConsultarGuiasTotalesResultWS
     */
    private $ConsultaRangosGuiasResult;

    /**
     * @var string
     */
    private $Mensaje;

    /**
     * @return \App\Servientrega\Type\ArrayOfConsultarGuiasTotalesResultWS
     */
    public function getConsultaRangosGuiasResult()
    {
        return $this->ConsultaRangosGuiasResult;
    }

    /**
     * @param \App\Servientrega\Type\ArrayOfConsultarGuiasTotalesResultWS $ConsultaRangosGuiasResult
     *
     * @return ConsultaRangosGuiasResponse
     */
    public function withConsultaRangosGuiasResult($ConsultaRangosGuiasResult)
    {
        $new                            = clone $this;
        $new->ConsultaRangosGuiasResult = $ConsultaRangosGuiasResult;

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
     * @return ConsultaRangosGuiasResponse
     */
    public function withMensaje($Mensaje)
    {
        $new          = clone $this;
        $new->Mensaje = $Mensaje;

        return $new;
    }
}
