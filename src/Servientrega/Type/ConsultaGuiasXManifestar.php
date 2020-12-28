<?php

namespace App\Servientrega\Type;

class ConsultaGuiasXManifestar
{
    /**
     * @var int
     */
    private $NumGuia;

    /**
     * @return int
     */
    public function getNumGuia()
    {
        return $this->NumGuia;
    }

    /**
     * @param int $NumGuia
     *
     * @return ConsultaGuiasXManifestar
     */
    public function withNumGuia($NumGuia)
    {
        $new          = clone $this;
        $new->NumGuia = $NumGuia;

        return $new;
    }
}
