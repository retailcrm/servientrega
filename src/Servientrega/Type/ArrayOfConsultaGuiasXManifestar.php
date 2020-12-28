<?php

namespace App\Servientrega\Type;

class ArrayOfConsultaGuiasXManifestar
{
    /**
     * @var \App\Servientrega\Type\ConsultaGuiasXManifestar
     */
    private $ConsultaGuiasXManifestar;

    /**
     * @return \App\Servientrega\Type\ConsultaGuiasXManifestar
     */
    public function getConsultaGuiasXManifestar()
    {
        return $this->ConsultaGuiasXManifestar;
    }

    /**
     * @param \App\Servientrega\Type\ConsultaGuiasXManifestar $ConsultaGuiasXManifestar
     *
     * @return ArrayOfConsultaGuiasXManifestar
     */
    public function withConsultaGuiasXManifestar($ConsultaGuiasXManifestar)
    {
        $new                           = clone $this;
        $new->ConsultaGuiasXManifestar = $ConsultaGuiasXManifestar;

        return $new;
    }
}
