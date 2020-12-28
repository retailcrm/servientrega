<?php

namespace App\Servientrega\Type;

class EnviosExterno
{
    /**
     * @var float
     */
    private $Num_Guia;

    /**
     * @var float
     */
    private $Num_Sobreporte;

    /**
     * @var string
     */
    private $Num_SobreCajaPorte;

    /**
     * @var string
     */
    private $Fec_Creacion;

    /**
     * @var string
     */
    private $Fec_TiempoEntrega;

    /**
     * @var string
     */
    private $Doc_Relacionado;

    /**
     * @var int
     */
    private $Num_Piezas;

    /**
     * @var int
     */
    private $Des_TipoTrayecto;

    /**
     * @var int
     */
    private $Ide_Producto;

    /**
     * @var string
     */
    private $Ide_Destinatarios;

    /**
     * @var string
     */
    private $Ide_CodFacturacion;

    /**
     * @var string
     */
    private $Ide_Manifiesto;

    /**
     * @var int
     */
    private $Des_FormaPago;

    /**
     * @var int
     */
    private $Des_MedioTransporte;

    /**
     * @var float
     */
    private $Num_PesoTotal;

    /**
     * @var float
     */
    private $Num_ValorDeclaradoTotal;

    /**
     * @var float
     */
    private $Num_VolumenTotal;

    /**
     * @var float
     */
    private $Num_BolsaSeguridad;

    /**
     * @var float
     */
    private $Num_Precinto;

    /**
     * @var int
     */
    private $Des_TipoDuracionTrayecto;

    /**
     * @var string
     */
    private $Des_Telefono;

    /**
     * @var string
     */
    private $Des_Ciudad;

    /**
     * @var string
     */
    private $Des_Direccion;

    /**
     * @var string
     */
    private $Nom_Contacto;

    /**
     * @var string
     */
    private $Des_VlrCampoPersonalizado1;

    /**
     * @var float
     */
    private $Num_ValorLiquidado;

    /**
     * @var string
     */
    private $Des_DiceContener;

    /**
     * @var int
     */
    private $Des_TipoGuia;

    /**
     * @var string
     */
    private $Des_CiudadRemitente;

    /**
     * @var float
     */
    private $Num_VlrSobreflete;

    /**
     * @var float
     */
    private $Num_VlrFlete;

    /**
     * @var float
     */
    private $Num_Descuento;

    /**
     * @var string
     */
    private $Des_DireccionRecogida;

    /**
     * @var string
     */
    private $Des_TelefonoRecogida;

    /**
     * @var string
     */
    private $Des_CiudadRecogida;

    /**
     * @var int
     */
    private $idePaisOrigen;

    /**
     * @var int
     */
    private $idePaisDestino;

    /**
     * @var string
     */
    private $Des_IdArchivoOrigen;

    /**
     * @var string
     */
    private $Ide_Num_Identific_Dest;

    /**
     * @var string
     */
    private $Ide_Num_Referencia_Dest;

    /**
     * @var string
     */
    private $Des_DireccionRemitente;

    /**
     * @var float
     */
    private $Num_PesoFacturado;

    /**
     * @var string
     */
    private $Nom_TipoTrayecto;

    /**
     * @var bool
     */
    private $Est_CanalMayorista;

    /**
     * @var string
     */
    private $Nom_Remitente;

    /**
     * @var string
     */
    private $Num_IdentiRemitente;

    /**
     * @var string
     */
    private $Num_TelefonoRemitente;

    /**
     * @var int
     */
    private $Num_Alto;

    /**
     * @var int
     */
    private $Num_Ancho;

    /**
     * @var int
     */
    private $Num_Largo;

    /**
     * @var string
     */
    private $Des_CiudadOrigen;

    /**
     * @var string
     */
    private $Des_DiceContenerSobre;

    /**
     * @var string
     */
    private $Des_DepartamentoDestino;

    /**
     * @var string
     */
    private $Des_DepartamentoOrigen;

    /**
     * @var bool
     */
    private $Gen_Cajaporte;

    /**
     * @var bool
     */
    private $Gen_Sobreporte;

    /**
     * @var string
     */
    private $Nom_UnidadEmpaque;

    /**
     * @var string
     */
    private $Nom_RemitenteCanal;

    /**
     * @var string
     */
    private $Des_UnidadLongitud;

    /**
     * @var string
     */
    private $Des_UnidadPeso;

    /**
     * @var string
     */
    private $Num_ValorDeclaradoSobreTotal;

    /**
     * @var string
     */
    private $Num_Factura;

    /**
     * @var string
     */
    private $Des_CorreoElectronico;

    /**
     * @var string
     */
    private $Num_Celular;

    /**
     * @var string
     */
    private $Id_ArchivoCargar;

    /**
     * @var string
     */
    private $Num_Recaudo;

    /**
     * @var string
     */
    private $id_zonificacion;

    /**
     * @var string
     */
    private $Des_codigopostal;

    /**
     * @var string
     */
    private $Rem_codigopostal;

    /**
     * @var string
     */
    private $CentroCosto;

    /**
     * @var string
     */
    private $ID_CANAL_DISTRIBUCION;

