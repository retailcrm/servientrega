<?php

namespace App\Services;

use App\Dto\Front\Connection;
use App\Entity\Token;
use App\Utils\DataBuilders;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class ConnectionService
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
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        SessionInterface $session,
        ServientregaService $servientregaService
    ) {
        $this->entityManager       = $entityManager;
        $this->session             = $session;
        $this->servientregaService = $servientregaService;
    }

    public function createConnection(Connection $connection): \App\Entity\Connection
    {
        $conn = new \App\Entity\Connection();
        $conn->setCrmUrl($connection->crmUrl);
        $conn->setCrmApiKey($connection->apiKey);
        $conn->setServientregaLogin('');
        $conn->setServientregaPassword('');
        $conn->setServientregaBillingCode('');
        $conn->setServientregaNamePack('');
        $conn->setClientId(hash('ripemd160', (string) time() . $conn->getCrmUrl()));
        $conn->setIsActive(false);

        $this->entityManager->persist($conn);

        return $conn;
    }

    public function saveConnection(\App\Entity\Connection $connection, Connection $request): void
    {
        $connection->setCrmUrl($request->crmUrl);
        $connection->setCrmApiKey($request->apiKey);

        $this->entityManager->persist($connection);
    }

    public function addAccountData(Connection $request, \App\Entity\Connection $connection): void
    {
        if ($request->servientregaPassword !== $connection->getServientregaPassword()) {
            $pass = $this->servientregaService->encryptPassword($request->servientregaPassword);
            $connection->setServientregaPassword($pass);
        }

        $connection->setServientregaLogin($request->servientregaLogin);
        $connection->setServientregaBillingCode($request->servientregaBillingCode);
        $connection->setServientregaNamePack($request->servientregaNamePack);
        $connection->setIdDaneOriginCity($request->idDaneOriginCity);

        $this->entityManager->persist($connection);
    }

    /**
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

    public function auth(\App\Entity\Connection $connection): void
    {
        $this->session->set('clientId', $connection->getClientId());
    }

    /**
     * @return \App\Entity\Connection[]
     */
    public function getConnections(): array
    {
        return $this->entityManager->getRepository(\App\Entity\Connection::class)->findAll();
    }

    public function getConnection(int $id): ?\App\Entity\Connection
    {
        return $this->entityManager->getRepository(\App\Entity\Connection::class)->find($id);
    }
}
