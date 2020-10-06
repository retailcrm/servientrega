<?php

namespace App\Servientrega;

use App\Servientrega\Type;
use Phpro\SoapClient\Type\ResultInterface;
use Phpro\SoapClient\Exception\SoapException;
use Phpro\SoapClient\Type\RequestInterface;

class ServientregaClient extends \Phpro\SoapClient\Client
{
    /**
     * @param RequestInterface|Type\DesencriptarContrasena $parameters
     * @return ResultInterface|Type\DesencriptarContrasenaResponse
     * @throws SoapException
     */
    public function desencriptarContrasena(\App\Servientrega\Type\DesencriptarContrasena $parameters) : \App\Servientrega\Type\DesencriptarContrasenaResponse
    {
        return $this->call('DesencriptarContrasena', $parameters);
    }

    /**
     * @param RequestInterface|Type\EncriptarContrasena $parameters
     * @return ResultInterface|Type\EncriptarContrasenaResponse
     * @throws SoapException
     */
    public function encriptarContrasena(\App\Servientrega\Type\EncriptarContrasena $parameters) : \App\Servientrega\Type\EncriptarContrasenaResponse
    {
        return $this->call('EncriptarContrasena', $parameters);
    }

    /**
     * @param RequestInterface|Type\CargueMasivoExterno $parameters
     * @return ResultInterface|Type\CargueMasivoExternoResponse
     * @throws SoapException
     */
    public function cargueMasivoExterno(\App\Servientrega\Type\CargueMasivoExterno $parameters) : \App\Servientrega\Type\CargueMasivoExternoResponse
    {
        return $this->call('CargueMasivoExterno', $parameters);
    }

    /**
     * @param RequestInterface|Type\CargueMasivoExternoDetalle $parameters
     * @return ResultInterface|Type\CargueMasivoExternoDetalleResponse
     * @throws SoapException
     */
    public function cargueMasivoExternoDetalle(\App\Servientrega\Type\CargueMasivoExternoDetalle $parameters) : \App\Servientrega\Type\CargueMasivoExternoDetalleResponse
    {
        return $this->call('CargueMasivoExternoDetalle', $parameters);
    }

    /**
     * @param RequestInterface|Type\GenerarGuiaSticker $parameters
     * @return ResultInterface|Type\GenerarGuiaStickerResponse
     * @throws SoapException
     */
    public function generarGuiaSticker(\App\Servientrega\Type\GenerarGuiaSticker $parameters) : \App\Servientrega\Type\GenerarGuiaStickerResponse
    {
        return $this->call('GenerarGuiaSticker', $parameters);
    }

    /**
     * @param RequestInterface|Type\GenerarGuiaStickerMobile $parameters
     * @return ResultInterface|Type\GenerarGuiaStickerMobileResponse
     * @throws SoapException
     */
    public function generarGuiaStickerMobile(\App\Servientrega\Type\GenerarGuiaStickerMobile $parameters) : \App\Servientrega\Type\GenerarGuiaStickerMobileResponse
    {
        return $this->call('GenerarGuiaStickerMobile', $parameters);
    }

    /**
     * @param RequestInterface|Type\GenerarGuiaStickerTiendasVirtuales $parameters
     * @return ResultInterface|Type\GenerarGuiaStickerTiendasVirtualesResponse
     * @throws SoapException
     */
    public function generarGuiaStickerTiendasVirtuales(\App\Servientrega\Type\GenerarGuiaStickerTiendasVirtuales $parameters) : \App\Servientrega\Type\GenerarGuiaStickerTiendasVirtualesResponse
    {
        return $this->call('GenerarGuiaStickerTiendasVirtuales', $parameters);
    }