    /**
     * @var string
     */
    private $CASILLERO_POSTAL;

    /**
     * @var \App\Servientrega\Type\ArrayOfEnviosUnidadEmpaqueCargue
     */
    private $objEnviosUnidadEmpaqueCargue;

    /**
     * @var bool
     */
    private $Est_EnviarCorreo;

    /**
     * @var string
     */
    private $Recoleccion_Esporadica;

    /**
     * @var string
     */
    private $Tipo_Doc_Destinatario;

    /**
     * @var string
     */
    private $nombrecontacto_remitente;

    /**
     * @var string
     */
    private $celular_remitente;

    /**
     * @var string
     */
    private $correo_remitente;

    /**
     * @var string
     */
    private $Serv_Externo;

    /**
     * @var string
     */
    private $Retorno_Digital;

    /**
     * @var string
     */
    private $Pago_Datafono;

    /**
     * @return float
     */
    public function getNum_Guia()
    {
        return $this->Num_Guia;
    }

    /**
     * @param float $Num_Guia
     *
     * @return EnviosExterno
     */
    public function withNum_Guia($Num_Guia)
    {
        $new           = clone $this;
        $new->Num_Guia = $Num_Guia;

        return $new;
    }

    /**
     * @return float
     */
    public function getNum_Sobreporte()
    {
        return $this->Num_Sobreporte;
    }

    /**
     * @param float $Num_Sobreporte
     *
     * @return EnviosExterno
     */
    public function withNum_Sobreporte($Num_Sobreporte)
    {
        $new                 = clone $this;
        $new->Num_Sobreporte = $Num_Sobreporte;

        return $new;
    }

    /**
     * @return string
     */
    public function getNum_SobreCajaPorte()
    {
        return $this->Num_SobreCajaPorte;
    }

    /**
     * @param string $Num_SobreCajaPorte
     *
     * @return EnviosExterno
     */
    public function withNum_SobreCajaPorte($Num_SobreCajaPorte)
    {
        $new                     = clone $this;
        $new->Num_SobreCajaPorte = $Num_SobreCajaPorte;

        return $new;
    }

    /**
     * @return string
     */
    public function getFec_Creacion()
    {
        return $this->Fec_Creacion;
    }

    /**
     * @param string $Fec_Creacion
     *
     * @return EnviosExterno
     */
    public function withFec_Creacion($Fec_Creacion)
    {
        $new               = clone $this;
        $new->Fec_Creacion = $Fec_Creacion;

        return $new;
    }

    /**
     * @return string
     */
    public function getFec_TiempoEntrega()
    {
        return $this->Fec_TiempoEntrega;
    }

    /**
     * @param string $Fec_TiempoEntrega
     *
     * @return EnviosExterno
     */
    public function withFec_TiempoEntrega($Fec_TiempoEntrega)
    {
        $new                    = clone $this;
        $new->Fec_TiempoEntrega = $Fec_TiempoEntrega;

        return $new;
    }

    /**
     * @return string
     */
    public function getDoc_Relacionado()
    {
        return $this->Doc_Relacionado;
    }

    /**
     * @param string $Doc_Relacionado
     *
     * @return EnviosExterno
     */
    public function withDoc_Relacionado($Doc_Relacionado)
    {
        $new                  = clone $this;
        $new->Doc_Relacionado = $Doc_Relacionado;

        return $new;
    }

    /**
     * @return int
     */
    public function getNum_Piezas()
    {
        return $this->Num_Piezas;
    }

    /**
     * @param int $Num_Piezas
     *
     * @return EnviosExterno
     */
    public function withNum_Piezas($Num_Piezas)
    {
        $new             = clone $this;
        $new->Num_Piezas = $Num_Piezas;

        return $new;
    }

    /**
     * @return int
     */
    public function getDes_TipoTrayecto()
    {
        return $this->Des_TipoTrayecto;
    }

    /**
     * @param int $Des_TipoTrayecto
     *
     * @return EnviosExterno
     */
    public function withDes_TipoTrayecto($Des_TipoTrayecto)
    {
        $new                   = clone $this;
        $new->Des_TipoTrayecto = $Des_TipoTrayecto;

        return $new;
    }

    /**
     * @return int
     */
    public function getIde_Producto()
    {
        return $this->Ide_Producto;
    }

    /**
     * @param int $Ide_Producto
     *
     * @return EnviosExterno
     */
    public function withIde_Producto($Ide_Producto)
    {
        $new               = clone $this;
        $new->Ide_Producto = $Ide_Producto;

        return $new;
    }

    /**
     * @return string
     */
    public function getIde_Destinatarios()
    {
        return $this->Ide_Destinatarios;
    }

    /**
     * @param string $Ide_Destinatarios
     *
     * @return EnviosExterno
     */
    public function withIde_Destinatarios($Ide_Destinatarios)
    {
        $new                    = clone $this;
        $new->Ide_Destinatarios = $Ide_Destinatarios;

        return $new;
    }

    /**
     * @return string
     */
    public function getIde_CodFacturacion()
    {
        return $this->Ide_CodFacturacion;
    }

