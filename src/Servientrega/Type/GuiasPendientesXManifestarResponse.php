<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\ResultInterface;

class GuiasPendientesXManifestarResponse implements ResultInterface
{

    /**
     * @var \App\Servientrega\Type\ArrayOfConsultaGuiasXManifestar
     */
    private $GuiasPendientesXManifestarResult;

    /**
     * @var string
     */
    private $mensaje;

    /**
     * @return \App\Servientrega\Type\ArrayOfConsultaGuiasXManifestar
     */
    public function getGuiasPendientesXManifestarResult()
    {
        return $this->GuiasPendientesXManifestarResult;
    }

    /**
     * @param \App\Servientrega\Type\ArrayOfConsultaGuiasXManifestar $GuiasPendientesXManifestarResult
     * @return GuiasPendientesXManifestarResponse
     */
    public function withGuiasPendientesXManifestarResult($GuiasPendientesXManifestarResult)
    {
        $new = clone $this;
        $new->GuiasPendientesXManifestarResult = $GuiasPendientesXManifestarResult;

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
     * @return GuiasPendientesXManifestarResponse
     */
    public function withMensaje($mensaje)
    {
        $new = clone $this;
        $new->mensaje = $mensaje;

        return $new;
    }


}

