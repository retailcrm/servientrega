<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\RequestInterface;

class GenerarGuiaStickerTiendasVirtuales implements RequestInterface
{

    /**
     * @var float
     */
    private $num_Guia;

    /**
     * @var float
     */
    private $num_GuiaFinal;

    /**
     * @var string
     */
    private $ide_CodFacturacion;

    /**
     * @var int
     */
    private $sFormatoImpresionGuia;

    /**
     * @var string
     */
    private $Id_ArchivoCargar;

    /**
     * @var bool
     */
    private $consumoClienteExterno;

    /**
     * @var string
     */
    private $bytesReport;

    /**
     * @var string
     */
    private $correoElectronico;

    /**
     * @var string
     */
    private $solicitudRecoleccion;

    /**
     * @var string
     */
    private $Num_Remision;

    /**
     * Constructor
     *
     * @var float $num_Guia
     * @var float $num_GuiaFinal
     * @var string $ide_CodFacturacion
     * @var int $sFormatoImpresionGuia
     * @var string $Id_ArchivoCargar
     * @var bool $consumoClienteExterno
     * @var string $bytesReport
     * @var string $correoElectronico
     * @var string $solicitudRecoleccion
     * @var string $Num_Remision
     */
    public function __construct($num_Guia, $num_GuiaFinal, $ide_CodFacturacion, $sFormatoImpresionGuia, $Id_ArchivoCargar, $consumoClienteExterno, $bytesReport, $correoElectronico, $solicitudRecoleccion, $Num_Remision)
    {
        $this->num_Guia = $num_Guia;
        $this->num_GuiaFinal = $num_GuiaFinal;
        $this->ide_CodFacturacion = $ide_CodFacturacion;
        $this->sFormatoImpresionGuia = $sFormatoImpresionGuia;
        $this->Id_ArchivoCargar = $Id_ArchivoCargar;
        $this->consumoClienteExterno = $consumoClienteExterno;
        $this->bytesReport = $bytesReport;
        $this->correoElectronico = $correoElectronico;
        $this->solicitudRecoleccion = $solicitudRecoleccion;
        $this->Num_Remision = $Num_Remision;
    }

    /**
     * @return float
     */
    public function getNum_Guia()
    {
        return $this->num_Guia;
    }

    /**
     * @param float $num_Guia
     * @return GenerarGuiaStickerTiendasVirtuales
     */
    public function withNum_Guia($num_Guia)
    {
        $new = clone $this;
        $new->num_Guia = $num_Guia;

        return $new;
    }

    /**
     * @return float
     */
    public function getNum_GuiaFinal()
    {
        return $this->num_GuiaFinal;
    }

    /**
     * @param float $num_GuiaFinal
     * @return GenerarGuiaStickerTiendasVirtuales
     */
    public function withNum_GuiaFinal($num_GuiaFinal)
    {
        $new = clone $this;
        $new->num_GuiaFinal = $num_GuiaFinal;

        return $new;
    }

    /**
     * @return string
     */
    public function getIde_CodFacturacion()
    {
        return $this->ide_CodFacturacion;
    }

    /**
     * @param string $ide_CodFacturacion
     * @return GenerarGuiaStickerTiendasVirtuales
     */
    public function withIde_CodFacturacion($ide_CodFacturacion)
    {
        $new = clone $this;
        $new->ide_CodFacturacion = $ide_CodFacturacion;

        return $new;
    }

    /**
     * @return int
     */
    public function getSFormatoImpresionGuia()
    {
        return $this->sFormatoImpresionGuia;
    }

    /**
     * @param int $sFormatoImpresionGuia
     * @return GenerarGuiaStickerTiendasVirtuales
     */
    public function withSFormatoImpresionGuia($sFormatoImpresionGuia)
    {
        $new = clone $this;
        $new->sFormatoImpresionGuia = $sFormatoImpresionGuia;

        return $new;
    }

    /**
     * @return string
     */
    public function getId_ArchivoCargar()
    {
        return $this->Id_ArchivoCargar;
    }

    /**
     * @param string $Id_ArchivoCargar
     * @return GenerarGuiaStickerTiendasVirtuales
     */
    public function withId_ArchivoCargar($Id_ArchivoCargar)
    {
        $new = clone $this;
        $new->Id_ArchivoCargar = $Id_ArchivoCargar;

        return $new;
    }

    /**
     * @return bool
     */
    public function getConsumoClienteExterno()
    {
        return $this->consumoClienteExterno;
    }

    /**
     * @param bool $consumoClienteExterno
     * @return GenerarGuiaStickerTiendasVirtuales
     */
    public function withConsumoClienteExterno($consumoClienteExterno)
    {
        $new = clone $this;
        $new->consumoClienteExterno = $consumoClienteExterno;

        return $new;
    }

    /**
     * @return string
     */
    public function getBytesReport()
    {
        return $this->bytesReport;
    }

    /**
     * @param string $bytesReport
     * @return GenerarGuiaStickerTiendasVirtuales
     */
    public function withBytesReport($bytesReport)
    {
        $new = clone $this;
        $new->bytesReport = $bytesReport;

        return $new;
    }

    /**
     * @return string
     */
    public function getCorreoElectronico()
    {
        return $this->correoElectronico;
    }

    /**
     * @param string $correoElectronico
     * @return GenerarGuiaStickerTiendasVirtuales
     */
    public function withCorreoElectronico($correoElectronico)
    {
        $new = clone $this;
        $new->correoElectronico = $correoElectronico;

        return $new;
    }

    /**
     * @return string
     */
    public function getSolicitudRecoleccion()
    {
        return $this->solicitudRecoleccion;
    }

    /**
     * @param string $solicitudRecoleccion
     * @return GenerarGuiaStickerTiendasVirtuales
     */
    public function withSolicitudRecoleccion($solicitudRecoleccion)
    {
        $new = clone $this;
        $new->solicitudRecoleccion = $solicitudRecoleccion;

        return $new;
    }

    /**
     * @return string
     */
    public function getNum_Remision()
    {
        return $this->Num_Remision;
    }

    /**
     * @param string $Num_Remision
     * @return GenerarGuiaStickerTiendasVirtuales
     */
    public function withNum_Remision($Num_Remision)
    {
        $new = clone $this;
        $new->Num_Remision = $Num_Remision;

        return $new;
    }


}

