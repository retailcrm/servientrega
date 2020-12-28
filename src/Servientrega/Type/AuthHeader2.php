<?php

namespace App\Servientrega\Type;

class AuthHeader2
{
    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $pwd;

    /**
     * @var string
     */
    private $Id_CodFacturacion;

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     *
     * @return AuthHeader2
     */
    public function withLogin($login)
    {
        $new        = clone $this;
        $new->login = $login;

        return $new;
    }

    /**
     * @return string
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * @param string $pwd
     *
     * @return AuthHeader2
     */
    public function withPwd($pwd)
    {
        $new      = clone $this;
        $new->pwd = $pwd;

        return $new;
    }

    /**
     * @return string
     */
    public function getId_CodFacturacion()
    {
        return $this->Id_CodFacturacion;
    }

    /**
     * @param string $Id_CodFacturacion
     *
     * @return AuthHeader2
     */
    public function withId_CodFacturacion($Id_CodFacturacion)
    {
        $new                    = clone $this;
        $new->Id_CodFacturacion = $Id_CodFacturacion;

        return $new;
    }
}
