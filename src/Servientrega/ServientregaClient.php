<?php

namespace App\Servientrega;

use Phpro\SoapClient\Exception\SoapException;
use Phpro\SoapClient\Type\RequestInterface;
use Phpro\SoapClient\Type\ResultInterface;

class ServientregaClient extends \Phpro\SoapClient\Client
{
    /**
     * @param RequestInterface|Type\DesencriptarContrasena $parameters
     *
     * @return ResultInterface|Type\DesencriptarContrasenaResponse
     *
     * @throws SoapException
     */
    public function desencriptarContrasena(Type\DesencriptarContrasena $parameters): Type\DesencriptarContrasenaResponse
    {
        return $this->call('DesencriptarContrasena', $parameters);
    }

    /**
     * @param RequestInterface|Type\EncriptarContrasena $parameters
     *
     * @return ResultInterface|Type\EncriptarContrasenaResponse
     *
     * @throws SoapException
     */
    public function encriptarContrasena(Type\EncriptarContrasena $parameters): Type\EncriptarContrasenaResponse
    {
        return $this->call('EncriptarContrasena', $parameters);
    }

    /**
     * @param RequestInterface|Type\CargueMasivoExterno $parameters
     *
     * @return ResultInterface|Type\CargueMasivoExternoResponse
     *
     * @throws SoapException
     */
    public function cargueMasivoExterno(Type\CargueMasivoExterno $parameters): Type\CargueMasivoExternoResponse
    {
        return $this->call('CargueMasivoExterno', $parameters);
    }

    /**
     * @param RequestInterface|Type\CargueMasivoExternoDetalle $parameters
     *
     * @return ResultInterface|Type\CargueMasivoExternoDetalleResponse
     *
     * @throws SoapException
     */
    public function cargueMasivoExternoDetalle(Type\CargueMasivoExternoDetalle $parameters): Type\CargueMasivoExternoDetalleResponse
    {
        return $this->call('CargueMasivoExternoDetalle', $parameters);
    }

    /**
     * @param RequestInterface|Type\GenerarGuiaSticker $parameters
     *
     * @return ResultInterface|Type\GenerarGuiaStickerResponse
     *
     * @throws SoapException
     */
    public function generarGuiaSticker(Type\GenerarGuiaSticker $parameters): Type\GenerarGuiaStickerResponse
    {
        return $this->call('GenerarGuiaSticker', $parameters);
    }

    /**
     * @param RequestInterface|Type\GenerarGuiaStickerMobile $parameters
     *
     * @return ResultInterface|Type\GenerarGuiaStickerMobileResponse
     *
     * @throws SoapException
     */
    public function generarGuiaStickerMobile(Type\GenerarGuiaStickerMobile $parameters): Type\GenerarGuiaStickerMobileResponse
    {
        return $this->call('GenerarGuiaStickerMobile', $parameters);
    }

    /**
     * @param RequestInterface|Type\GenerarGuiaStickerTiendasVirtuales $parameters
     *
     * @return ResultInterface|Type\GenerarGuiaStickerTiendasVirtualesResponse
     *
     * @throws SoapException
     */
    public function generarGuiaStickerTiendasVirtuales(Type\GenerarGuiaStickerTiendasVirtuales $parameters): Type\GenerarGuiaStickerTiendasVirtualesResponse
    {
        return $this->call('GenerarGuiaStickerTiendasVirtuales', $parameters);
    }

    /**
     * @param RequestInterface|Type\ConsultarUnidadEmpaqueIdLogin $parameters
     *
     * @return ResultInterface|Type\ConsultarUnidadEmpaqueIdLoginResponse
     *
     * @throws SoapException
     */
    public function consultarUnidadEmpaqueIdLogin(Type\ConsultarUnidadEmpaqueIdLogin $parameters): Type\ConsultarUnidadEmpaqueIdLoginResponse
    {
        return $this->call('ConsultarUnidadEmpaqueIdLogin', $parameters);
    }

    /**
     * @param RequestInterface|Type\ConsultarRestriccionesFisicasEnvios $parameters
     *
     * @return ResultInterface|Type\ConsultarRestriccionesFisicasEnviosResponse
     *
     * @throws SoapException
     */
    public function consultarRestriccionesFisicasEnvios(Type\ConsultarRestriccionesFisicasEnvios $parameters): Type\ConsultarRestriccionesFisicasEnviosResponse
    {
        return $this->call('ConsultarRestriccionesFisicasEnvios', $parameters);
    }

    /**
     * @param RequestInterface|Type\ConsultarGuiasByNumDocumento $parameters
     *
     * @return ResultInterface|Type\ConsultarGuiasByNumDocumentoResponse
     *
     * @throws SoapException
     */
    public function consultarGuiasByNumDocumento(Type\ConsultarGuiasByNumDocumento $parameters): Type\ConsultarGuiasByNumDocumentoResponse
    {
        return $this->call('ConsultarGuiasByNumDocumento', $parameters);
    }

    /**
     * @param RequestInterface|Type\InsertarSertEnvio $parameters
     *
     * @return ResultInterface|Type\InsertarSertEnvioResponse
     *
     * @throws SoapException
     */
    public function insertarSertEnvio(Type\InsertarSertEnvio $parameters): Type\InsertarSertEnvioResponse
    {
        return $this->call('InsertarSertEnvio', $parameters);
    }

