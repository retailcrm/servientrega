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
use App\Servientrega\Type\GenerarGuiaSticker;
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

        try {
            $response = $this->restClientFactory->factory()->calculate(
                DataBuilders::buildCalculateRequest($calculateRequest)
            );
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
     * @throws Throwable
     */
    public function createDelivery(SaveRequest $saveRequest, Connection $connection): CargueMasivoExternoResponse
    {
        $envios = new ArrayOfCargueMasivoExternoDTO();
        $param = new CargueMasivoExterno(
            $envios->withCargueMasivoExternoDTO($this->getEnvio($saveRequest, $connection)),
            new ArrayOfString()
        );

        $client = $this->soapClientFactory->factory();

        try {
            $response = $client->cargueMasivoExterno($param);
        } catch (\Throwable $exception) {
            $this->logger->error(
                sprintf("Create order in delivery service: %s", $exception->getMessage()),
                $client->debugLastSoapRequest()
            );

            throw $exception;
        }

        return $response;
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

            if (null === $token) {
                $token = new Token();
            }

            $token->setName($response->nombre);
            $token->setCodBilling($response->codFacturacion);
            $token->setIdClient(trim($response->idCliente));
            $token->setLogin($response->login);
            $token->setState($response->estado);
            $token->setToken($response->token);
            $token->setExpiration($response->expiration);

            $connection->setToken($token);

            $this->entityManager->persist($token);
            $this->entityManager->persist($connection);
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

    /**
     * @param string $number
     *
     * @return string
     */
    public function getSticker(string $number): ?string
    {
        try {
            // TODO проверить или уточнить параметры http://web.servientrega.com:8081/GeneracionGuias.asmx?op=GenerarGuiaSticker
            $params = new GenerarGuiaSticker(
                $number,
                $number,
                '',
                1,
                '',
                true,
                ''
            );

            $response = $this->soapClientFactory->factory()->generarGuiaSticker($params);
        } catch (Throwable $exception) {
            $this->logger->error(
                sprintf("Getting sticker error: %s, code: %d", $exception->getMessage(), $exception->getCode())
            );

            return null;
        }

        if (!$response->getGenerarGuiaStickerResult()) {
            $this->logger->error(sprintf("Getting sticker false response by number %s", $number));

            return null;
        }

        return base64_decode($response->getBytesReport());
    }
}