    /**
     * @param string $Ide_CodFacturacion
     *
     * @return EnviosExterno
     */
    public function withIde_CodFacturacion($Ide_CodFacturacion)
    {
        $new                     = clone $this;
        $new->Ide_CodFacturacion = $Ide_CodFacturacion;

        return $new;
    }

    /**
     * @return string
     */
    public function getIde_Manifiesto()
    {
        return $this->Ide_Manifiesto;
    }

    /**
     * @param string $Ide_Manifiesto
     *
     * @return EnviosExterno
     */
    public function withIde_Manifiesto($Ide_Manifiesto)
    {
        $new                 = clone $this;
        $new->Ide_Manifiesto = $Ide_Manifiesto;

        return $new;
    }

    /**
     * @return int
     */
    public function getDes_FormaPago()
    {
        return $this->Des_FormaPago;
    }

    /**
     * @param int $Des_FormaPago
     *
     * @return EnviosExterno
     */
    public function withDes_FormaPago($Des_FormaPago)
    {
        $new                = clone $this;
        $new->Des_FormaPago = $Des_FormaPago;

        return $new;
    }

    /**
     * @return int
     */
    public function getDes_MedioTransporte()
    {
        return $this->Des_MedioTransporte;
    }

    /**
     * @param int $Des_MedioTransporte
     *
     * @return EnviosExterno
     */
    public function withDes_MedioTransporte($Des_MedioTransporte)
    {
        $new                      = clone $this;
        $new->Des_MedioTransporte = $Des_MedioTransporte;

        return $new;
    }

    /**
     * @return float
     */
    public function getNum_PesoTotal()
    {
        return $this->Num_PesoTotal;
    }

    /**
     * @param float $Num_PesoTotal
     *
     * @return EnviosExterno
     */
    public function withNum_PesoTotal($Num_PesoTotal)
    {
        $new                = clone $this;
        $new->Num_PesoTotal = $Num_PesoTotal;

        return $new;
    }

    /**
     * @return float
     */
    public function getNum_ValorDeclaradoTotal()
    {
        return $this->Num_ValorDeclaradoTotal;
    }

    /**
     * @param float $Num_ValorDeclaradoTotal
     *
     * @return EnviosExterno
     */
    public function withNum_ValorDeclaradoTotal($Num_ValorDeclaradoTotal)
    {
        $new                          = clone $this;
        $new->Num_ValorDeclaradoTotal = $Num_ValorDeclaradoTotal;

        return $new;
    }

    /**
     * @return float
     */
    public function getNum_VolumenTotal()
    {
        return $this->Num_VolumenTotal;
    }

    /**
     * @param float $Num_VolumenTotal
     *
     * @return EnviosExterno
     */
    public function withNum_VolumenTotal($Num_VolumenTotal)
    {
        $new                   = clone $this;
        $new->Num_VolumenTotal = $Num_VolumenTotal;

        return $new;
    }

    /**
     * @return float
     */
    public function getNum_BolsaSeguridad()
    {
        return $this->Num_BolsaSeguridad;
    }

    /**
     * @param float $Num_BolsaSeguridad
     *
     * @return EnviosExterno
     */
    public function withNum_BolsaSeguridad($Num_BolsaSeguridad)
    {
        $new                     = clone $this;
        $new->Num_BolsaSeguridad = $Num_BolsaSeguridad;

        return $new;
    }

    /**
     * @return float
     */
    public function getNum_Precinto()
    {
        return $this->Num_Precinto;
    }

    /**
     * @param float $Num_Precinto
     *
     * @return EnviosExterno
     */
    public function withNum_Precinto($Num_Precinto)
    {
        $new               = clone $this;
        $new->Num_Precinto = $Num_Precinto;

        return $new;
    }

    /**
     * @return int
     */
    public function getDes_TipoDuracionTrayecto()
    {
        return $this->Des_TipoDuracionTrayecto;
    }

    /**
     * @param int $Des_TipoDuracionTrayecto
     *
     * @return EnviosExterno
     */
    public function withDes_TipoDuracionTrayecto($Des_TipoDuracionTrayecto)
    {
        $new                           = clone $this;
        $new->Des_TipoDuracionTrayecto = $Des_TipoDuracionTrayecto;

        return $new;
    }

    /**
     * @return string
     */
    public function getDes_Telefono()
    {
        return $this->Des_Telefono;
    }

    /**
     * @param string $Des_Telefono
     *
     * @return EnviosExterno
     */
    public function withDes_Telefono($Des_Telefono)
    {
        $new               = clone $this;
        $new->Des_Telefono = $Des_Telefono;

        return $new;
    }

    /**
     * @return string
     */
    public function getDes_Ciudad()
    {
        return $this->Des_Ciudad;
    }

    /**
     * @param string $Des_Ciudad
     *
     * @return EnviosExterno
     */
    public function withDes_Ciudad($Des_Ciudad)
    {
        $new             = clone $this;
        $new->Des_Ciudad = $Des_Ciudad;

        return $new;
    }

    /**
     * @return string
     */
    public function getDes_Direccion()
    {
        return $this->Des_Direccion;
    }