    /**
     * @param RequestInterface|Type\ActualizarSertEnvio $parameters
     *
     * @return ResultInterface|Type\ActualizarSertEnvioResponse
     *
     * @throws SoapException
     */
    public function actualizarSertEnvio(Type\ActualizarSertEnvio $parameters): Type\ActualizarSertEnvioResponse
    {
        return $this->call('ActualizarSertEnvio', $parameters);
    }

    /**
     * @param RequestInterface|Type\ActualizarEnvioAgregarUnidades $parameters
     *
     * @return ResultInterface|Type\ActualizarEnvioAgregarUnidadesResponse
     *
     * @throws SoapException
     */
    public function actualizarEnvioAgregarUnidades(Type\ActualizarEnvioAgregarUnidades $parameters): Type\ActualizarEnvioAgregarUnidadesResponse
    {
        return $this->call('ActualizarEnvioAgregarUnidades', $parameters);
    }

    /**
     * @param RequestInterface|Type\ValidarActualizarEnvio $parameters
     *
     * @return ResultInterface|Type\ValidarActualizarEnvioResponse
     *
     * @throws SoapException
     */
    public function validarActualizarEnvio(Type\ValidarActualizarEnvio $parameters): Type\ValidarActualizarEnvioResponse
    {
        return $this->call('ValidarActualizarEnvio', $parameters);
    }

    /**
     * @param RequestInterface|Type\CrearUnidadesEmpaqueBlanco $parameters
     *
     * @return ResultInterface|Type\CrearUnidadesEmpaqueBlancoResponse
     *
     * @throws SoapException
     */
    public function crearUnidadesEmpaqueBlanco(Type\CrearUnidadesEmpaqueBlanco $parameters): Type\CrearUnidadesEmpaqueBlancoResponse
    {
        return $this->call('CrearUnidadesEmpaqueBlanco', $parameters);
    }

    /**
     * @param RequestInterface|Type\GenerarGuiaStikerData $parameters
     *
     * @return ResultInterface|Type\GenerarGuiaStikerDataResponse
     *
     * @throws SoapException
     */
    public function generarGuiaStikerData(Type\GenerarGuiaStikerData $parameters): Type\GenerarGuiaStikerDataResponse
    {
        return $this->call('GenerarGuiaStikerData', $parameters);
    }

    /**
     * @param RequestInterface|Type\GenerarGuiaStikerDataReimpresion $parameters
     *
     * @return ResultInterface|Type\GenerarGuiaStikerDataReimpresionResponse
     *
     * @throws SoapException
     */
    public function generarGuiaStikerDataReimpresion(Type\GenerarGuiaStikerDataReimpresion $parameters): Type\GenerarGuiaStikerDataReimpresionResponse
    {
        return $this->call('GenerarGuiaStikerDataReimpresion', $parameters);
    }

    /**
     * @param RequestInterface|Type\ConsultarGuiaReimpresion $parameters
     *
     * @return ResultInterface|Type\ConsultarGuiaReimpresionResponse
     *
     * @throws SoapException
     */
    public function consultarGuiaReimpresion(Type\ConsultarGuiaReimpresion $parameters): Type\ConsultarGuiaReimpresionResponse
    {
        return $this->call('ConsultarGuiaReimpresion', $parameters);
    }

    /**
     * @param RequestInterface|Type\AnularGuias $parameters
     *
     * @return ResultInterface|Type\AnularGuiasResponse
     *
     * @throws SoapException
     */
    public function anularGuias(Type\AnularGuias $parameters): Type\AnularGuiasResponse
    {
        return $this->call('AnularGuias', $parameters);
    }

    /**
     * @param RequestInterface|Type\RangoGuias $parameters
     *
     * @return ResultInterface|Type\RangoGuiasResponse
     *
     * @throws SoapException
     */
    public function rangoGuias(Type\RangoGuias $parameters): Type\RangoGuiasResponse
    {
        return $this->call('RangoGuias', $parameters);
    }

    /**
     * @param RequestInterface|Type\GenerarManifiesto $parameters
     *
     * @return ResultInterface|Type\GenerarManifiestoResponse
     *
     * @throws SoapException
     */
    public function generarManifiesto(Type\GenerarManifiesto $parameters): Type\GenerarManifiestoResponse
    {
        return $this->call('GenerarManifiesto', $parameters);
    }

    /**
     * @param RequestInterface|Type\ConsultarTipoGuias $parameters
     *
     * @return ResultInterface|Type\ConsultarTipoGuiasResponse
     *
     * @throws SoapException
     */
    public function consultarTipoGuias(Type\ConsultarTipoGuias $parameters): Type\ConsultarTipoGuiasResponse
    {
        return $this->call('ConsultarTipoGuias', $parameters);
    }

    /**
     * @param RequestInterface|Type\ConsultaRangosGuias $parameters
     *
     * @return ResultInterface|Type\ConsultaRangosGuiasResponse
     *
     * @throws SoapException
     */
    public function consultaRangosGuias(Type\ConsultaRangosGuias $parameters): Type\ConsultaRangosGuiasResponse
    {
        return $this->call('ConsultaRangosGuias', $parameters);
    }

    /**
     * @param RequestInterface|Type\GuiasPendientesXManifestar $parameters
     *
     * @return ResultInterface|Type\GuiasPendientesXManifestarResponse
     *
     * @throws SoapException
     */
    public function guiasPendientesXManifestar(Type\GuiasPendientesXManifestar $parameters): Type\GuiasPendientesXManifestarResponse
    {
        return $this->call('GuiasPendientesXManifestar', $parameters);
    }
}
