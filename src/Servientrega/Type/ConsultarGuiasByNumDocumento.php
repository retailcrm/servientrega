<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\RequestInterface;

class ConsultarGuiasByNumDocumento implements RequestInterface
{

    /**
     * @var string
     */
    private $numeroGuia;

    /**
     * @var string
     */
    private $Ide_CodFacturacion;

    /**
     * Constructor
     *
     * @var string $numeroGuia
     * @var string $Ide_CodFacturacion
     */
    public function __construct($numeroGuia, $Ide_CodFacturacion)
    {
        $this->numeroGuia = $numeroGuia;
        $this->Ide_CodFacturacion = $Ide_CodFacturacion;
    }

    /**
     * @return string
     */
    public function getNumeroGuia()
    {
        return $this->numeroGuia;
    }

    /**
     * @param string $numeroGuia
     * @return ConsultarGuiasByNumDocumento
     */
    public function withNumeroGuia($numeroGuia)
    {
        $new = clone $this;
        $new->numeroGuia = $numeroGuia;

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
     * @return ConsultarGuiasByNumDocumento
     */
    public function withIde_CodFacturacion($Ide_CodFacturacion)
    {
        $new = clone $this;
        $new->Ide_CodFacturacion = $Ide_CodFacturacion;

        return $new;
    }


}

