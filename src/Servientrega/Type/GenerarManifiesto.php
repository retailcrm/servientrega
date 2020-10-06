<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\RequestInterface;

class GenerarManifiesto implements RequestInterface
{

    /**
     * @var int
     */
    private $Omitir_EstadoImpreso_Guia;

    /**
     * @var string
     */
    private $Ide_Currier;

    /**
     * @var string
     */
    private $Nombre_Currier;

    /**
     * @var string
     */
    private $Ide_Auxiliar;

    /**
     * @var string
     */
    private $Nombre_Auxiliar;

    /**
     * @var string
     */
    private $Placa_Vehiculo;

    /**
     * @var \App\Servientrega\Type\ListaGuiasXml
     */
    private $Lista_Guias_Xml;

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
     * Constructor
     *
     * @var int $Omitir_EstadoImpreso_Guia
     * @var string $Ide_Currier
     * @var string $Nombre_Currier
     * @var string $Ide_Auxiliar
     * @var string $Nombre_Auxiliar
     * @var string $Placa_Vehiculo
     * @var \App\Servientrega\Type\ListaGuiasXml $Lista_Guias_Xml
     * @var string $cadenaBytes
     * @var \App\Servientrega\Type\ArrayOfErrorGeneradoPorGuia $Des_Error
     * @var string $Num_manifiesto
     * @var string $Mensaje
     */
    public function __construct($Omitir_EstadoImpreso_Guia, $Ide_Currier, $Nombre_Currier, $Ide_Auxiliar, $Nombre_Auxiliar, $Placa_Vehiculo, $Lista_Guias_Xml, $cadenaBytes, $Des_Error, $Num_manifiesto, $Mensaje)
    {
        $this->Omitir_EstadoImpreso_Guia = $Omitir_EstadoImpreso_Guia;
        $this->Ide_Currier = $Ide_Currier;
        $this->Nombre_Currier = $Nombre_Currier;
        $this->Ide_Auxiliar = $Ide_Auxiliar;
        $this->Nombre_Auxiliar = $Nombre_Auxiliar;
        $this->Placa_Vehiculo = $Placa_Vehiculo;
        $this->Lista_Guias_Xml = $Lista_Guias_Xml;
        $this->cadenaBytes = $cadenaBytes;
        $this->Des_Error = $Des_Error;
        $this->Num_manifiesto = $Num_manifiesto;
        $this->Mensaje = $Mensaje;
    }

    /**
     * @return int
     */
    public function getOmitir_EstadoImpreso_Guia()
    {
        return $this->Omitir_EstadoImpreso_Guia;
    }

    /**
     * @param int $Omitir_EstadoImpreso_Guia
     * @return GenerarManifiesto
     */
    public function withOmitir_EstadoImpreso_Guia($Omitir_EstadoImpreso_Guia)
    {
        $new = clone $this;
        $new->Omitir_EstadoImpreso_Guia = $Omitir_EstadoImpreso_Guia;

        return $new;
    }

    /**
     * @return string
     */
    public function getIde_Currier()
    {
        return $this->Ide_Currier;
    }

    /**
     * @param string $Ide_Currier
     * @return GenerarManifiesto
     */
    public function withIde_Currier($Ide_Currier)
    {
        $new = clone $this;
        $new->Ide_Currier = $Ide_Currier;

        return $new;
    }

    /**
     * @return string
     */
    public function getNombre_Currier()
    {
        return $this->Nombre_Currier;
    }

    /**
     * @param string $Nombre_Currier
     * @return GenerarManifiesto
     */
    public function withNombre_Currier($Nombre_Currier)
    {
        $new = clone $this;
        $new->Nombre_Currier = $Nombre_Currier;

        return $new;
    }

    /**
     * @return string
     */
    public function getIde_Auxiliar()
    {
        return $this->Ide_Auxiliar;
    }

    /**
     * @param string $Ide_Auxiliar
     * @return GenerarManifiesto
     */
    public function withIde_Auxiliar($Ide_Auxiliar)
    {
        $new = clone $this;
        $new->Ide_Auxiliar = $Ide_Auxiliar;

        return $new;
    }

    /**
     * @return string
     */
    public function getNombre_Auxiliar()
    {
        return $this->Nombre_Auxiliar;
    }

    /**
     * @param string $Nombre_Auxiliar
     * @return GenerarManifiesto
     */
    public function withNombre_Auxiliar($Nombre_Auxiliar)
    {
        $new = clone $this;
        $new->Nombre_Auxiliar = $Nombre_Auxiliar;

        return $new;
    }

    /**
     * @return string
     */
    public function getPlaca_Vehiculo()
    {
        return $this->Placa_Vehiculo;
    }

    /**
     * @param string $Placa_Vehiculo
     * @return GenerarManifiesto
     */
    public function withPlaca_Vehiculo($Placa_Vehiculo)
    {
        $new = clone $this;
        $new->Placa_Vehiculo = $Placa_Vehiculo;

        return $new;
    }

    /**
     * @return \App\Servientrega\Type\ListaGuiasXml
     */
    public function getLista_Guias_Xml()
    {
        return $this->Lista_Guias_Xml;
    }

    /**
     * @param \App\Servientrega\Type\ListaGuiasXml $Lista_Guias_Xml
     * @return GenerarManifiesto
     */
    public function withLista_Guias_Xml($Lista_Guias_Xml)
    {
        $new = clone $this;
        $new->Lista_Guias_Xml = $Lista_Guias_Xml;

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
     * @return GenerarManifiesto
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
     * @return GenerarManifiesto
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
     * @return GenerarManifiesto
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
     * @return GenerarManifiesto
     */
    public function withMensaje($Mensaje)
    {
        $new = clone $this;
        $new->Mensaje = $Mensaje;

        return $new;
    }


}