    /**
     * @param string $Des_Direccion
     *
     * @return EnviosExterno
     */
    public function withDes_Direccion($Des_Direccion)
    {
        $new                = clone $this;
        $new->Des_Direccion = $Des_Direccion;

        return $new;
    }

    /**
     * @return string
     */
    public function getNom_Contacto()
    {
        return $this->Nom_Contacto;
    }

    /**
     * @param string $Nom_Contacto
     *
     * @return EnviosExterno
     */
    public function withNom_Contacto($Nom_Contacto)
    {
        $new               = clone $this;
        $new->Nom_Contacto = $Nom_Contacto;

        return $new;
    }

    /**
     * @return string
     */
    public function getDes_VlrCampoPersonalizado1()
    {
        return $this->Des_VlrCampoPersonalizado1;
    }

    /**
     * @param string $Des_VlrCampoPersonalizado1
     *
     * @return EnviosExterno
     */
    public function withDes_VlrCampoPersonalizado1($Des_VlrCampoPersonalizado1)
    {
        $new                             = clone $this;
        $new->Des_VlrCampoPersonalizado1 = $Des_VlrCampoPersonalizado1;

        return $new;
    }

    /**
     * @return float
     */
    public function getNum_ValorLiquidado()
    {
        return $this->Num_ValorLiquidado;
    }

    /**
     * @param float $Num_ValorLiquidado
     *
     * @return EnviosExterno
     */
    public function withNum_ValorLiquidado($Num_ValorLiquidado)
    {
        $new                     = clone $this;
        $new->Num_ValorLiquidado = $Num_ValorLiquidado;

        return $new;
    }

    /**
     * @return string
     */
    public function getDes_DiceContener()
    {
        return $this->Des_DiceContener;
    }

    /**
     * @param string $Des_DiceContener
     *
     * @return EnviosExterno
     */
    public function withDes_DiceContener($Des_DiceContener)
    {
        $new                   = clone $this;
        $new->Des_DiceContener = $Des_DiceContener;

        return $new;
    }

    /**
     * @return int
     */
    public function getDes_TipoGuia()
    {
        return $this->Des_TipoGuia;
    }

    /**
     * @param int $Des_TipoGuia
     *
     * @return EnviosExterno
     */
    public function withDes_TipoGuia($Des_TipoGuia)
    {
        $new               = clone $this;
        $new->Des_TipoGuia = $Des_TipoGuia;

        return $new;
    }

    /**
     * @return string
     */
    public function getDes_CiudadRemitente()
    {
        return $this->Des_CiudadRemitente;
    }

    /**
     * @param string $Des_CiudadRemitente
     *
     * @return EnviosExterno
     */
    public function withDes_CiudadRemitente($Des_CiudadRemitente)
    {
        $new                      = clone $this;
        $new->Des_CiudadRemitente = $Des_CiudadRemitente;

        return $new;
    }

    /**
     * @return float
     */
    public function getNum_VlrSobreflete()
    {
        return $this->Num_VlrSobreflete;
    }

    /**
     * @param float $Num_VlrSobreflete
     *
     * @return EnviosExterno
     */
    public function withNum_VlrSobreflete($Num_VlrSobreflete)
    {
        $new                    = clone $this;
        $new->Num_VlrSobreflete = $Num_VlrSobreflete;

        return $new;
    }

    /**
     * @return float
     */
    public function getNum_VlrFlete()
    {
        return $this->Num_VlrFlete;
    }

    /**
     * @param float $Num_VlrFlete
     *
     * @return EnviosExterno
     */
    public function withNum_VlrFlete($Num_VlrFlete)
    {
        $new               = clone $this;
        $new->Num_VlrFlete = $Num_VlrFlete;

        return $new;
    }

    /**
     * @return float
     */
    public function getNum_Descuento()
    {
        return $this->Num_Descuento;
    }

    /**
     * @param float $Num_Descuento
     *
     * @return EnviosExterno
     */
    public function withNum_Descuento($Num_Descuento)
    {
        $new                = clone $this;
        $new->Num_Descuento = $Num_Descuento;

        return $new;
    }

    /**
     * @return string
     */
    public function getDes_DireccionRecogida()
    {
        return $this->Des_DireccionRecogida;
    }

    /**
     * @param string $Des_DireccionRecogida
     *
     * @return EnviosExterno
     */
    public function withDes_DireccionRecogida($Des_DireccionRecogida)
    {
        $new                        = clone $this;
        $new->Des_DireccionRecogida = $Des_DireccionRecogida;

        return $new;
    }

    /**
     * @return string
     */
    public function getDes_TelefonoRecogida()
    {
        return $this->Des_TelefonoRecogida;
    }

    /**
     * @param string $Des_TelefonoRecogida
     *
     * @return EnviosExterno
     */
    public function withDes_TelefonoRecogida($Des_TelefonoRecogida)
    {
        $new                       = clone $this;
        $new->Des_TelefonoRecogida = $Des_TelefonoRecogida;

        return $new;
    }

    /**
     * @return string
     */
    public function getDes_CiudadRecogida()
    {
        return $this->Des_CiudadRecogida;
    }

