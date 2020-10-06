<?php

namespace App\Services;

use App\Factory\ServientregaRestClientFactory;
use App\Factory\ServientregaSoapClientFactory;
use App\Servientrega\RestType\LoginRequest;
use App\Servientrega\RestType\LoginResponse;
use App\Servientrega\Type\EncriptarContrasena;
use Psr\Log\LoggerInterface;

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
    private $clientFactory;

    /**
     * @var ServientregaRestClientFactory
     */
    private $restClientFactory;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * ServientregaService constructor.
     *
     * @param ServientregaSoapClientFactory $clientFactory
     * @param ServientregaRestClientFactory $restClientFactory
     * @param LoggerInterface $logger
     */
    public function __construct(
        ServientregaSoapClientFactory $clientFactory,
        ServientregaRestClientFactory $restClientFactory,
        LoggerInterface $logger
    ) {
        $this->clientFactory = $clientFactory;
        $this->restClientFactory = $restClientFactory;
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
        $result = $this->clientFactory->factory()->encriptarContrasena($encrypt);

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
        } catch (\Throwable $exception) {
            $this->logger->error(
                sprintf('Error authentication in servientrega: %s', $exception->getMessage()),
                (array) $loginRequest
            );

            return null;
        }
    }
}
