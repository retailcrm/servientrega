<?php

namespace App\Servientrega\Type;

class ErrorGeneradoPorGuia
{
    /**
     * @var string
     */
    private $NumGuia;

    /**
     * @var string
     */
    private $DesError;

    /**
     * @return string
     */
    public function getNumGuia()
    {
        return $this->NumGuia;
    }

    /**
     * @param string $NumGuia
     *
     * @return ErrorGeneradoPorGuia
     */
    public function withNumGuia($NumGuia)
    {
        $new          = clone $this;
        $new->NumGuia = $NumGuia;

        return $new;
    }

    /**
     * @return string
     */
    public function getDesError()
    {
        return $this->DesError;
    }

    /**
     * @param string $DesError
     *
     * @return ErrorGeneradoPorGuia
     */
    public function withDesError($DesError)
    {
        $new           = clone $this;
        $new->DesError = $DesError;

        return $new;
    }
}
