<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\ResultInterface;

class AnularGuiasResponse implements ResultInterface
{
    /**
     * @var string
     */
    private $AnularGuiasResult;

    /**
     * @var \App\Servientrega\Type\ArrayOfResultadoAnulacionGuias
     */
    private $interno;

    /**
     * @return string
     */
    public function getAnularGuiasResult()
    {
        return $this->AnularGuiasResult;
    }

    /**
     * @param string $AnularGuiasResult
     *
     * @return AnularGuiasResponse
     */
    public function withAnularGuiasResult($AnularGuiasResult)
    {
        $new                    = clone $this;
        $new->AnularGuiasResult = $AnularGuiasResult;

        return $new;
    }

    /**
     * @return \App\Servientrega\Type\ArrayOfResultadoAnulacionGuias
     */
    public function getInterno()
    {
        return $this->interno;
    }

    /**
     * @param \App\Servientrega\Type\ArrayOfResultadoAnulacionGuias $interno
     *
     * @return AnularGuiasResponse
     */
    public function withInterno($interno)
    {
        $new          = clone $this;
        $new->interno = $interno;

        return $new;
    }
}
