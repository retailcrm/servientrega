<?php

namespace App\Servientrega\Type;

class Documento
{
    /**
     * @var \App\Servientrega\Type\AnyXML
     */
    private $any;

    /**
     * @return \App\Servientrega\Type\AnyXML
     */
    public function getAny()
    {
        return $this->any;
    }

    /**
     * @param \App\Servientrega\Type\AnyXML $any
     *
     * @return Documento
     */
    public function withAny($any)
    {
        $new      = clone $this;
        $new->any = $any;

        return $new;
    }
}