    /**
     * @param string $Des_CiudadRecogida
     *
     * @return EnviosExterno
     */
    public function withDes_CiudadRecogida($Des_CiudadRecogida)
    {
        $new                     = clone $this;
        $new->Des_CiudadRecogida = $Des_CiudadRecogida;

        return $new;
    }

    /**
     * @return int
     */
    public function getIdePaisOrigen()
    {
        return $this->idePaisOrigen;
    }

    /**
     * @param int $idePaisOrigen
     *
     * @return EnviosExterno
     */
    public function withIdePaisOrigen($idePaisOrigen)
    {
        $new                = clone $this;
        $new->idePaisOrigen = $idePaisOrigen;

        return $new;
    }

    /**
     * @return int
     */
    public function getIdePaisDestino()
    {
        return $this->idePaisDestino;
    }

    /**
     * @param int $idePaisDestino
     *
     * @return EnviosExterno
     */
    public function withIdePaisDestino($idePaisDestino)
    {
        $new                 = clone $this;
        $new->idePaisDestino = $idePaisDestino;

        return $new;
    }

    /**
     * @return string
     */
    public function getDes_IdArchivoOrigen()
    {
        return $this->Des_IdArchivoOrigen;
    }

    /**
     * @param string $Des_IdArchivoOrigen
     *
     * @return EnviosExterno
     */
    public function withDes_IdArchivoOrigen($Des_IdArchivoOrigen)
    {
        $new                      = clone $this;
        $new->Des_IdArchivoOrigen = $Des_IdArchivoOrigen;

        return $new;
    }

    /**
     * @return string
     */
    public function getIde_Num_Identific_Dest()
    {
        return $this->Ide_Num_Identific_Dest;
    }

    /**
     * @param string $Ide_Num_Identific_Dest
     *
     * @return EnviosExterno
     */
    public function withIde_Num_Identific_Dest($Ide_Num_Identific_Dest)
    {
        $new                         = clone $this;
        $new->Ide_Num_Identific_Dest = $Ide_Num_Identific_Dest;

        return $new;
    }

    /**
     * @return string
     */
    public function getIde_Num_Referencia_Dest()
    {
        return $this->Ide_Num_Referencia_Dest;
    }

    /**
     * @param string $Ide_Num_Referencia_Dest
     *
     * @return EnviosExterno
     */
    public function withIde_Num_Referencia_Dest($Ide_Num_Referencia_Dest)
    {
        $new                          = clone $this;
        $new->Ide_Num_Referencia_Dest = $Ide_Num_Referencia_Dest;

        return $new;
    }

    /**
     * @return string
     */
    public function getDes_DireccionRemitente()
    {
        return $this->Des_DireccionRemitente;
    }

    /**
     * @param string $Des_DireccionRemitente
     *
     * @return EnviosExterno
     */
    public function withDes_DireccionRemitente($Des_DireccionRemitente)
    {
        $new                         = clone $this;
        $new->Des_DireccionRemitente = $Des_DireccionRemitente;

        return $new;
    }

    /**
     * @return float
     */
    public function getNum_PesoFacturado()
    {
        return $this->Num_PesoFacturado;
    }

    /**
     * @param float $Num_PesoFacturado
     *
     * @return EnviosExterno
     */
    public function withNum_PesoFacturado($Num_PesoFacturado)
    {
        $new                    = clone $this;
        $new->Num_PesoFacturado = $Num_PesoFacturado;

        return $new;
    }

    /**
     * @return string
     */
    public function getNom_TipoTrayecto()
    {
        return $this->Nom_TipoTrayecto;
    }

    /**
     * @param string $Nom_TipoTrayecto
     *
     * @return EnviosExterno
     */
    public function withNom_TipoTrayecto($Nom_TipoTrayecto)
    {
        $new                   = clone $this;
        $new->Nom_TipoTrayecto = $Nom_TipoTrayecto;

        return $new;
    }

    /**
     * @return bool
     */
    public function getEst_CanalMayorista()
    {
        return $this->Est_CanalMayorista;
    }

    /**
     * @param bool $Est_CanalMayorista
     *
     * @return EnviosExterno
     */
    public function withEst_CanalMayorista($Est_CanalMayorista)
    {
        $new                     = clone $this;
        $new->Est_CanalMayorista = $Est_CanalMayorista;

        return $new;
    }

    /**
     * @return string
     */
    public function getNom_Remitente()
    {
        return $this->Nom_Remitente;
    }

    /**
     * @param string $Nom_Remitente
     *
     * @return EnviosExterno
     */
    public function withNom_Remitente($Nom_Remitente)
    {
        $new                = clone $this;
        $new->Nom_Remitente = $Nom_Remitente;

        return $new;
    }

    /**
     * @return string
     */
    public function getNum_IdentiRemitente()
    {
        return $this->Num_IdentiRemitente;
    }

    /**
     * @param string $Num_IdentiRemitente
     *
     * @return EnviosExterno
     */
    public function withNum_IdentiRemitente($Num_IdentiRemitente)
    {
        $new                      = clone $this;
        $new->Num_IdentiRemitente = $Num_IdentiRemitente;

        return $new;
    }

    /**
     * @return string
     */
    public function getNum_TelefonoRemitente()
    {
        return $this->Num_TelefonoRemitente;
    }

