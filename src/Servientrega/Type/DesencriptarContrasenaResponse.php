<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\ResultInterface;

class DesencriptarContrasenaResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $DesencriptarContrasenaResult;

    /**
     * @return string
     */
    public function getDesencriptarContrasenaResult()
    {
        return $this->DesencriptarContrasenaResult;
    }

    /**
     * @param string $DesencriptarContrasenaResult
     * @return DesencriptarContrasenaResponse
     */
    public function withDesencriptarContrasenaResult($DesencriptarContrasenaResult)
    {
        $new = clone $this;
        $new->DesencriptarContrasenaResult = $DesencriptarContrasenaResult;

        return $new;
    }


}

