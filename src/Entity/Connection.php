<?php

namespace App\Entity;

use App\Repository\ConnectionRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=ConnectionRepository::class)
 */
class Connection implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $crmUrl;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $crmApiKey;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $servientregaLogin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $servientregaPassword;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $servientregaBillingCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $servientregaNamePack;

    /**
     * @ORM\Column(type="boolean", options={"default": true})
     */
    private $active;

    /**
     * @ORM\OneToOne(targetEntity="Token")
     * @ORM\JoinColumn(name="token_id", referencedColumnName="id")
     */
    private $token;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $clientId;

    /**
     * Dane код отправителя
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $idDaneOriginCity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCrmUrl(): ?string
    {
        return $this->crmUrl;
    }

    public function setCrmUrl(string $crmUrl): self
    {
        $this->crmUrl = $crmUrl;

        return $this;
    }

    public function getCrmApiKey(): ?string
    {
        return $this->crmApiKey;
    }

    public function setCrmApiKey(string $crmApiKey): self
    {
        $this->crmApiKey = $crmApiKey;

        return $this;
    }

    public function getServientregaLogin(): ?string
    {
        return $this->servientregaLogin;
    }

    public function setServientregaLogin(string $servientregaLogin): self
    {
        $this->servientregaLogin = $servientregaLogin;

        return $this;
    }

    public function getServientregaPassword(): ?string
    {
        return $this->servientregaPassword;
    }

    public function setServientregaPassword(string $servientregaPassword): self
    {
        $this->servientregaPassword = $servientregaPassword;

        return $this;
    }

    public function getServientregaBillingCode(): ?string
    {
        return $this->servientregaBillingCode;
    }

    public function setServientregaBillingCode(string $servientregaBillingCode): self
    {
        $this->servientregaBillingCode = $servientregaBillingCode;

        return $this;
    }

    public function getServientregaNamePack(): ?string
    {
        return $this->servientregaNamePack;
    }

    public function setServientregaNamePack(string $servientregaNamePack): self
    {
        $this->servientregaNamePack = $servientregaNamePack;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setClientId(string $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    public function getClientId(): ?string
    {
        return $this->clientId;
    }

    public function setIsActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getToken(): ?Token
    {
        return $this->token;
    }

    public function setToken(Token $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getIdDaneOriginCity(): ?string
    {
        return $this->idDaneOriginCity;
    }

    public function setIdDaneOriginCity(string $idDaneOriginCity): self
    {
        $this->idDaneOriginCity = $idDaneOriginCity;

        return $this;
    }

    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    public function getPassword()
    {
        return hash('ripemd160', $this->clientId);
    }

    public function getSalt()
    {
        return hash('fnv164', (string) time());
    }

    public function getUsername()
    {
        $this->getCrmUrl();
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
