<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\RequestInterface;

class GenerarGuiaStickerMobile implements RequestInterface
{
    /**
     * @var float
     */
    private $num_Guia;

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
    private $interno;

    /**
     * @var string
     */
    private $bytesReport;

    /**
     * Constructor
     *
     * @var float
     * @var string
     * @var int
     * @var string
     * @var bool
     * @var string
     */
    public function __construct($num_Guia, $ide_CodFacturacion, $sFormatoImpresionGuia, $Id_ArchivoCargar, $interno, $bytesReport)
    {
        $this->num_Guia              = $num_Guia;
        $this->ide_CodFacturacion    = $ide_CodFacturacion;
        $this->sFormatoImpresionGuia = $sFormatoImpresionGuia;
        $this->Id_ArchivoCargar      = $Id_ArchivoCargar;
        $this->interno               = $interno;
        $this->bytesReport           = $bytesReport;
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
     *
     * @return GenerarGuiaStickerMobile
     */
    public function withNum_Guia($num_Guia)
    {
        $new           = clone $this;
        $new->num_Guia = $num_Guia;

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
     *
     * @return GenerarGuiaStickerMobile
     */
    public function withIde_CodFacturacion($ide_CodFacturacion)
    {
        $new                     = clone $this;
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
     *
     * @return GenerarGuiaStickerMobile
     */
    public function withSFormatoImpresionGuia($sFormatoImpresionGuia)
    {
        $new                        = clone $this;
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
     *
     * @return GenerarGuiaStickerMobile
     */
    public function withId_ArchivoCargar($Id_ArchivoCargar)
    {
        $new                   = clone $this;
        $new->Id_ArchivoCargar = $Id_ArchivoCargar;

        return $new;
    }

    /**
     * @return bool
     */
    public function getInterno()
    {
        return $this->interno;
    }

    /**
     * @param bool $interno
     *
     * @return GenerarGuiaStickerMobile
     */
    public function withInterno($interno)
    {
        $new          = clone $this;
        $new->interno = $interno;

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
     *
     * @return GenerarGuiaStickerMobile
     */
    public function withBytesReport($bytesReport)
    {
        $new              = clone $this;
        $new->bytesReport = $bytesReport;

        return $new;
    }
}
