<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\RequestInterface;

class RangoGuias implements RequestInterface
{
    /**
     * @var int
     */
    private $Tipo_Guia;

    /**
     * @var string
     */
    private $mensaje;

    /**
     * Constructor
     *
     * @var int
     * @var string
     */
    public function __construct($Tipo_Guia, $mensaje)
    {
        $this->Tipo_Guia = $Tipo_Guia;
        $this->mensaje   = $mensaje;
    }

    /**
     * @return int
     */
    public function getTipo_Guia()
    {
        return $this->Tipo_Guia;
    }

    /**
     * @param int $Tipo_Guia
     *
     * @return RangoGuias
     */
    public function withTipo_Guia($Tipo_Guia)
    {
        $new            = clone $this;
        $new->Tipo_Guia = $Tipo_Guia;

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
     *
     * @return RangoGuias
     */
    public function withMensaje($mensaje)
    {
        $new          = clone $this;
        $new->mensaje = $mensaje;

        return $new;
    }
}
