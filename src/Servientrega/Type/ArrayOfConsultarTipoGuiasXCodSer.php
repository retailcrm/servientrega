<?php

namespace App\Servientrega\Type;

class ArrayOfConsultarTipoGuiasXCodSer
{
    /**
     * @var \App\Servientrega\Type\ConsultarTipoGuiasXCodSer
     */
    private $ConsultarTipoGuiasXCodSer;

    /**
     * @return \App\Servientrega\Type\ConsultarTipoGuiasXCodSer
     */
    public function getConsultarTipoGuiasXCodSer()
    {
        return $this->ConsultarTipoGuiasXCodSer;
    }

    /**
     * @param \App\Servientrega\Type\ConsultarTipoGuiasXCodSer $ConsultarTipoGuiasXCodSer
     *
     * @return ArrayOfConsultarTipoGuiasXCodSer
     */
    public function withConsultarTipoGuiasXCodSer($ConsultarTipoGuiasXCodSer)
    {
        $new                            = clone $this;
        $new->ConsultarTipoGuiasXCodSer = $ConsultarTipoGuiasXCodSer;

        return $new;
    }
}
