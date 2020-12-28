<?php

namespace App\Servientrega\Middleware;

use Http\Promise\Promise;
use Phpro\SoapClient\Middleware\Middleware;
use Phpro\SoapClient\Xml\SoapXml;
use Psr\Http\Message\RequestInterface;

/**
 * Class SoapAuthMiddleware
 */
class SoapAuthMiddleware extends Middleware
{
    private $login;
    private $password;
    private $billingCode;
    private $namePack;

    public function __construct(string $login, string $password, string $billingCode, string $namePack)
    {
        $this->login       = $login;
        $this->password    = $password;
        $this->billingCode = $billingCode;
        $this->namePack    = $namePack;
    }

    public function getName(): string
    {
        return 'soap_auth_middleware';
    }

    /**
     * Добавляет авторизационные данные в запрос
     * https://github.com/phpro/soap-client/blob/master/docs/middlewares.md#creating-your-own-middleware
     */
    public function beforeRequest(callable $next, RequestInterface $request): Promise
    {
        $xml = SoapXml::fromStream($request->getBody());

        /** @var \DOMElement $newHeader */
        $newHeader  = $xml->createSoapHeader();
        $authHeader = $xml->getXmlDocument()->createElement('AuthHeader');
        $authHeader->setAttribute('xmlns', 'http://tempuri.org/');
        $login       = $xml->getXmlDocument()->createElement('login', $this->login);
        $password    = $xml->getXmlDocument()->createElement('pwd', $this->password);
        $billingCode = $xml->getXmlDocument()->createElement('Id_CodFacturacion', $this->billingCode);
        $namePack    = $xml->getXmlDocument()->createElement('Nombre_Cargue', $this->namePack);

        $authHeader->appendChild($login);
        $authHeader->appendChild($password);
        $authHeader->appendChild($billingCode);
        $authHeader->appendChild($namePack);

        $newHeader->appendChild($authHeader);
        $xml->prependSoapHeader($newHeader);

        $request = $request->withBody($xml->toStream());

        return $next($request);
    }
}
