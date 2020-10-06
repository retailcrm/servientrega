<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\RequestInterface;

class GuiasPendientesXManifestar implements RequestInterface
{

    /**
     * @var string
     */
    private $FechaInicial;

    /**
     * @var string
     */
    private $FechaFinal;

    /**
     * @var string
     */
    private $mensaje;

    /**
     * @var string
     */
    private $idTrazaAuditoria;

    /**
     * @var string
     */
    private $usuarioTrazaAuditoria;

    /**
     * @var string
     */
    private $urlTrazaAuditoria;

    /**
     * Constructor
     *
     * @var string $FechaInicial
     * @var string $FechaFinal
     * @var string $mensaje
     * @var string $idTrazaAuditoria
     * @var string $usuarioTrazaAuditoria
     * @var string $urlTrazaAuditoria
     */
    public function __construct($FechaInicial, $FechaFinal, $mensaje, $idTrazaAuditoria, $usuarioTrazaAuditoria, $urlTrazaAuditoria)
    {
        $this->FechaInicial = $FechaInicial;
        $this->FechaFinal = $FechaFinal;
        $this->mensaje = $mensaje;
        $this->idTrazaAuditoria = $idTrazaAuditoria;
        $this->usuarioTrazaAuditoria = $usuarioTrazaAuditoria;
        $this->urlTrazaAuditoria = $urlTrazaAuditoria;
    }

    /**
     * @return string
     */
    public function getFechaInicial()
    {
        return $this->FechaInicial;
    }

    /**
     * @param string $FechaInicial
     * @return GuiasPendientesXManifestar
     */
    public function withFechaInicial($FechaInicial)
    {
        $new = clone $this;
        $new->FechaInicial = $FechaInicial;

        return $new;
    }

    /**
     * @return string
     */
    public function getFechaFinal()
    {
        return $this->FechaFinal;
    }

    /**
     * @param string $FechaFinal
     * @return GuiasPendientesXManifestar
     */
    public function withFechaFinal($FechaFinal)
    {
        $new = clone $this;
        $new->FechaFinal = $FechaFinal;

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
     * @return GuiasPendientesXManifestar
     */
    public function withMensaje($mensaje)
    {
        $new = clone $this;
        $new->mensaje = $mensaje;

        return $new;
    }

    /**
     * @return string
     */
    public function getIdTrazaAuditoria()
    {
        return $this->idTrazaAuditoria;
    }

    /**
     * @param string $idTrazaAuditoria
     * @return GuiasPendientesXManifestar
     */
    public function withIdTrazaAuditoria($idTrazaAuditoria)
    {
        $new = clone $this;
        $new->idTrazaAuditoria = $idTrazaAuditoria;

        return $new;
    }

    /**
     * @return string
     */
    public function getUsuarioTrazaAuditoria()
    {
        return $this->usuarioTrazaAuditoria;
    }

    /**
     * @param string $usuarioTrazaAuditoria
     * @return GuiasPendientesXManifestar
     */
    public function withUsuarioTrazaAuditoria($usuarioTrazaAuditoria)
    {
        $new = clone $this;
        $new->usuarioTrazaAuditoria = $usuarioTrazaAuditoria;

        return $new;
    }

    /**
     * @return string
     */
    public function getUrlTrazaAuditoria()
    {
        return $this->urlTrazaAuditoria;
    }

    /**
     * @param string $urlTrazaAuditoria
     * @return GuiasPendientesXManifestar
     */
    public function withUrlTrazaAuditoria($urlTrazaAuditoria)
    {
        $new = clone $this;
        $new->urlTrazaAuditoria = $urlTrazaAuditoria;

        return $new;
    }


}

