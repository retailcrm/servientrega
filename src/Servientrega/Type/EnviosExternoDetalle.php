<?php

namespace App\Servientrega\Type;

class EnviosExternoDetalle
{

    /**
     * @var string
     */
    private $Numero_palet;

    /**
     * @var string
     */
    private $Numero_Suborden;

    /**
     * @var string
     */
    private $Numero_F12;

    /**
     * @var string
     */
    private $Numero_segundo_F12;

    /**
     * @var string
     */
    private $Fecha_F12;

    /**
     * @var string
     */
    private $Tipo_Documento_F11F12;

    /**
     * @var string
     */
    private $Ciudad_Origen;

    /**
     * @var string
     */
    private $Departamento_Origen;

    /**
     * @var string
     */
    private $Ciudad_Destino;

    /**
     * @var string
     */
    private $Departamento_Destino;

    /**
     * @var string
     */
    private $Tipo_producto;

    /**
     * @var string
     */
    private $Cantidad_Bultos;

    /**
     * @var string
     */
    private $Tipo_Documento;

    /**
     * @var string
     */
    private $Tipo_Contenido;

    /**
     * @var string
     */
    private $Monto_Declarado;

    /**
     * @var string
     */
    private $Rut_Destinatario;

    /**
     * @var string
     */
    private $Digito_verificador_Rut_Destinatario;

    /**
     * @var string
     */
    private $Nombres;

    /**
     * @var string
     */
    private $Telefono;

    /**
     * @var string
     */
    private $Calle;

    /**
     * @var string
     */
    private $Comuna;

    /**
     * @var string
     */
    private $Region;

    /**
     * @var \App\Servientrega\Type\ArrayOfEnviosUnidadEmpaqueCargueDetalle
     */
    private $objEnviosUnidadEmpaqueCargueDetalle;

    /**
     * @return string
     */
    public function getNumero_palet()
    {
        return $this->Numero_palet;
    }

    /**
     * @param string $Numero_palet
     * @return EnviosExternoDetalle
     */
    public function withNumero_palet($Numero_palet)
    {
        $new = clone $this;
        $new->Numero_palet = $Numero_palet;

        return $new;
    }

    /**
     * @return string
     */
    public function getNumero_Suborden()
    {
        return $this->Numero_Suborden;
    }

    /**
     * @param string $Numero_Suborden
     * @return EnviosExternoDetalle
     */
    public function withNumero_Suborden($Numero_Suborden)
    {
        $new = clone $this;
        $new->Numero_Suborden = $Numero_Suborden;

        return $new;
    }

    /**
     * @return string
     */
    public function getNumero_F12()
    {
        return $this->Numero_F12;
    }

    /**
     * @param string $Numero_F12
     * @return EnviosExternoDetalle
     */
    public function withNumero_F12($Numero_F12)
    {
        $new = clone $this;
        $new->Numero_F12 = $Numero_F12;

        return $new;
    }

    /**
     * @return string
     */
    public function getNumero_segundo_F12()
    {
        return $this->Numero_segundo_F12;
    }

    /**
     * @param string $Numero_segundo_F12
     * @return EnviosExternoDetalle
     */
    public function withNumero_segundo_F12($Numero_segundo_F12)
    {
        $new = clone $this;
        $new->Numero_segundo_F12 = $Numero_segundo_F12;

        return $new;
    }

    /**
     * @return string
     */
    public function getFecha_F12()
    {
        return $this->Fecha_F12;
    }

    /**
     * @param string $Fecha_F12
     * @return EnviosExternoDetalle
     */
    public function withFecha_F12($Fecha_F12)
    {
        $new = clone $this;
        $new->Fecha_F12 = $Fecha_F12;

        return $new;
    }

    /**
     * @return string
     */
    public function getTipo_Documento_F11F12()
    {
        return $this->Tipo_Documento_F11F12;
    }

    /**
     * @param string $Tipo_Documento_F11F12
     * @return EnviosExternoDetalle
     */
    public function withTipo_Documento_F11F12($Tipo_Documento_F11F12)
    {
        $new = clone $this;
        $new->Tipo_Documento_F11F12 = $Tipo_Documento_F11F12;

        return $new;
    }

    /**
     * @return string
     */
    public function getCiudad_Origen()
    {
        return $this->Ciudad_Origen;
    }

    /**
     * @param string $Ciudad_Origen
     * @return EnviosExternoDetalle
     */
    public function withCiudad_Origen($Ciudad_Origen)
    {
        $new = clone $this;
        $new->Ciudad_Origen = $Ciudad_Origen;

        return $new;
    }

    /**
     * @return string
     */
    public function getDepartamento_Origen()
    {
        return $this->Departamento_Origen;
    }

    /**
     * @param string $Departamento_Origen
     * @return EnviosExternoDetalle
     */
    public function withDepartamento_Origen($Departamento_Origen)
    {
        $new = clone $this;
        $new->Departamento_Origen = $Departamento_Origen;

        return $new;
    }

    /**
     * @return string
     */
    public function getCiudad_Destino()
    {
        return $this->Ciudad_Destino;
    }

    /**
     * @param string $Ciudad_Destino
     * @return EnviosExternoDetalle
     */
    public function withCiudad_Destino($Ciudad_Destino)
    {
        $new = clone $this;
        $new->Ciudad_Destino = $Ciudad_Destino;

        return $new;
    }

    /**
     * @return string
     */
    public function getDepartamento_Destino()
    {
        return $this->Departamento_Destino;
    }