    /**
     * @param string $Num_TelefonoRemitente
     *
     * @return EnviosExterno
     */
    public function withNum_TelefonoRemitente($Num_TelefonoRemitente)
    {
        $new                        = clone $this;
        $new->Num_TelefonoRemitente = $Num_TelefonoRemitente;

        return $new;
    }

    /**
     * @return int
     */
    public function getNum_Alto()
    {
        return $this->Num_Alto;
    }

    /**
     * @param int $Num_Alto
     *
     * @return EnviosExterno
     */
    public function withNum_Alto($Num_Alto)
    {
        $new           = clone $this;
        $new->Num_Alto = $Num_Alto;

        return $new;
    }

    /**
     * @return int
     */
    public function getNum_Ancho()
    {
        return $this->Num_Ancho;
    }

    /**
     * @param int $Num_Ancho
     *
     * @return EnviosExterno
     */
    public function withNum_Ancho($Num_Ancho)
    {
        $new            = clone $this;
        $new->Num_Ancho = $Num_Ancho;

        return $new;
    }

    /**
     * @return int
     */
    public function getNum_Largo()
    {
        return $this->Num_Largo;
    }

    /**
     * @param int $Num_Largo
     *
     * @return EnviosExterno
     */
    public function withNum_Largo($Num_Largo)
    {
        $new            = clone $this;
        $new->Num_Largo = $Num_Largo;

        return $new;
    }

    /**
     * @return string
     */
    public function getDes_CiudadOrigen()
    {
        return $this->Des_CiudadOrigen;
    }

    /**
     * @param string $Des_CiudadOrigen
     *
     * @return EnviosExterno
     */
    public function withDes_CiudadOrigen($Des_CiudadOrigen)
    {
        $new                   = clone $this;
        $new->Des_CiudadOrigen = $Des_CiudadOrigen;

        return $new;
    }

    /**
     * @return string
     */
    public function getDes_DiceContenerSobre()
    {
        return $this->Des_DiceContenerSobre;
    }

    /**
     * @param string $Des_DiceContenerSobre
     *
     * @return EnviosExterno
     */
    public function withDes_DiceContenerSobre($Des_DiceContenerSobre)
    {
        $new                        = clone $this;
        $new->Des_DiceContenerSobre = $Des_DiceContenerSobre;

        return $new;
    }

    /**
     * @return string
     */
    public function getDes_DepartamentoDestino()
    {
        return $this->Des_DepartamentoDestino;
    }

    /**
     * @param string $Des_DepartamentoDestino
     *
     * @return EnviosExterno
     */
    public function withDes_DepartamentoDestino($Des_DepartamentoDestino)
    {
        $new                          = clone $this;
        $new->Des_DepartamentoDestino = $Des_DepartamentoDestino;

        return $new;
    }

    /**
     * @return string
     */
    public function getDes_DepartamentoOrigen()
    {
        return $this->Des_DepartamentoOrigen;
    }

    /**
     * @param string $Des_DepartamentoOrigen
     *
     * @return EnviosExterno
     */
    public function withDes_DepartamentoOrigen($Des_DepartamentoOrigen)
    {
        $new                         = clone $this;
        $new->Des_DepartamentoOrigen = $Des_DepartamentoOrigen;

        return $new;
    }

    /**
     * @return bool
     */
    public function getGen_Cajaporte()
    {
        return $this->Gen_Cajaporte;
    }

    /**
     * @param bool $Gen_Cajaporte
     *
     * @return EnviosExterno
     */
    public function withGen_Cajaporte($Gen_Cajaporte)
    {
        $new                = clone $this;
        $new->Gen_Cajaporte = $Gen_Cajaporte;

        return $new;
    }

    /**
     * @return bool
     */
    public function getGen_Sobreporte()
    {
        return $this->Gen_Sobreporte;
    }

    /**
     * @param bool $Gen_Sobreporte
     *
     * @return EnviosExterno
     */
    public function withGen_Sobreporte($Gen_Sobreporte)
    {
        $new                 = clone $this;
        $new->Gen_Sobreporte = $Gen_Sobreporte;

        return $new;
    }

    /**
     * @return string
     */
    public function getNom_UnidadEmpaque()
    {
        return $this->Nom_UnidadEmpaque;
    }

    /**
     * @param string $Nom_UnidadEmpaque
     *
     * @return EnviosExterno
     */
    public function withNom_UnidadEmpaque($Nom_UnidadEmpaque)
    {
        $new                    = clone $this;
        $new->Nom_UnidadEmpaque = $Nom_UnidadEmpaque;

        return $new;
    }

    /**
     * @return string
     */
    public function getNom_RemitenteCanal()
    {
        return $this->Nom_RemitenteCanal;
    }

    /**
     * @param string $Nom_RemitenteCanal
     *
     * @return EnviosExterno
     */
    public function withNom_RemitenteCanal($Nom_RemitenteCanal)
    {
        $new                     = clone $this;
        $new->Nom_RemitenteCanal = $Nom_RemitenteCanal;

        return $new;
    }

    /**
     * @return string
     */
    public function getDes_UnidadLongitud()
    {
        return $this->Des_UnidadLongitud;
    }

