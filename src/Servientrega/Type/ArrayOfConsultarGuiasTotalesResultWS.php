<?php

namespace App\Servientrega\Type;

class ArrayOfConsultarGuiasTotalesResultWS
{

    /**
     * @var \App\Servientrega\Type\ConsultarGuiasTotalesResultWS
     */
    private $ConsultarGuiasTotalesResultWS;

    /**
     * @return \App\Servientrega\Type\ConsultarGuiasTotalesResultWS
     */
    public function getConsultarGuiasTotalesResultWS()
    {
        return $this->ConsultarGuiasTotalesResultWS;
    }

    /**
     * @param \App\Servientrega\Type\ConsultarGuiasTotalesResultWS $ConsultarGuiasTotalesResultWS
     * @return ArrayOfConsultarGuiasTotalesResultWS
     */
    public function withConsultarGuiasTotalesResultWS($ConsultarGuiasTotalesResultWS)
    {
        $new = clone $this;
        $new->ConsultarGuiasTotalesResultWS = $ConsultarGuiasTotalesResultWS;

        return $new;
    }


}

