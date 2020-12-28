<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\ResultInterface;

class EncriptarContrasenaResponse implements ResultInterface
{
    /**
     * @var string
     */
    private $EncriptarContrasenaResult;

    /**
     * @return string
     */
    public function getEncriptarContrasenaResult()
    {
        return $this->EncriptarContrasenaResult;
    }

    /**
     * @param string $EncriptarContrasenaResult
     *
     * @return EncriptarContrasenaResponse
     */
    public function withEncriptarContrasenaResult($EncriptarContrasenaResult)
    {
        $new                            = clone $this;
        $new->EncriptarContrasenaResult = $EncriptarContrasenaResult;

        return $new;
    }
}
