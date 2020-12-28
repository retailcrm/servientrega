<?php

namespace App\Servientrega\TrackingType;

class GuiasDTO
{
    public $NumGui;

    /**
     * @var \DateTimeImmutable
     */
    public $FecEnv;
    public $NumPie;
    public $CiuRem;
    public $NomRem;
    public $DirRem;
    public $CiuDes;
    public $NomDes;
    public $DirDes;
    public $IdEstAct;
    public $EstAct;

    /**
     * @var \DateTimeImmutable
     */
    public $FecEst;
    public $NomRec;
    public $NumCun;
    public $Regime;

    /**
     * @var Movimientos[]
     */
    public $Movimientos;
    public $Placa;
    public $IdGPS;
    public $MensajeBuscarImagen;
}
