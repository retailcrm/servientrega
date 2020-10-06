<?php

namespace App\Servientrega\RestType;

class CalculateRequest
{
    /**
     * @var int
     */
    public $IdProducto;

    /**
     * @var int
     */
    public $NumeroPiezas;

    /**
     * @var Pieza[]
     */
    public $Piezas;

    /**
     * @var float
     */
    public $ValorDeclarado;

    /**
     * @var string
     */
    public $IdDaneCiudadOrigen;

    /**
     * @var string
     */
    public $IdDaneCiudadDestino;

    /**
     * @var bool
     */
    public $EnvioConCobro;

    /**
     * @var int
     */
    public $FormaPago;

    /**
     * @var int
     */
    public $TiempoEntrega;

    /**
     * @var int
     */
    public $MedioTransporte;

    /**
     * @var int
     */
    public $NumRecaudo;
}
