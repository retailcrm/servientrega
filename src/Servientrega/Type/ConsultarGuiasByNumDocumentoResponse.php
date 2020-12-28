<?php

namespace App\Servientrega\Type;

use Phpro\SoapClient\Type\ResultInterface;

class ConsultarGuiasByNumDocumentoResponse implements ResultInterface
{
    /**
     * @var \App\Servientrega\Type\ConsultarGuiasByNumDocumentoResult
     */
    private $ConsultarGuiasByNumDocumentoResult;

    /**
     * @return \App\Servientrega\Type\ConsultarGuiasByNumDocumentoResult
     */
    public function getConsultarGuiasByNumDocumentoResult()
    {
        return $this->ConsultarGuiasByNumDocumentoResult;
    }

    /**
     * @param \App\Servientrega\Type\ConsultarGuiasByNumDocumentoResult $ConsultarGuiasByNumDocumentoResult
     *
     * @return ConsultarGuiasByNumDocumentoResponse
     */
    public function withConsultarGuiasByNumDocumentoResult($ConsultarGuiasByNumDocumentoResult)
    {
        $new                                     = clone $this;
        $new->ConsultarGuiasByNumDocumentoResult = $ConsultarGuiasByNumDocumentoResult;

        return $new;
    }
}
