<?php

namespace App\Servientrega\TrackingType;

use DateTimeImmutable;

class MovimientosDTO
{
    public $IdProc;
    public $IdConc;
    public $NomConc;
    public $NomMov;
    public $OriMov;
    public $DesMov;

    /**
     * @var DateTimeImmutable
     */
    public $FecMov;
    public $IdViewCliente;
    public $TipoMov;
    public $FechaProb;
    public $DesTipoMov;
}
