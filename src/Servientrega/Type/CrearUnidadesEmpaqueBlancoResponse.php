<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\ResultInterface;

class CrearUnidadesEmpaqueBlancoResponse implements ResultInterface
{
    /**
     * @var \App\Servientrega\Type\CrearUnidadesEmpaqueBlancoResult
     */
    private $CrearUnidadesEmpaqueBlancoResult;

    /**
     * @return \App\Servientrega\Type\CrearUnidadesEmpaqueBlancoResult
     */
    public function getCrearUnidadesEmpaqueBlancoResult()
    {
        return $this->CrearUnidadesEmpaqueBlancoResult;
    }

    /**
     * @param \App\Servientrega\Type\CrearUnidadesEmpaqueBlancoResult $CrearUnidadesEmpaqueBlancoResult
     *
     * @return CrearUnidadesEmpaqueBlancoResponse
     */
    public function withCrearUnidadesEmpaqueBlancoResult($CrearUnidadesEmpaqueBlancoResult)
    {
        $new                                   = clone $this;
        $new->CrearUnidadesEmpaqueBlancoResult = $CrearUnidadesEmpaqueBlancoResult;

        return $new;
    }
}
