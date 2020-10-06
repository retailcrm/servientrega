<?php

namespace App\Servientrega\Type;

class EnviosUnidadEmpaqueCargueDetalle
{

    /**
     * @var float
     */
    private $Num_Alto;

    /**
     * @var float
     */
    private $Num_Ancho;

    /**
     * @var float
     */
    private $Num_Largo;

    /**
     * @var float
     */
    private $Num_Peso;

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
    private $Nom_UnidadEmpaque;

    /**
     * @var string
     */
    private $Num_ValorDeclarado;

    /**
     * @return float
     */
    public function getNum_Alto()
    {
        return $this->Num_Alto;
    }

    /**
     * @param float $Num_Alto
     * @return EnviosUnidadEmpaqueCargueDetalle
     */
    public function withNum_Alto($Num_Alto)
    {
        $new = clone $this;
        $new->Num_Alto = $Num_Alto;

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
     * @return EnviosUnidadEmpaqueCargueDetalle
     */
    public function withNum_Ancho($Num_Ancho)
    {
        $new = clone $this;
        $new->Num_Ancho = $Num_Ancho;

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
     * @return EnviosUnidadEmpaqueCargueDetalle
     */
    public function withNum_Largo($Num_Largo)
    {
        $new = clone $this;
        $new->Num_Largo = $Num_Largo;

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
     * @return EnviosUnidadEmpaqueCargueDetalle
     */
    public function withNum_Peso($Num_Peso)
    {
        $new = clone $this;
        $new->Num_Peso = $Num_Peso;

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
     * @return EnviosUnidadEmpaqueCargueDetalle
     */
    public function withNum_Cantidad($Num_Cantidad)
    {
        $new = clone $this;
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
     * @return EnviosUnidadEmpaqueCargueDetalle
     */
    public function withDes_DiceContener($Des_DiceContener)
    {
        $new = clone $this;
        $new->Des_DiceContener = $Des_DiceContener;

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
     * @return EnviosUnidadEmpaqueCargueDetalle
     */
    public function withNom_UnidadEmpaque($Nom_UnidadEmpaque)
    {
        $new = clone $this;
        $new->Nom_UnidadEmpaque = $Nom_UnidadEmpaque;

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
     * @return EnviosUnidadEmpaqueCargueDetalle
     */
    public function withNum_ValorDeclarado($Num_ValorDeclarado)
    {
        $new = clone $this;
        $new->Num_ValorDeclarado = $Num_ValorDeclarado;

        return $new;
    }


}