    /**
     * @param RequestInterface|Type\ConsultarUnidadEmpaqueIdLogin $parameters
     * @return ResultInterface|Type\ConsultarUnidadEmpaqueIdLoginResponse
     * @throws SoapException
     */
    public function consultarUnidadEmpaqueIdLogin(\App\Servientrega\Type\ConsultarUnidadEmpaqueIdLogin $parameters) : \App\Servientrega\Type\ConsultarUnidadEmpaqueIdLoginResponse
    {
        return $this->call('ConsultarUnidadEmpaqueIdLogin', $parameters);
    }

    /**
     * @param RequestInterface|Type\ConsultarRestriccionesFisicasEnvios $parameters
     * @return ResultInterface|Type\ConsultarRestriccionesFisicasEnviosResponse
     * @throws SoapException
     */
    public function consultarRestriccionesFisicasEnvios(\App\Servientrega\Type\ConsultarRestriccionesFisicasEnvios $parameters) : \App\Servientrega\Type\ConsultarRestriccionesFisicasEnviosResponse
    {
        return $this->call('ConsultarRestriccionesFisicasEnvios', $parameters);
    }

    /**
     * @param RequestInterface|Type\ConsultarGuiasByNumDocumento $parameters
     * @return ResultInterface|Type\ConsultarGuiasByNumDocumentoResponse
     * @throws SoapException
     */
    public function consultarGuiasByNumDocumento(\App\Servientrega\Type\ConsultarGuiasByNumDocumento $parameters) : \App\Servientrega\Type\ConsultarGuiasByNumDocumentoResponse
    {
        return $this->call('ConsultarGuiasByNumDocumento', $parameters);
    }

    /**
     * @param RequestInterface|Type\InsertarSertEnvio $parameters
     * @return ResultInterface|Type\InsertarSertEnvioResponse
     * @throws SoapException
     */
    public function insertarSertEnvio(\App\Servientrega\Type\InsertarSertEnvio $parameters) : \App\Servientrega\Type\InsertarSertEnvioResponse
    {
        return $this->call('InsertarSertEnvio', $parameters);
    }

    /**
     * @param RequestInterface|Type\ActualizarSertEnvio $parameters
     * @return ResultInterface|Type\ActualizarSertEnvioResponse
     * @throws SoapException
     */
    public function actualizarSertEnvio(\App\Servientrega\Type\ActualizarSertEnvio $parameters) : \App\Servientrega\Type\ActualizarSertEnvioResponse
    {
        return $this->call('ActualizarSertEnvio', $parameters);
    }

    /**
     * @param RequestInterface|Type\ActualizarEnvioAgregarUnidades $parameters
     * @return ResultInterface|Type\ActualizarEnvioAgregarUnidadesResponse
     * @throws SoapException
     */
    public function actualizarEnvioAgregarUnidades(\App\Servientrega\Type\ActualizarEnvioAgregarUnidades $parameters) : \App\Servientrega\Type\ActualizarEnvioAgregarUnidadesResponse
    {
        return $this->call('ActualizarEnvioAgregarUnidades', $parameters);
    }

    /**
     * @param RequestInterface|Type\ValidarActualizarEnvio $parameters
     * @return ResultInterface|Type\ValidarActualizarEnvioResponse
     * @throws SoapException
     */
    public function validarActualizarEnvio(\App\Servientrega\Type\ValidarActualizarEnvio $parameters) : \App\Servientrega\Type\ValidarActualizarEnvioResponse
    {
        return $this->call('ValidarActualizarEnvio', $parameters);
    }

    /**
     * @param RequestInterface|Type\CrearUnidadesEmpaqueBlanco $parameters
     * @return ResultInterface|Type\CrearUnidadesEmpaqueBlancoResponse
     * @throws SoapException
     */
    public function crearUnidadesEmpaqueBlanco(\App\Servientrega\Type\CrearUnidadesEmpaqueBlanco $parameters) : \App\Servientrega\Type\CrearUnidadesEmpaqueBlancoResponse
    {
        return $this->call('CrearUnidadesEmpaqueBlanco', $parameters);
    }

