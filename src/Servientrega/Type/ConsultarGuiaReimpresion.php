<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\RequestInterface;

class ConsultarGuiaReimpresion implements RequestInterface
{
    /**
     * @var float
     */
    private $numeroGuia;

    /**
     * Constructor
     *
     * @var float
     */
    public function __construct($numeroGuia)
    {
        $this->numeroGuia = $numeroGuia;
    }

    /**
     * @return float
     */
    public function getNumeroGuia()
    {
        return $this->numeroGuia;
    }

    /**
     * @param float $numeroGuia
     *
     * @return ConsultarGuiaReimpresion
     */
    public function withNumeroGuia($numeroGuia)
    {
        $new             = clone $this;
        $new->numeroGuia = $numeroGuia;

        return $new;
    }
}
