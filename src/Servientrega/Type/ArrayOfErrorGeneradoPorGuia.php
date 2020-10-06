<?php

namespace App\Servientrega\Type;

class ArrayOfErrorGeneradoPorGuia
{

    /**
     * @var \App\Servientrega\Type\ErrorGeneradoPorGuia
     */
    private $ErrorGeneradoPorGuia;

    /**
     * @return \App\Servientrega\Type\ErrorGeneradoPorGuia
     */
    public function getErrorGeneradoPorGuia()
    {
        return $this->ErrorGeneradoPorGuia;
    }

    /**
     * @param \App\Servientrega\Type\ErrorGeneradoPorGuia $ErrorGeneradoPorGuia
     * @return ArrayOfErrorGeneradoPorGuia
     */
    public function withErrorGeneradoPorGuia($ErrorGeneradoPorGuia)
    {
        $new = clone $this;
        $new->ErrorGeneradoPorGuia = $ErrorGeneradoPorGuia;

        return $new;
    }


}

