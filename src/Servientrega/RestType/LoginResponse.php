<?php

namespace App\Servientrega\RestType;

class LoginResponse
{
    /**
     * @var string
     */
    public $nombre;

    /**
     * @var string
     */
    public $login;

    /**
     * @var string
     */
    public $codFacturacion;

    /**
     * @var string
     */
    public $idCliente;

    /**
     * @var bool
     */
    public $estado;

    /**
     * @var string
     */
    public $token;

    /**
     * @var \DateTimeInterface
     */
    public $expiration;
}
