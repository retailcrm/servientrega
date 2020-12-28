<?php

namespace App\Servientrega\Type;

class EnviosUnidadEmpaqueCargue
{
    /**
     * @var float
     */
    private $Num_Alto;

    /**
     * @var int
     */
    private $Num_Distribuidor;

    /**
     * @var float
     */
    private $Num_Ancho;

    /**
     * @var int
     */
    private $Num_Cantidad;

    /**
     * @var string
     */
    private $Des_DiceContener;

    /**
     * @var string
     */
    private $Des_IdArchivoOrigen;

    /**
     * @var float
     */
    private $Num_Largo;

    /**
     * @var string
     */
    private $Nom_UnidadEmpaque;

    /**
     * @var float
     */
    private $Num_Peso;

    /**
     * @var string
     */
    private $Des_UnidadLongitud;

    /**
     * @var string
     */
    private $Des_UnidadPeso;

    /**
     * @var string
     */
    private $Ide_UnidadEmpaque;

    /**
     * @var string
     */
    private $Ide_Envio;

    /**
     * @var string
     */
    private $Num_Volumen;

    /**
     * @var \DateTimeInterface
     */
    private $Fec_Actualizacion;

    /**
     * @var int
     */
    private $Num_Consecutivo;

    /**
     * @var string
     */
    private $Cod_Facturacion;

    /**
     * @var string
     */
    private $Num_ValorDeclarado;

    /**
     * @var string
     */
    private $Indicador;

    /**
     * @var string
     */
    private $NumeroDeCaja;

    /**
     * @var string
     */
    private $Id_archivo;

    /**
     * @return float
     */
    public function getNum_Alto()
    {
        return $this->Num_Alto;
    }

    /**
     * @param float $Num_Alto
     *
     * @return EnviosUnidadEmpaqueCargue
     */
    public function withNum_Alto($Num_Alto)
    {
        $new           = clone $this;
        $new->Num_Alto = $Num_Alto;

        return $new;
    }

    /**
     * @return int
     */
    public function getNum_Distribuidor()
    {
        return $this->Num_Distribuidor;
    }

    /**
     * @param int $Num_Distribuidor
     *
     * @return EnviosUnidadEmpaqueCargue
     */
    public function withNum_Distribuidor($Num_Distribuidor)
    {
        $new                   = clone $this;
        $new->Num_Distribuidor = $Num_Distribuidor;

        return $new;
    }

    /**
     * @return float
     */
    public function getNum_Ancho()
    {
        return $this->Num_Ancho;
    }

    /**
     * @param float $Num_Ancho
     *
     * @return EnviosUnidadEmpaqueCargue
     */
    public function withNum_Ancho($Num_Ancho)
    {
        $new            = clone $this;
        $new->Num_Ancho = $Num_Ancho;

        return $new;
    }

    /**
     * @return int
     */
    public function getNum_Cantidad()
    {
        return $this->Num_Cantidad;
    }

    /**
     * @param int $Num_Cantidad
     *
     * @return EnviosUnidadEmpaqueCargue
     */
    public function withNum_Cantidad($Num_Cantidad)
    {
        $new               = clone $this;
        $new->Num_Cantidad = $Num_Cantidad;

        return $new;
    }

    /**
     * @return string
     */
    public function getDes_DiceContener()
    {
        return $this->Des_DiceContener;
    }

    /**
     * @param string $Des_DiceContener
     *
     * @return EnviosUnidadEmpaqueCargue
     */
    public function withDes_DiceContener($Des_DiceContener)
    {
        $new                   = clone $this;
        $new->Des_DiceContener = $Des_DiceContener;

        return $new;
    }

    /**
     * @return string
     */
    public function getDes_IdArchivoOrigen()
    {
        return $this->Des_IdArchivoOrigen;
    }

    /**
     * @param string $Des_IdArchivoOrigen
     *
     * @return EnviosUnidadEmpaqueCargue
     */
    public function withDes_IdArchivoOrigen($Des_IdArchivoOrigen)
    {
        $new                      = clone $this;
        $new->Des_IdArchivoOrigen = $Des_IdArchivoOrigen;

        return $new;
    }

    /**
     * @return float
     */
    public function getNum_Largo()
    {
        return $this->Num_Largo;
    }

    /**
     * @param float $Num_Largo
     *
     * @return EnviosUnidadEmpaqueCargue
     */
    public function withNum_Largo($Num_Largo)
    {
        $new            = clone $this;
        $new->Num_Largo = $Num_Largo;

        return $new;
    }

    /**
     * @return string
     */
    public function getNom_UnidadEmpaque()
    {
        return $this->Nom_UnidadEmpaque;
    }

    /**
     * @param string $Nom_UnidadEmpaque
     *
     * @return EnviosUnidadEmpaqueCargue
     */
    public function withNom_UnidadEmpaque($Nom_UnidadEmpaque)
    {
        $new                    = clone $this;
        $new->Nom_UnidadEmpaque = $Nom_UnidadEmpaque;

        return $new;
    }

    /**
     * @return float
     */
    public function getNum_Peso()
    {
        return $this->Num_Peso;
    }

