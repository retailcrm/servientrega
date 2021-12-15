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

/**
 * Class ServientregaService
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
        $this->entityManager     = $entityManager;
        $this->translation       = $translation;
        $this->logger            = $logger;
    }

    public function encryptPassword(string $password): string
    {
        $encrypt            = new EncriptarContrasena($password);
        $servientregaClient = $this->soapClientFactory->factory();

        try {
            $result = $servientregaClient->encriptarContrasena($encrypt);

            return $result->getEncriptarContrasenaResult();
        } catch (\Throwable $exception) {
            $this->logger->error(
                sprintf('Error encrypting password in servientrega: %s', $exception->getMessage()),
                ['password' => $password]
            );

            return $password;
        }
    }

    public function getToken(LoginRequest $loginRequest): ?LoginResponse
    {
        $client = $this->restClientFactory->factory();

        try {
            return $client->authenticationLogin($loginRequest);
        } catch (\Throwable $exception) {
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
     * @return CalculateResponse[]
     *
     * @throws \Throwable
     */
    public function calculate(CalculateRequest $calculateRequest, Connection $connection): array
    {
        try {
            $this->checkAndUpdateToken($connection);

            $response = $this->restClientFactory->factory()->calculate(
                DataBuilders::buildCalculateRequest($calculateRequest, $connection)
            );
        } catch (\Throwable $exception) {
            $this->logger->error(
                sprintf('Calculate request error: %s', $exception->getMessage()),
                $exception->getTrace()
            );

            throw $exception;
        }

        $calculateResponse       = new CalculateResponse();
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
     * @throws \Throwable
     */
    public function createDelivery(SaveRequest $saveRequest, Connection $connection): CargueMasivoExternoResponse
    {
        $envios = new ArrayOfCargueMasivoExternoDTO();
        $param  = new CargueMasivoExterno(
            $envios->withCargueMasivoExternoDTO($this->getEnvio($saveRequest, $connection)),
            new ArrayOfString()
        );

        $client = $this->soapClientFactory->factory();

        try {
            $response = $client->cargueMasivoExterno($param);
        } catch (\Throwable $exception) {
            $this->logger->error(
                sprintf('Create order in delivery service: %s', $exception->getMessage()),
                $client->debugLastSoapRequest()
            );

            throw $exception;
        }

        return $response;
    }

    private function getEnvio(SaveRequest $saveRequest, Connection $connection): CargueMasivoExternoDTO
    {
        return DataBuilders::buildDelivery($saveRequest, $connection);
    }

    /**
     * Проверяет время жизни токена, если токен инвалидировался - обновляет его
     *
     * @throws \Exception
     */
    public function checkAndUpdateToken(Connection $connection)
    {
        $token = $connection->getToken();

        if (!$this->tokenIsValid($token)) {
            $response = $this->getToken(DataBuilders::buildLoginRequest($connection));

            if (null === $response) {
                throw new \RuntimeException('Invalid token');
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
     * @throws \Exception
     */
    public function tokenIsValid(?Token $token): bool
    {
        if (null === $token) {
            return false;
        }

        $current = new \DateTimeImmutable('now', $token->getExpiration()->getTimezone());
        if ($token->getExpiration() < $current) {
            return false;
        }

        return true;
    }

    /**
     * @return string
     */
    public function getSticker(string $number, string $billingCode): ?string
    {
        try {
            $params = new GenerarGuiaSticker($number, $number, $billingCode);

            $client   = $this->soapClientFactory->factory();
            $response = $client->generarGuiaSticker($params);
        } catch (\Throwable $exception) {
            $this->logger->error(
                sprintf('Getting sticker error: %s, code: %d', $exception->getMessage(), $exception->getCode())
            );

            return null;
        }

        if (!$response->getGenerarGuiaStickerResult()) {
            $this->logger->error(sprintf('Getting sticker false response by number %s', $number));

            return null;
        }

        return base64_encode($response->getBytesReport());
    }
}
