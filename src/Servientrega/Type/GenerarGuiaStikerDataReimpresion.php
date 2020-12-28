<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\RequestInterface;

class GenerarGuiaStikerDataReimpresion implements RequestInterface
{
    /**
     * @var \App\Servientrega\Type\ArrayOfLong
     */
    private $num_GuiaArreglo;

    /**
     * @var string
     */
    private $ide_CodFacturacion;

    /**
     * @var int
     */
    private $des_TipoGuia;

    /**
     * @var string
     */
    private $Id_ArchivoCargar;

    /**
     * @var bool
     */
    private $interno;

    /**
     * Constructor
     *
     * @var \App\Servientrega\Type\ArrayOfLong
     * @var string
     * @var int
     * @var string
     * @var bool
     */
    public function __construct($num_GuiaArreglo, $ide_CodFacturacion, $des_TipoGuia, $Id_ArchivoCargar, $interno)
    {
        $this->num_GuiaArreglo    = $num_GuiaArreglo;
        $this->ide_CodFacturacion = $ide_CodFacturacion;
        $this->des_TipoGuia       = $des_TipoGuia;
        $this->Id_ArchivoCargar   = $Id_ArchivoCargar;
        $this->interno            = $interno;
    }

    /**
     * @return \App\Servientrega\Type\ArrayOfLong
     */
    public function getNum_GuiaArreglo()
    {
        return $this->num_GuiaArreglo;
    }

    /**
     * @param \App\Servientrega\Type\ArrayOfLong $num_GuiaArreglo
     *
     * @return GenerarGuiaStikerDataReimpresion
     */
    public function withNum_GuiaArreglo($num_GuiaArreglo)
    {
        $new                  = clone $this;
        $new->num_GuiaArreglo = $num_GuiaArreglo;

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
     * @return GenerarGuiaStikerDataReimpresion
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
    public function getDes_TipoGuia()
    {
        return $this->des_TipoGuia;
    }

    /**
     * @param int $des_TipoGuia
     *
     * @return GenerarGuiaStikerDataReimpresion
     */
    public function withDes_TipoGuia($des_TipoGuia)
    {
        $new               = clone $this;
        $new->des_TipoGuia = $des_TipoGuia;

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
     * @return GenerarGuiaStikerDataReimpresion
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
     * @return GenerarGuiaStikerDataReimpresion
     */
    public function withInterno($interno)
    {
        $new          = clone $this;
        $new->interno = $interno;

        return $new;
    }
}
