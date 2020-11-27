<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\RequestInterface;

class GenerarGuiaSticker implements RequestInterface
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
    private $interno;

    /**
     * @var string
     */
    private $bytesReport;

    /**
     * Constructor
     *
     * @var float $num_Guia
     * @var float $num_GuiaFinal
     * @var string $ide_CodFacturacion
     */
    public function __construct($num_Guia, $num_GuiaFinal, $ide_CodFacturacion)
    {
        $this->num_Guia = $num_Guia;
        $this->num_GuiaFinal = $num_GuiaFinal;
        $this->ide_CodFacturacion = $ide_CodFacturacion;
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
     * @return GenerarGuiaSticker
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
     * @return GenerarGuiaSticker
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
     * @return GenerarGuiaSticker
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
     * @return GenerarGuiaSticker
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
     * @return GenerarGuiaSticker
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
    public function getInterno()
    {
        return $this->interno;
    }

    /**
     * @param bool $interno
     * @return GenerarGuiaSticker
     */
    public function withInterno($interno)
    {
        $new = clone $this;
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
     * @return GenerarGuiaSticker
     */
    public function withBytesReport($bytesReport)
    {
        $new = clone $this;
        $new->bytesReport = $bytesReport;

        return $new;
    }


}