    /**
     * @param float $Num_Peso
     *
     * @return EnviosUnidadEmpaqueCargue
     */
    public function withNum_Peso($Num_Peso)
    {
        $new           = clone $this;
        $new->Num_Peso = $Num_Peso;

        return $new;
    }

    /**
     * @return string
     */
    public function getDes_UnidadLongitud()
    {
        return $this->Des_UnidadLongitud;
    }

    /**
     * @param string $Des_UnidadLongitud
     *
     * @return EnviosUnidadEmpaqueCargue
     */
    public function withDes_UnidadLongitud($Des_UnidadLongitud)
    {
        $new                     = clone $this;
        $new->Des_UnidadLongitud = $Des_UnidadLongitud;

        return $new;
    }

    /**
     * @return string
     */
    public function getDes_UnidadPeso()
    {
        return $this->Des_UnidadPeso;
    }

    /**
     * @param string $Des_UnidadPeso
     *
     * @return EnviosUnidadEmpaqueCargue
     */
    public function withDes_UnidadPeso($Des_UnidadPeso)
    {
        $new                 = clone $this;
        $new->Des_UnidadPeso = $Des_UnidadPeso;

        return $new;
    }

    /**
     * @return string
     */
    public function getIde_UnidadEmpaque()
    {
        return $this->Ide_UnidadEmpaque;
    }

    /**
     * @param string $Ide_UnidadEmpaque
     *
     * @return EnviosUnidadEmpaqueCargue
     */
    public function withIde_UnidadEmpaque($Ide_UnidadEmpaque)
    {
        $new                    = clone $this;
        $new->Ide_UnidadEmpaque = $Ide_UnidadEmpaque;

        return $new;
    }

    /**
     * @return string
     */
    public function getIde_Envio()
    {
        return $this->Ide_Envio;
    }

    /**
     * @param string $Ide_Envio
     *
     * @return EnviosUnidadEmpaqueCargue
     */
    public function withIde_Envio($Ide_Envio)
    {
        $new            = clone $this;
        $new->Ide_Envio = $Ide_Envio;

        return $new;
    }

    /**
     * @return string
     */
    public function getNum_Volumen()
    {
        return $this->Num_Volumen;
    }

    /**
     * @param string $Num_Volumen
     *
     * @return EnviosUnidadEmpaqueCargue
     */
    public function withNum_Volumen($Num_Volumen)
    {
        $new              = clone $this;
        $new->Num_Volumen = $Num_Volumen;

        return $new;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getFec_Actualizacion()
    {
        return $this->Fec_Actualizacion;
    }

    /**
     * @param \DateTimeInterface $Fec_Actualizacion
     *
     * @return EnviosUnidadEmpaqueCargue
     */
    public function withFec_Actualizacion($Fec_Actualizacion)
    {
        $new                    = clone $this;
        $new->Fec_Actualizacion = $Fec_Actualizacion;

        return $new;
    }

    /**
     * @return int
     */
    public function getNum_Consecutivo()
    {
        return $this->Num_Consecutivo;
    }

    /**
     * @param int $Num_Consecutivo
     *
     * @return EnviosUnidadEmpaqueCargue
     */
    public function withNum_Consecutivo($Num_Consecutivo)
    {
        $new                  = clone $this;
        $new->Num_Consecutivo = $Num_Consecutivo;

        return $new;
    }

    /**
     * @return string
     */
    public function getCod_Facturacion()
    {
        return $this->Cod_Facturacion;
    }

    /**
     * @param string $Cod_Facturacion
     *
     * @return EnviosUnidadEmpaqueCargue
     */
    public function withCod_Facturacion($Cod_Facturacion)
    {
        $new                  = clone $this;
        $new->Cod_Facturacion = $Cod_Facturacion;

        return $new;
    }

    /**
     * @return string
     */
    public function getNum_ValorDeclarado()
    {
        return $this->Num_ValorDeclarado;
    }

    /**
     * @param string $Num_ValorDeclarado
     *
     * @return EnviosUnidadEmpaqueCargue
     */
    public function withNum_ValorDeclarado($Num_ValorDeclarado)
    {
        $new                     = clone $this;
        $new->Num_ValorDeclarado = $Num_ValorDeclarado;

        return $new;
    }

    /**
     * @return string
     */
    public function getIndicador()
    {
        return $this->Indicador;
    }

    /**
     * @param string $Indicador
     *
     * @return EnviosUnidadEmpaqueCargue
     */
    public function withIndicador($Indicador)
    {
        $new            = clone $this;
        $new->Indicador = $Indicador;

        return $new;
    }

    /**
     * @return string
     */
    public function getNumeroDeCaja()
    {
        return $this->NumeroDeCaja;
    }

    /**
     * @param string $NumeroDeCaja
     *
     * @return EnviosUnidadEmpaqueCargue
     */
    public function withNumeroDeCaja($NumeroDeCaja)
    {
        $new               = clone $this;
        $new->NumeroDeCaja = $NumeroDeCaja;

        return $new;
    }

    /**
     * @return string
     */
    public function getId_archivo()
    {
        return $this->Id_archivo;
    }

    /**
     * @param string $Id_archivo
     *
     * @return EnviosUnidadEmpaqueCargue
     */
    public function withId_archivo($Id_archivo)
    {
        $new             = clone $this;
        $new->Id_archivo = $Id_archivo;

        return $new;
    }
}
