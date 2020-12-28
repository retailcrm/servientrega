<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\RequestInterface;

class DesencriptarContrasena implements RequestInterface
{
    /**
     * @var string
     */
    private $strcontrasenaEncriptada;

    /**
     * Constructor
     *
     * @var string
     */
    public function __construct($strcontrasenaEncriptada)
    {
        $this->strcontrasenaEncriptada = $strcontrasenaEncriptada;
    }

    /**
     * @return string
     */
    public function getStrcontrasenaEncriptada()
    {
        return $this->strcontrasenaEncriptada;
    }

    /**
     * @param string $strcontrasenaEncriptada
     *
     * @return DesencriptarContrasena
     */
    public function withStrcontrasenaEncriptada($strcontrasenaEncriptada)
    {
        $new                          = clone $this;
        $new->strcontrasenaEncriptada = $strcontrasenaEncriptada;

        return $new;
    }
}