    /**
     * @param RequestInterface|Type\GenerarGuiaStikerData $parameters
     * @return ResultInterface|Type\GenerarGuiaStikerDataResponse
     * @throws SoapException
     */
    public function generarGuiaStikerData(\App\Servientrega\Type\GenerarGuiaStikerData $parameters) : \App\Servientrega\Type\GenerarGuiaStikerDataResponse
    {
        return $this->call('GenerarGuiaStikerData', $parameters);
    }

    /**
     * @param RequestInterface|Type\GenerarGuiaStikerDataReimpresion $parameters
     * @return ResultInterface|Type\GenerarGuiaStikerDataReimpresionResponse
     * @throws SoapException
     */
    public function generarGuiaStikerDataReimpresion(\App\Servientrega\Type\GenerarGuiaStikerDataReimpresion $parameters) : \App\Servientrega\Type\GenerarGuiaStikerDataReimpresionResponse
    {
        return $this->call('GenerarGuiaStikerDataReimpresion', $parameters);
    }

    /**
     * @param RequestInterface|Type\ConsultarGuiaReimpresion $parameters
     * @return ResultInterface|Type\ConsultarGuiaReimpresionResponse
     * @throws SoapException
     */
    public function consultarGuiaReimpresion(\App\Servientrega\Type\ConsultarGuiaReimpresion $parameters) : \App\Servientrega\Type\ConsultarGuiaReimpresionResponse
    {
        return $this->call('ConsultarGuiaReimpresion', $parameters);
    }

    /**
     * @param RequestInterface|Type\AnularGuias $parameters
     * @return ResultInterface|Type\AnularGuiasResponse
     * @throws SoapException
     */
    public function anularGuias(\App\Servientrega\Type\AnularGuias $parameters) : \App\Servientrega\Type\AnularGuiasResponse
    {
        return $this->call('AnularGuias', $parameters);
    }

    /**
     * @param RequestInterface|Type\RangoGuias $parameters
     * @return ResultInterface|Type\RangoGuiasResponse
     * @throws SoapException
     */
    public function rangoGuias(\App\Servientrega\Type\RangoGuias $parameters) : \App\Servientrega\Type\RangoGuiasResponse
    {
        return $this->call('RangoGuias', $parameters);
    }

    /**
     * @param RequestInterface|Type\GenerarManifiesto $parameters
     * @return ResultInterface|Type\GenerarManifiestoResponse
     * @throws SoapException
     */
    public function generarManifiesto(\App\Servientrega\Type\GenerarManifiesto $parameters) : \App\Servientrega\Type\GenerarManifiestoResponse
    {
        return $this->call('GenerarManifiesto', $parameters);
    }

    /**
     * @param RequestInterface|Type\ConsultarTipoGuias $parameters
     * @return ResultInterface|Type\ConsultarTipoGuiasResponse
     * @throws SoapException
     */
    public function consultarTipoGuias(\App\Servientrega\Type\ConsultarTipoGuias $parameters) : \App\Servientrega\Type\ConsultarTipoGuiasResponse
    {
        return $this->call('ConsultarTipoGuias', $parameters);
    }

    /**
     * @param RequestInterface|Type\ConsultaRangosGuias $parameters
     * @return ResultInterface|Type\ConsultaRangosGuiasResponse
     * @throws SoapException
     */
    public function consultaRangosGuias(\App\Servientrega\Type\ConsultaRangosGuias $parameters) : \App\Servientrega\Type\ConsultaRangosGuiasResponse
    {
        return $this->call('ConsultaRangosGuias', $parameters);
    }

    /**
     * @param RequestInterface|Type\GuiasPendientesXManifestar $parameters
     * @return ResultInterface|Type\GuiasPendientesXManifestarResponse
     * @throws SoapException
     */
    public function guiasPendientesXManifestar(\App\Servientrega\Type\GuiasPendientesXManifestar $parameters) : \App\Servientrega\Type\GuiasPendientesXManifestarResponse
    {
        return $this->call('GuiasPendientesXManifestar', $parameters);
    }
}

