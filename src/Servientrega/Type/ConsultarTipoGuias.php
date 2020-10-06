<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\RequestInterface;

class ConsultarTipoGuias implements RequestInterface
{

    /**
     * @var string
     */
    private $Mensaje;

    /**
     * Constructor
     *
     * @var string $Mensaje
     */
    public function __construct($Mensaje)
    {
        $this->Mensaje = $Mensaje;
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
     * @return ConsultarTipoGuias
     */
    public function withMensaje($Mensaje)
    {
        $new = clone $this;
        $new->Mensaje = $Mensaje;

        return $new;
    }


}

