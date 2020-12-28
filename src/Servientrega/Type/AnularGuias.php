<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\RequestInterface;

class AnularGuias implements RequestInterface
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
     * @var \App\Servientrega\Type\ArrayOfResultadoAnulacionGuias
     */
    private $interno;

    /**
     * Constructor
     *
     * @var float
     * @var float
     * @var \App\Servientrega\Type\ArrayOfResultadoAnulacionGuias
     */
    public function __construct($num_Guia, $num_GuiaFinal, $interno)
    {
        $this->num_Guia      = $num_Guia;
        $this->num_GuiaFinal = $num_GuiaFinal;
        $this->interno       = $interno;
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
     * @return AnularGuias
     */
    public function withNum_Guia($num_Guia)
    {
        $new           = clone $this;
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
     *
     * @return AnularGuias
     */
    public function withNum_GuiaFinal($num_GuiaFinal)
    {
        $new                = clone $this;
        $new->num_GuiaFinal = $num_GuiaFinal;

        return $new;
    }

    /**
     * @return \App\Servientrega\Type\ArrayOfResultadoAnulacionGuias
     */
    public function getInterno()
    {
        return $this->interno;
    }

    /**
     * @param \App\Servientrega\Type\ArrayOfResultadoAnulacionGuias $interno
     *
     * @return AnularGuias
     */
    public function withInterno($interno)
    {
        $new          = clone $this;
        $new->interno = $interno;

        return $new;
    }
}
