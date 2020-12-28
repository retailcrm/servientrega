<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\RequestInterface;

class EncriptarContrasena implements RequestInterface
{
    /**
     * @var string
     */
    private $strcontrasena;

    /**
     * Constructor
     *
     * @var string
     */
    public function __construct($strcontrasena)
    {
        $this->strcontrasena = $strcontrasena;
    }

    /**
     * @return string
     */
    public function getStrcontrasena()
    {
        return $this->strcontrasena;
    }

    /**
     * @param string $strcontrasena
     *
     * @return EncriptarContrasena
     */
    public function withStrcontrasena($strcontrasena)
    {
        $new                = clone $this;
        $new->strcontrasena = $strcontrasena;

        return $new;
    }
}
