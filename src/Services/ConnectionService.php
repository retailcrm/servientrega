<?php

namespace App\Services;

use App\Dto\Front\Connection;
use App\Entity\Token;
use App\Servientrega\RestType\LoginRequest;
use App\Utils\DataBuilders;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class ConnectionService
 *
 * @package App\Services
 */
class ConnectionService
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var ServientregaService
     */
    private $servientregaService;

    /**
     * ConnectionService constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param SessionInterface $session
     * @param ServientregaService $servientregaService
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        SessionInterface $session,
        ServientregaService $servientregaService
    ) {
        $this->entityManager = $entityManager;
        $this->session = $session;
        $this->servientregaService = $servientregaService;
    }

    /**
     * @param Connection $connection
     *
     * @return \App\Entity\Connection
     */
    public function createConnection(Connection $connection): \App\Entity\Connection
    {
        $pass = $this->servientregaService->encryptPassword($connection->servientregaPassword);

        $conn = new \App\Entity\Connection();
        $conn->setCrmUrl($connection->crmUrl);
        $conn->setCrmApiKey($connection->apiKey);
        $conn->setServientregaLogin($connection->servientregaLogin);
        $conn->setServientregaPassword($pass);
        $conn->setServientregaBillingCode($connection->servientregaBillingCode);
        $conn->setServientregaNamePack($connection->servientregaNamePack);
        $conn->setClientId(hash('ripemd160', (string) time() . $conn->getCrmUrl()));
        $conn->setIsActive(true);

        $this->entityManager->persist($conn);

        return $conn;
    }

    /**
     * @param \App\Entity\Connection $connection
     *
     * @return Token
     */
    public function createToken(\App\Entity\Connection $connection): ?Token
    {
        $login = $this->servientregaService->getToken(DataBuilders::buildLoginRequest($connection));
        if (null !== $login) {
            $token = new Token();
            $token->setName($login->nombre);
            $token->setLogin($login->login);
            $token->setCodBilling($login->codFacturacion);
            $token->setIdClient($login->idCliente);
            $token->setState($login->estado);
            $token->setToken($login->token);
            $token->setExpiration($login->expiration);

            $this->entityManager->persist($token);
        }

        return $token ?? null;
    }

    /**
     * @param \App\Entity\Connection $connection
     */
    public function auth(\App\Entity\Connection $connection): void
    {
        $this->session->set('clientId', $connection->getClientId());
    }
}
