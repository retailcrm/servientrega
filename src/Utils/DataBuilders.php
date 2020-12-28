<?php

namespace App\Utils;

use App\Dto\Retailcrm\CalculateRequest;
use App\Dto\Retailcrm\Package;
use App\Dto\Retailcrm\SaveRequest;
use App\Dto\Retailcrm\TrackingStatusUpdate;
use App\Dto\Retailcrm\TrackingStatusUpdateHistory;
use App\Entity\Connection;
use App\Servientrega\RestType\CalculateRequest as DeliveryCalculateRequest;
use App\Servientrega\RestType\LoginRequest;
use App\Servientrega\RestType\Pieza;
use App\Servientrega\TrackingType\ArrayOfGuiasDTO;
use App\Servientrega\Type\ArrayOfEnviosExterno;
use App\Servientrega\Type\ArrayOfEnviosUnidadEmpaqueCargue;
use App\Servientrega\Type\CargueMasivoExternoDTO;
use App\Servientrega\Type\EnviosExterno;
use App\Servientrega\Type\EnviosUnidadEmpaqueCargue;

/**
 * Class DataBuilders
 */
class DataBuilders
{
    public static function buildLoginRequest(Connection $connection): LoginRequest
    {
        $loginRequest                 = new LoginRequest();
        $loginRequest->login          = $connection->getServientregaLogin();
        $loginRequest->password       = $connection->getServientregaPassword();
        $loginRequest->codFacturacion = $connection->getServientregaBillingCode();

        return $loginRequest;
    }

    public static function buildDelivery(SaveRequest $saveRequest, Connection $connection): CargueMasivoExternoDTO
    {
        $envio              = new CargueMasivoExternoDTO();
        $arrayEnviosExterno = new ArrayOfEnviosExterno();
        $enviosExterno      = new EnviosExterno();

        $enviosExterno = $enviosExterno
            ->withNum_Guia(0)
            ->withNum_Sobreporte(0)
            ->withNum_SobreCajaPorte(0)
            ->withFec_TiempoEntrega(1)
            ->withDes_TipoTrayecto(1) // 1 - nacional 2 - internacional
            ->withIde_CodFacturacion($connection->getServientregaBillingCode())
            ->withDes_FormaPago(2) // 2 Crédito 4 contra entrega
            ->withDes_MedioTransporte(1) // terrestre
            ->withDes_TipoDuracionTrayecto(1) // 1 normal
            ->withNom_TipoTrayecto(1)
            ->withDes_UnidadLongitud('mm')
            ->withDes_UnidadPeso('g')
            ->withNom_UnidadEmpaque('GENERICA')
            ->withGen_Cajaporte(false)
            ->withGen_Sobreporte(false)
            ->withIde_Producto(2)
            ->withNum_Recaudo(0) // возможно сделать настраимваемым
            ->withNum_ValorLiquidado(0)
            ->withNum_VlrSobreflete(0)
            ->withNum_VlrFlete(0)
            ->withNum_Descuento(0)
            ->withNum_ValorDeclaradoSobreTotal(0)
            ->withNum_Factura($saveRequest->orderNumber)
            ->withNum_Piezas(count($saveRequest->packages));
//            ->withDes_VlrCampoPersonalizado1() - примечание для доставки

        $enviosExterno = static::handlePackages($saveRequest->packages, $enviosExterno)
            ->withIde_Destinatarios('00000000-0000-0000-0000-000000000000')
            ->withIde_Manifiesto('00000000-0000-0000-0000-000000000000')
            ->withNum_BolsaSeguridad(0)
            ->withNum_Precinto(0)
            ->withNum_VolumenTotal(0)
            ->withDes_DireccionRecogida(0)
            ->withDes_TelefonoRecogida(0)
            ->withDes_CiudadRecogida(0)
            ->withNum_PesoFacturado(0)
            ->withDes_TipoGuia(2)
            ->withDes_CiudadOrigen(0)
            ->withDes_Telefono($saveRequest->customer->phones[0])
            ->withDes_Ciudad($saveRequest->delivery->extraData[ConfigurationBuilder::ID_DANE_RECEIVER_FIELD])
            ->withDes_DepartamentoDestino($saveRequest->delivery->deliveryAddress->region)
            ->withDes_Direccion(
                trim(sprintf(
                    '%s %s %s',
                    $saveRequest->delivery->deliveryAddress->street,
                    $saveRequest->delivery->deliveryAddress->building,
                    $saveRequest->delivery->deliveryAddress->flat
                ))
            )->withNom_Contacto(trim(
                sprintf(
                    '%s %s %s',
                    $saveRequest->customer->firstName,
                    $saveRequest->customer->lastName,
                    $saveRequest->customer->patronymic
                )
            ))->withIde_Num_Identific_Dest($saveRequest->customer->id)
            ->withNum_Celular($saveRequest->customer->phones[0])
            ->withDes_CorreoElectronico($saveRequest->customer->email)
            ->withDes_CiudadRemitente($connection->getIdDaneOriginCity())
            ->withDes_DireccionRemitente($saveRequest->delivery->shipmentAddress->text)
            ->withDes_DepartamentoOrigen($connection->getIdDaneOriginCity())
            ->withNum_TelefonoRemitente($saveRequest->manager->phone)
            ->withNum_IdentiRemitente($saveRequest->legalEntity)
            ->withEst_CanalMayorista(false)
            ->withDes_IdArchivoOrigen($saveRequest->customer->id);

        $arrayEnviosExterno = $arrayEnviosExterno->withEnviosExterno($enviosExterno);

        return $envio->withObjEnvios($arrayEnviosExterno);
    }

