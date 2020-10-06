<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\ResultInterface;

class RangoGuiasResponse implements ResultInterface
{

    /**
     * @var \App\Servientrega\Type\ArrayOfConsultarGuiasTotalesResultWS
     */
    private $RangoGuiasResult;

    /**
     * @var string
     */
    private $mensaje;

    /**
     * @return \App\Servientrega\Type\ArrayOfConsultarGuiasTotalesResultWS
     */
    public function getRangoGuiasResult()
    {
        return $this->RangoGuiasResult;
    }

    /**
     * @param \App\Servientrega\Type\ArrayOfConsultarGuiasTotalesResultWS $RangoGuiasResult
     * @return RangoGuiasResponse
     */
    public function withRangoGuiasResult($RangoGuiasResult)
    {
        $new = clone $this;
        $new->RangoGuiasResult = $RangoGuiasResult;

        return $new;
    }

    /**
     * @return string
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * @param string $mensaje
     * @return RangoGuiasResponse
     */
    public function withMensaje($mensaje)
    {
        $new = clone $this;
        $new->mensaje = $mensaje;

        return $new;
    }


}

