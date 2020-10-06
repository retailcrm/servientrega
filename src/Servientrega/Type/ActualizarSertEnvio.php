<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\RequestInterface;

class ActualizarSertEnvio implements RequestInterface
{

    /**
     * @var \App\Servientrega\Type\Documento
     */
    private $documento;

    /**
     * Constructor
     *
     * @var \App\Servientrega\Type\Documento $documento
     */
    public function __construct($documento)
    {
        $this->documento = $documento;
    }

    /**
     * @return \App\Servientrega\Type\Documento
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * @param \App\Servientrega\Type\Documento $documento
     * @return ActualizarSertEnvio
     */
    public function withDocumento($documento)
    {
        $new = clone $this;
        $new->documento = $documento;

        return $new;
    }


}

