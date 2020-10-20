<?php

namespace App\Services;

use App\Dto\Front\Connection;
use App\Entity\Token;
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

    /**
     * @param \App\Entity\Connection $connection
     * @param Connection $request
     */
    public function saveConnection(\App\Entity\Connection $connection, Connection $request): void
    {
        $connection->setCrmUrl($request->crmUrl);
        $connection->setCrmApiKey($request->apiKey);

        $this->entityManager->persist($connection);
    }

    /**
     * @param Connection $request
     * @param \App\Entity\Connection $connection
     *
     * @return void
     */
    public function addAccountData(Connection $request, \App\Entity\Connection $connection): void
    {
        if ($request->servientregaPassword !== $connection->getServientregaPassword()) {
            $pass = $this->servientregaService->encryptPassword($request->servientregaPassword);
            $connection->setServientregaPassword($pass);
        }

        $connection->setServientregaLogin($request->servientregaLogin);
        $connection->setServientregaBillingCode($request->servientregaBillingCode);
        $connection->setServientregaNamePack($request->servientregaNamePack);

        $this->entityManager->persist($connection);
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

    /**
     * @return \App\Entity\Connection[]
     */
    public function getConnections(): array
    {
        return $this->entityManager->getRepository(\App\Entity\Connection::class)->findAll();
    }

    /**
     * @param int $id
     *
     * @return \App\Entity\Connection|null
     */
    public function getConnection(int $id): ?\App\Entity\Connection
    {
        return $this->entityManager->getRepository(\App\Entity\Connection::class)->find($id);
    }
}
