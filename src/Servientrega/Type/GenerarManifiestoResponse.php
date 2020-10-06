<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\ResultInterface;

class GenerarManifiestoResponse implements ResultInterface
{

    /**
     * @var bool
     */
    private $GenerarManifiestoResult;

    /**
     * @var string
     */
    private $cadenaBytes;

    /**
     * @var \App\Servientrega\Type\ArrayOfErrorGeneradoPorGuia
     */
    private $Des_Error;

    /**
     * @var string
     */
    private $Num_manifiesto;

    /**
     * @var string
     */
    private $Mensaje;

    /**
     * @return bool
     */
    public function getGenerarManifiestoResult()
    {
        return $this->GenerarManifiestoResult;
    }

    /**
     * @param bool $GenerarManifiestoResult
     * @return GenerarManifiestoResponse
     */
    public function withGenerarManifiestoResult($GenerarManifiestoResult)
    {
        $new = clone $this;
        $new->GenerarManifiestoResult = $GenerarManifiestoResult;

        return $new;
    }

    /**
     * @return string
     */
    public function getCadenaBytes()
    {
        return $this->cadenaBytes;
    }

    /**
     * @param string $cadenaBytes
     * @return GenerarManifiestoResponse
     */
    public function withCadenaBytes($cadenaBytes)
    {
        $new = clone $this;
        $new->cadenaBytes = $cadenaBytes;

        return $new;
    }

    /**
     * @return \App\Servientrega\Type\ArrayOfErrorGeneradoPorGuia
     */
    public function getDes_Error()
    {
        return $this->Des_Error;
    }

    /**
     * @param \App\Servientrega\Type\ArrayOfErrorGeneradoPorGuia $Des_Error
     * @return GenerarManifiestoResponse
     */
    public function withDes_Error($Des_Error)
    {
        $new = clone $this;
        $new->Des_Error = $Des_Error;

        return $new;
    }

    /**
     * @return string
     */
    public function getNum_manifiesto()
    {
        return $this->Num_manifiesto;
    }

    /**
     * @param string $Num_manifiesto
     * @return GenerarManifiestoResponse
     */
    public function withNum_manifiesto($Num_manifiesto)
    {
        $new = clone $this;
        $new->Num_manifiesto = $Num_manifiesto;

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
     * @return GenerarManifiestoResponse
     */
    public function withMensaje($Mensaje)
    {
        $new = clone $this;
        $new->Mensaje = $Mensaje;

        return $new;
    }


}

