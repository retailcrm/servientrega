<?php

namespace App\Servientrega\Exceptions;

use App\Servientrega\RestType\ClientErrorResponse;

class ClientException extends \Exception
{
    /**
     * @var ClientErrorResponse
     */
    private $response;

    public function __construct(ClientErrorResponse $response, $message = '', $code = 0, \Throwable $previous = null)
    {
        $this->response = $response;

        parent::__construct($message, $code, $previous);
    }

    public function getResponse(): ClientErrorResponse
    {
        return $this->response;
    }
}
