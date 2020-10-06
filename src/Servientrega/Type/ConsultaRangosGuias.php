<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\RequestInterface;

class ConsultaRangosGuias implements RequestInterface
{

    /**
     * @var string
     */
    private $Mensaje;

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
     * @var string $Mensaje
     * @var string $idTrazaAuditoria
     * @var string $usuarioTrazaAuditoria
     * @var string $urlTrazaAuditoria
     */
    public function __construct($Mensaje, $idTrazaAuditoria, $usuarioTrazaAuditoria, $urlTrazaAuditoria)
    {
        $this->Mensaje = $Mensaje;
        $this->idTrazaAuditoria = $idTrazaAuditoria;
        $this->usuarioTrazaAuditoria = $usuarioTrazaAuditoria;
        $this->urlTrazaAuditoria = $urlTrazaAuditoria;
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
     * @return ConsultaRangosGuias
     */
    public function withMensaje($Mensaje)
    {
        $new = clone $this;
        $new->Mensaje = $Mensaje;

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
     * @return ConsultaRangosGuias
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
     * @return ConsultaRangosGuias
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
     * @return ConsultaRangosGuias
     */
    public function withUrlTrazaAuditoria($urlTrazaAuditoria)
    {
        $new = clone $this;
        $new->urlTrazaAuditoria = $urlTrazaAuditoria;

        return $new;
    }


}