    /**
     * @param string $Des_UnidadLongitud
     *
     * @return EnviosExterno
     */
    public function withDes_UnidadLongitud($Des_UnidadLongitud)
    {
        $new                     = clone $this;
        $new->Des_UnidadLongitud = $Des_UnidadLongitud;

        return $new;
    }

    /**
     * @return string
     */
    public function getDes_UnidadPeso()
    {
        return $this->Des_UnidadPeso;
    }

    /**
     * @param string $Des_UnidadPeso
     *
     * @return EnviosExterno
     */
    public function withDes_UnidadPeso($Des_UnidadPeso)
    {
        $new                 = clone $this;
        $new->Des_UnidadPeso = $Des_UnidadPeso;

        return $new;
    }

    /**
     * @return string
     */
    public function getNum_ValorDeclaradoSobreTotal()
    {
        return $this->Num_ValorDeclaradoSobreTotal;
    }

    /**
     * @param string $Num_ValorDeclaradoSobreTotal
     *
     * @return EnviosExterno
     */
    public function withNum_ValorDeclaradoSobreTotal($Num_ValorDeclaradoSobreTotal)
    {
        $new                               = clone $this;
        $new->Num_ValorDeclaradoSobreTotal = $Num_ValorDeclaradoSobreTotal;

        return $new;
    }

    /**
     * @return string
     */
    public function getNum_Factura()
    {
        return $this->Num_Factura;
    }

    /**
     * @param string $Num_Factura
     *
     * @return EnviosExterno
     */
    public function withNum_Factura($Num_Factura)
    {
        $new              = clone $this;
        $new->Num_Factura = $Num_Factura;

        return $new;
    }

    /**
     * @return string
     */
    public function getDes_CorreoElectronico()
    {
        return $this->Des_CorreoElectronico;
    }

    /**
     * @param string $Des_CorreoElectronico
     *
     * @return EnviosExterno
     */
    public function withDes_CorreoElectronico($Des_CorreoElectronico)
    {
        $new                        = clone $this;
        $new->Des_CorreoElectronico = $Des_CorreoElectronico;

        return $new;
    }

    /**
     * @return string
     */
    public function getNum_Celular()
    {
        return $this->Num_Celular;
    }

    /**
     * @param string $Num_Celular
     *
     * @return EnviosExterno
     */
    public function withNum_Celular($Num_Celular)
    {
        $new              = clone $this;
        $new->Num_Celular = $Num_Celular;

        return $new;
    }

    /**
     * @return string
     */
    public function getId_ArchivoCargar()
    {
        return $this->Id_ArchivoCargar;
    }

    /**
     * @param string $Id_ArchivoCargar
     *
     * @return EnviosExterno
     */
    public function withId_ArchivoCargar($Id_ArchivoCargar)
    {
        $new                   = clone $this;
        $new->Id_ArchivoCargar = $Id_ArchivoCargar;

        return $new;
    }

    /**
     * @return string
     */
    public function getNum_Recaudo()
    {
        return $this->Num_Recaudo;
    }

    /**
     * @param string $Num_Recaudo
     *
     * @return EnviosExterno
     */
    public function withNum_Recaudo($Num_Recaudo)
    {
        $new              = clone $this;
        $new->Num_Recaudo = $Num_Recaudo;

        return $new;
    }

    /**
     * @return string
     */
    public function getId_zonificacion()
    {
        return $this->id_zonificacion;
    }

    /**
     * @param string $id_zonificacion
     *
     * @return EnviosExterno
     */
    public function withId_zonificacion($id_zonificacion)
    {
        $new                  = clone $this;
        $new->id_zonificacion = $id_zonificacion;

        return $new;
    }

    /**
     * @return string
     */
    public function getDes_codigopostal()
    {
        return $this->Des_codigopostal;
    }

    /**
     * @param string $Des_codigopostal
     *
     * @return EnviosExterno
     */
    public function withDes_codigopostal($Des_codigopostal)
    {
        $new                   = clone $this;
        $new->Des_codigopostal = $Des_codigopostal;

        return $new;
    }

    /**
     * @return string
     */
    public function getRem_codigopostal()
    {
        return $this->Rem_codigopostal;
    }

    /**
     * @param string $Rem_codigopostal
     *
     * @return EnviosExterno
     */
    public function withRem_codigopostal($Rem_codigopostal)
    {
        $new                   = clone $this;
        $new->Rem_codigopostal = $Rem_codigopostal;

        return $new;
    }

    /**
     * @return string
     */
    public function getCentroCosto()
    {
        return $this->CentroCosto;
    }

    /**
     * @param string $CentroCosto
     *
     * @return EnviosExterno
     */
    public function withCentroCosto($CentroCosto)
    {
        $new              = clone $this;
        $new->CentroCosto = $CentroCosto;

        return $new;
    }

    /**
     * @return string
     */
    public function getID_CANAL_DISTRIBUCION()
    {
        return $this->ID_CANAL_DISTRIBUCION;
    }