    /**
     * @param string $Departamento_Destino
     * @return EnviosExternoDetalle
     */
    public function withDepartamento_Destino($Departamento_Destino)
    {
        $new = clone $this;
        $new->Departamento_Destino = $Departamento_Destino;

        return $new;
    }

    /**
     * @return string
     */
    public function getTipo_producto()
    {
        return $this->Tipo_producto;
    }

    /**
     * @param string $Tipo_producto
     * @return EnviosExternoDetalle
     */
    public function withTipo_producto($Tipo_producto)
    {
        $new = clone $this;
        $new->Tipo_producto = $Tipo_producto;

        return $new;
    }

    /**
     * @return string
     */
    public function getCantidad_Bultos()
    {
        return $this->Cantidad_Bultos;
    }

    /**
     * @param string $Cantidad_Bultos
     * @return EnviosExternoDetalle
     */
    public function withCantidad_Bultos($Cantidad_Bultos)
    {
        $new = clone $this;
        $new->Cantidad_Bultos = $Cantidad_Bultos;

        return $new;
    }

    /**
     * @return string
     */
    public function getTipo_Documento()
    {
        return $this->Tipo_Documento;
    }

    /**
     * @param string $Tipo_Documento
     * @return EnviosExternoDetalle
     */
    public function withTipo_Documento($Tipo_Documento)
    {
        $new = clone $this;
        $new->Tipo_Documento = $Tipo_Documento;

        return $new;
    }

    /**
     * @return string
     */
    public function getTipo_Contenido()
    {
        return $this->Tipo_Contenido;
    }

    /**
     * @param string $Tipo_Contenido
     * @return EnviosExternoDetalle
     */
    public function withTipo_Contenido($Tipo_Contenido)
    {
        $new = clone $this;
        $new->Tipo_Contenido = $Tipo_Contenido;

        return $new;
    }

    /**
     * @return string
     */
    public function getMonto_Declarado()
    {
        return $this->Monto_Declarado;
    }

    /**
     * @param string $Monto_Declarado
     * @return EnviosExternoDetalle
     */
    public function withMonto_Declarado($Monto_Declarado)
    {
        $new = clone $this;
        $new->Monto_Declarado = $Monto_Declarado;

        return $new;
    }

    /**
     * @return string
     */
    public function getRut_Destinatario()
    {
        return $this->Rut_Destinatario;
    }

    /**
     * @param string $Rut_Destinatario
     * @return EnviosExternoDetalle
     */
    public function withRut_Destinatario($Rut_Destinatario)
    {
        $new = clone $this;
        $new->Rut_Destinatario = $Rut_Destinatario;

        return $new;
    }

    /**
     * @return string
     */
    public function getDigito_verificador_Rut_Destinatario()
    {
        return $this->Digito_verificador_Rut_Destinatario;
    }

    /**
     * @param string $Digito_verificador_Rut_Destinatario
     * @return EnviosExternoDetalle
     */
    public function withDigito_verificador_Rut_Destinatario($Digito_verificador_Rut_Destinatario)
    {
        $new = clone $this;
        $new->Digito_verificador_Rut_Destinatario = $Digito_verificador_Rut_Destinatario;

        return $new;
    }

    /**
     * @return string
     */
    public function getNombres()
    {
        return $this->Nombres;
    }

    /**
     * @param string $Nombres
     * @return EnviosExternoDetalle
     */
    public function withNombres($Nombres)
    {
        $new = clone $this;
        $new->Nombres = $Nombres;

        return $new;
    }

    /**
     * @return string
     */
    public function getTelefono()
    {
        return $this->Telefono;
    }

    /**
     * @param string $Telefono
     * @return EnviosExternoDetalle
     */
    public function withTelefono($Telefono)
    {
        $new = clone $this;
        $new->Telefono = $Telefono;

        return $new;
    }

    /**
     * @return string
     */
    public function getCalle()
    {
        return $this->Calle;
    }

    /**
     * @param string $Calle
     * @return EnviosExternoDetalle
     */
    public function withCalle($Calle)
    {
        $new = clone $this;
        $new->Calle = $Calle;

        return $new;
    }

    /**
     * @return string
     */
    public function getComuna()
    {
        return $this->Comuna;
    }

    /**
     * @param string $Comuna
     * @return EnviosExternoDetalle
     */
    public function withComuna($Comuna)
    {
        $new = clone $this;
        $new->Comuna = $Comuna;

        return $new;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->Region;
    }

    /**
     * @param string $Region
     * @return EnviosExternoDetalle
     */
    public function withRegion($Region)
    {
        $new = clone $this;
        $new->Region = $Region;

        return $new;
    }

    /**
     * @return \App\Servientrega\Type\ArrayOfEnviosUnidadEmpaqueCargueDetalle
     */
    public function getObjEnviosUnidadEmpaqueCargueDetalle()
    {
        return $this->objEnviosUnidadEmpaqueCargueDetalle;
    }

    /**
     * @param \App\Servientrega\Type\ArrayOfEnviosUnidadEmpaqueCargueDetalle $objEnviosUnidadEmpaqueCargueDetalle
     * @return EnviosExternoDetalle
     */
    public function withObjEnviosUnidadEmpaqueCargueDetalle($objEnviosUnidadEmpaqueCargueDetalle)
    {
        $new = clone $this;
        $new->objEnviosUnidadEmpaqueCargueDetalle = $objEnviosUnidadEmpaqueCargueDetalle;

        return $new;
    }


}

