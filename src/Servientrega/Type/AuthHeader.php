<?php

namespace App\Servientrega\Type;

class AuthHeader
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
     * @var string
     */
    private $Nombre_Cargue;

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     * @return AuthHeader
     */
    public function withLogin($login)
    {
        $new = clone $this;
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
     * @return AuthHeader
     */
    public function withPwd($pwd)
    {
        $new = clone $this;
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
     * @return AuthHeader
     */
    public function withId_CodFacturacion($Id_CodFacturacion)
    {
        $new = clone $this;
        $new->Id_CodFacturacion = $Id_CodFacturacion;

        return $new;
    }

    /**
     * @return string
     */
    public function getNombre_Cargue()
    {
        return $this->Nombre_Cargue;
    }

    /**
     * @param string $Nombre_Cargue
     * @return AuthHeader
     */
    public function withNombre_Cargue($Nombre_Cargue)
    {
        $new = clone $this;
        $new->Nombre_Cargue = $Nombre_Cargue;

        return $new;
    }


}