    /**
     * @param string $ID_CANAL_DISTRIBUCION
     *
     * @return EnviosExterno
     */
    public function withID_CANAL_DISTRIBUCION($ID_CANAL_DISTRIBUCION)
    {
        $new                        = clone $this;
        $new->ID_CANAL_DISTRIBUCION = $ID_CANAL_DISTRIBUCION;

        return $new;
    }

    /**
     * @return string
     */
    public function getCASILLERO_POSTAL()
    {
        return $this->CASILLERO_POSTAL;
    }

    /**
     * @param string $CASILLERO_POSTAL
     *
     * @return EnviosExterno
     */
    public function withCASILLERO_POSTAL($CASILLERO_POSTAL)
    {
        $new                   = clone $this;
        $new->CASILLERO_POSTAL = $CASILLERO_POSTAL;

        return $new;
    }

    /**
     * @return \App\Servientrega\Type\ArrayOfEnviosUnidadEmpaqueCargue
     */
    public function getObjEnviosUnidadEmpaqueCargue()
    {
        return $this->objEnviosUnidadEmpaqueCargue;
    }

    /**
     * @param \App\Servientrega\Type\ArrayOfEnviosUnidadEmpaqueCargue $objEnviosUnidadEmpaqueCargue
     *
     * @return EnviosExterno
     */
    public function withObjEnviosUnidadEmpaqueCargue($objEnviosUnidadEmpaqueCargue)
    {
        $new                               = clone $this;
        $new->objEnviosUnidadEmpaqueCargue = $objEnviosUnidadEmpaqueCargue;

        return $new;
    }

    /**
     * @return bool
     */
    public function getEst_EnviarCorreo()
    {
        return $this->Est_EnviarCorreo;
    }

    /**
     * @param bool $Est_EnviarCorreo
     *
     * @return EnviosExterno
     */
    public function withEst_EnviarCorreo($Est_EnviarCorreo)
    {
        $new                   = clone $this;
        $new->Est_EnviarCorreo = $Est_EnviarCorreo;

        return $new;
    }

    /**
     * @return string
     */
    public function getRecoleccion_Esporadica()
    {
        return $this->Recoleccion_Esporadica;
    }

    /**
     * @param string $Recoleccion_Esporadica
     *
     * @return EnviosExterno
     */
    public function withRecoleccion_Esporadica($Recoleccion_Esporadica)
    {
        $new                         = clone $this;
        $new->Recoleccion_Esporadica = $Recoleccion_Esporadica;

        return $new;
    }

    /**
     * @return string
     */
    public function getTipo_Doc_Destinatario()
    {
        return $this->Tipo_Doc_Destinatario;
    }

    /**
     * @param string $Tipo_Doc_Destinatario
     *
     * @return EnviosExterno
     */
    public function withTipo_Doc_Destinatario($Tipo_Doc_Destinatario)
    {
        $new                        = clone $this;
        $new->Tipo_Doc_Destinatario = $Tipo_Doc_Destinatario;

        return $new;
    }

    /**
     * @return string
     */
    public function getNombrecontacto_remitente()
    {
        return $this->nombrecontacto_remitente;
    }

    /**
     * @param string $nombrecontacto_remitente
     *
     * @return EnviosExterno
     */
    public function withNombrecontacto_remitente($nombrecontacto_remitente)
    {
        $new                           = clone $this;
        $new->nombrecontacto_remitente = $nombrecontacto_remitente;

        return $new;
    }

    /**
     * @return string
     */
    public function getCelular_remitente()
    {
        return $this->celular_remitente;
    }

    /**
     * @param string $celular_remitente
     *
     * @return EnviosExterno
     */
    public function withCelular_remitente($celular_remitente)
    {
        $new                    = clone $this;
        $new->celular_remitente = $celular_remitente;

        return $new;
    }

    /**
     * @return string
     */
    public function getCorreo_remitente()
    {
        return $this->correo_remitente;
    }

    /**
     * @param string $correo_remitente
     *
     * @return EnviosExterno
     */
    public function withCorreo_remitente($correo_remitente)
    {
        $new                   = clone $this;
        $new->correo_remitente = $correo_remitente;

        return $new;
    }

    /**
     * @return string
     */
    public function getServ_Externo()
    {
        return $this->Serv_Externo;
    }

    /**
     * @param string $Serv_Externo
     *
     * @return EnviosExterno
     */
    public function withServ_Externo($Serv_Externo)
    {
        $new               = clone $this;
        $new->Serv_Externo = $Serv_Externo;

        return $new;
    }

    /**
     * @return string
     */
    public function getRetorno_Digital()
    {
        return $this->Retorno_Digital;
    }

    /**
     * @param string $Retorno_Digital
     *
     * @return EnviosExterno
     */
    public function withRetorno_Digital($Retorno_Digital)
    {
        $new                  = clone $this;
        $new->Retorno_Digital = $Retorno_Digital;

        return $new;
    }

    /**
     * @return string
     */
    public function getPago_Datafono()
    {
        return $this->Pago_Datafono;
    }

    /**
     * @param string $Pago_Datafono
     *
     * @return EnviosExterno
     */
    public function withPago_Datafono($Pago_Datafono)
    {
        $new                = clone $this;
        $new->Pago_Datafono = $Pago_Datafono;

        return $new;
    }
}
