<?php

namespace App\Services;

use App\Dto\Retailcrm\CalculateRequest;
use App\Dto\Retailcrm\CalculateResponse;
use App\Dto\Retailcrm\SaveRequest;
use App\Entity\Connection;
use App\Entity\Token;
use App\Factory\ServientregaRestClientFactory;
use App\Factory\ServientregaSoapClientFactory;
use App\Servientrega\RestType\LoginRequest;
use App\Servientrega\RestType\LoginResponse;
use App\Servientrega\RestType\Pieza;
use App\Servientrega\Type\ArrayOfCargueMasivoExternoDTO;
use App\Servientrega\Type\ArrayOfString;
use App\Servientrega\Type\CargueMasivoExterno;
use App\Servientrega\Type\CargueMasivoExternoDTO;
use App\Servientrega\Type\CargueMasivoExternoResponse;
use App\Servientrega\Type\EncriptarContrasena;
use App\Utils\DataBuilders;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use DateTimeImmutable;
use Exception;
use Throwable;
use RuntimeException;

/**
 * Class ServientregaService
 *
 * @package App\Services
 */
class ServientregaService
{
    /**
     * @var ServientregaSoapClientFactory
     */
    private $soapClientFactory;

    /**
     * @var ServientregaRestClientFactory
     */
    private $restClientFactory;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var TranslatorInterface
     */
    private $translation;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * ServientregaService constructor.
     *
     * @param ServientregaSoapClientFactory $soapClientFactory
     * @param ServientregaRestClientFactory $restClientFactory
     * @param EntityManagerInterface $entityManager
     * @param TranslatorInterface $translation
     * @param LoggerInterface $logger
     */
    public function __construct(
        ServientregaSoapClientFactory $soapClientFactory,
        ServientregaRestClientFactory $restClientFactory,
        EntityManagerInterface $entityManager,
        TranslatorInterface $translation,
        LoggerInterface $logger
    ) {
        $this->soapClientFactory = $soapClientFactory;
        $this->restClientFactory = $restClientFactory;
        $this->entityManager = $entityManager;
        $this->translation = $translation;
        $this->logger = $logger;
    }

    /**
     * @param string $password
     *
     * @return string
     */
    public function encryptPassword(string $password): string
    {
        $encrypt = new EncriptarContrasena($password);
        $result = $this->soapClientFactory->factory()->encriptarContrasena($encrypt);

        return $result->getEncriptarContrasenaResult();
    }

    /**
     * @param LoginRequest $loginRequest
     *
     * @return LoginResponse|null
     */
    public function getToken(LoginRequest $loginRequest): ?LoginResponse
    {
        $client = $this->restClientFactory->factory();

        try {
            return $client->authenticationLogin($loginRequest);
        } catch (Throwable $exception) {
            $this->logger->error(
                sprintf('Error authentication in servientrega: %s', $exception->getMessage()),
                (array) $loginRequest
            );

            return null;
        }
    }

    /**
     * Подсчет стоимости доставки
     *
     * @param CalculateRequest $calculateRequest
     * @param Connection $connection
     *
     * @return CalculateResponse[]
     * @throws Throwable
     */
    public function calculate(CalculateRequest $calculateRequest, Connection $connection): array
    {
        $this->checkAndUpdateToken($connection);

        $calculate = new \App\Servientrega\RestType\CalculateRequest();
        $calculate->IdProducto = 2;
        $calculate->NumeroPiezas = count($calculateRequest->packages);
        $piezas = [];

        foreach ($calculateRequest->packages as $package) {
            $pieza = new Pieza();
            $pieza->Peso = $package->weight;
            $pieza->Largo = $package->length;
            $pieza->Ancho = $package->width;
            $pieza->Alto = $package->height;

            $piezas[] = $pieza;
        }

        $calculate->Piezas = $piezas;
        $calculate->ValorDeclarado = $calculateRequest->declaredValue;
        $calculate->IdDaneCiudadOrigen = $calculateRequest->shipmentAddress->index;
        $calculate->IdDaneCiudadDestino = $calculateRequest->deliveryAddress->index;
        $calculate->EnvioConCobro = false;

        // TODO уточнить по данных параметрам
//        $calculate->FormaPago = 2;
//        $calculate->TiempoEntrega = 1;
//        $calculate->MedioTransporte = 1;
//        $calculate->NumRecaudo = 123;

        try {
            $response = $this->restClientFactory->factory()->calculate($calculate);
        } catch (Throwable $exception) {
            $this->logger->error(
                sprintf("Calculate request error: %s", $exception->getMessage()),
                $exception->getTrace()
            );

            throw $exception;
        }

        $calculateResponse = new CalculateResponse();
        $calculateResponse->code = 'servientrega_courier';
        $calculateResponse->name = $this->translation->trans(
            'calculate.servientrega_courier.name', [], 'servientrega'
        );
        $calculateResponse->type = CalculateResponse::TARIFF_COURIER;
        $calculateResponse->cost = $response->ValorTotal;

        return [$calculateResponse];
    }

    /**
     * Создание заявки на доставку
     *
     * @param SaveRequest $saveRequest
     * @param Connection $connection
     *
     * @return CargueMasivoExternoResponse
     */
    public function createDelivery(SaveRequest $saveRequest, Connection $connection): CargueMasivoExternoResponse
    {
        $envios = new ArrayOfCargueMasivoExternoDTO();
        $param = new CargueMasivoExterno(
            $envios->withCargueMasivoExternoDTO($this->getEnvio($saveRequest, $connection)),
            new ArrayOfString()
        );

        return $this->soapClientFactory->factory()->cargueMasivoExterno($param);
    }

    /**
     * @param SaveRequest $saveRequest
     * @param Connection $connection
     *
     * @return CargueMasivoExternoDTO
     */
    private function getEnvio(SaveRequest $saveRequest, Connection $connection): CargueMasivoExternoDTO
    {
        return DataBuilders::buildDelivery($saveRequest, $connection);
    }

    /**
     * Проверяет время жизни токена, если токен инвалидировался - обновляет его
     *
     * @param Connection $connection
     *
     * @throws Exception
     */
    public function checkAndUpdateToken(Connection $connection)
    {
        $token = $connection->getToken();
        if (!$this->tokenIsValid($token)) {
            $response = $this->getToken(DataBuilders::buildLoginRequest($connection));
            if (null === $response) {
                throw new RuntimeException('Invalid token');
            }

            $token->setToken($response->token);
            $token->setExpiration($response->expiration);

            $this->entityManager->persist($token);
            $this->entityManager->flush();
        }
    }

    /**
     * @param Token|null $token
     *
     * @return bool
     *
     * @throws Exception
     */
    public function tokenIsValid(?Token $token): bool
    {
        if (null === $token) {
            return false;
        }

        $current = new DateTimeImmutable('now', $token->getExpiration()->getTimezone());
        if ($token->getExpiration() < $current) {
            return false;
        }

        return true;
    }
}
