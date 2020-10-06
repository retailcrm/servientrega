<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\RequestInterface;

class CrearUnidadesEmpaqueBlanco implements RequestInterface
{

    /**
     * @var string
     */
    private $ideEnvio;

    /**
     * @var string
     */
    private $Ide_CodFacturacion;

    /**
     * Constructor
     *
     * @var string $ideEnvio
     * @var string $Ide_CodFacturacion
     */
    public function __construct($ideEnvio, $Ide_CodFacturacion)
    {
        $this->ideEnvio = $ideEnvio;
        $this->Ide_CodFacturacion = $Ide_CodFacturacion;
    }

    /**
     * @return string
     */
    public function getIdeEnvio()
    {
        return $this->ideEnvio;
    }

    /**
     * @param string $ideEnvio
     * @return CrearUnidadesEmpaqueBlanco
     */
    public function withIdeEnvio($ideEnvio)
    {
        $new = clone $this;
        $new->ideEnvio = $ideEnvio;

        return $new;
    }

    /**
     * @return string
     */
    public function getIde_CodFacturacion()
    {
        return $this->Ide_CodFacturacion;
    }

    /**
     * @param string $Ide_CodFacturacion
     * @return CrearUnidadesEmpaqueBlanco
     */
    public function withIde_CodFacturacion($Ide_CodFacturacion)
    {
        $new = clone $this;
        $new->Ide_CodFacturacion = $Ide_CodFacturacion;

        return $new;
    }


}