    /**
     * @param Package[] $packages
     */
    private static function handlePackages(array $packages, EnviosExterno $enviosExterno): EnviosExterno
    {
        $declaredValue = 0;
        $height        = 0;
        $width         = 0;
        $length        = 0;
        $weight        = 0;
        $namesProducts = '';

        $arrayEmpaqueCargue = [];

        foreach ($packages as $package) {
            $height += $package->height;
            $width += $package->width;
            $length += $package->length;
            $weight += $package->weight;

            foreach ($package->items as $packageItem) {
                $declaredValue += $packageItem->declaredValue * $packageItem->quantity;
                $namesProducts .= $packageItem->name;
            }

            $empaqueCargue = new EnviosUnidadEmpaqueCargue();
            $empaqueCargue = $empaqueCargue
                ->withNum_Alto($package->height)
                ->withNum_Distribuidor(0)
                ->withNum_Ancho($package->width)
                ->withNum_Cantidad(1)
                ->withDes_IdArchivoOrigen($enviosExterno->getDes_IdArchivoOrigen())
                ->withNum_Largo($package->length)
                ->withNum_Peso($package->weight)
                ->withIde_UnidadEmpaque('00000000-0000-0000-0000-000000000000')
                ->withIde_Envio('00000000-0000-0000-0000-000000000000')
                ->withNum_Consecutivo(0);

            $arrayEmpaqueCargue[] = $empaqueCargue;
        }

        return $enviosExterno
            ->withNum_Alto($height)
            ->withNum_Ancho($width)
            ->withNum_Largo($length)
            ->withNum_PesoTotal($weight)
            ->withNum_ValorDeclaradoTotal($declaredValue)
            ->withDes_DiceContener(mb_substr($namesProducts, 0, 20))
            ->withObjEnviosUnidadEmpaqueCargue(
                (new ArrayOfEnviosUnidadEmpaqueCargue())->withEnviosUnidadEmpaqueCargue($arrayEmpaqueCargue)
            );
    }

    /**
     * @return TrackingStatusUpdate[]
     */
    public static function buildTrackingStatus(ArrayOfGuiasDTO $guiasDTO): array
    {
        $statuses = [];

        foreach ($guiasDTO->GuiasDTO as $guiasDTO) {
            // если статус пуст ничего не передаем
            if (empty($guiasDTO->IdEstAct) && empty($guiasDTO->EstAct)) {
                continue;
            }

            $status             = new TrackingStatusUpdate();
            $status->deliveryId = $guiasDTO->NumGui;

            $history            = new TrackingStatusUpdateHistory();
            $history->code      = $guiasDTO->IdEstAct;
            $history->updatedAt = $guiasDTO->FecEst;
            $status->history    = [$history];

            $statuses[] = $status;
        }

        return $statuses;
    }

    public static function buildCalculateRequest(
        CalculateRequest $calculateRequest,
        Connection $connection
    ): DeliveryCalculateRequest {
        $calculate = new DeliveryCalculateRequest();
        // код продукта Servientrega, в соответствии с: 2 = премиум товары; 6 = промышленные товары; 1 = единичный документ.
        // TODO скорее всего тоже в экстра дата нужно будет вынести
        $calculate->IdProducto   = 2;
        $calculate->NumeroPiezas = count($calculateRequest->packages);
        $piezas                  = [];

        foreach ($calculateRequest->packages as $package) {
            $pieza        = new Pieza();
            $pieza->Peso  = $package->weight;
            $pieza->Largo = $package->length;
            $pieza->Ancho = $package->width;
            $pieza->Alto  = $package->height;

            $piezas[] = $pieza;
        }

        $calculate->Piezas              = $piezas;
        $calculate->ValorDeclarado      = $calculateRequest->declaredValue;
        $calculate->IdDaneCiudadOrigen  = $connection->getIdDaneOriginCity();
        $calculate->IdDaneCiudadDestino = $calculateRequest->extraData[ConfigurationBuilder::ID_DANE_RECEIVER_FIELD];
        $calculate->EnvioConCobro       = false;
        $calculate->FormaPago           = 2;
        $calculate->TiempoEntrega       = 1; // время транспортировки для доставки: 1 = нормальный; 2 = сегодня
        $calculate->MedioTransporte     = 1; // транспортное средство в соответствии с городом происхождения-назначения: 1= наземный; 2= воздушный
        $calculate->NumRecaudo          = $calculateRequest->extraData[ConfigurationBuilder::COLLECTION_NUMBER_FIELD] ?? 500; // значение для сбора, когда отправка груза со стоимостью, в случае, если это без сбора (без процентов), вписывайте значение 500.

        return $calculate;
    }
}
