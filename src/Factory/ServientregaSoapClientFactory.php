<?php

namespace App\Factory;

use App\Entity\Connection;
use App\Servientrega\ServientregaClient;
use App\Servientrega\ServientregaClassmap;
use App\Servientrega\Middleware\SoapAuthMiddleware;
use Phpro\SoapClient\Middleware\RemoveEmptyNodesMiddleware;
use Phpro\SoapClient\Soap\Handler\HttPlugHandle;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Phpro\SoapClient\Soap\Driver\ExtSoap\ExtSoapEngineFactory;
use Phpro\SoapClient\Soap\Driver\ExtSoap\ExtSoapOptions;

/**
 * Class ServientregaSoapClientFactory
 *
 * @package App\Servientrega
 */
class ServientregaSoapClientFactory extends BaseClientFactory
{
    const WSDL = 'http://web.servientrega.com:8081/GeneracionGuias.asmx?WSDL';

    /**
     * @param Connection|null $connection
     * @param bool $withoutAuth
     *
     * @return ServientregaClient
     */
    public function factory(?Connection $connection = null, bool $withoutAuth = false): ServientregaClient
    {
        $user = $this->security->getUser() ?? $connection;
        $handler = HttPlugHandle::createWithDefaultClient();
        $handler->addMiddleware(new RemoveEmptyNodesMiddleware());

        if (null !== $user || $withoutAuth) {
            $handler->addMiddleware(new SoapAuthMiddleware(
                $user->getServientregaLogin(),
                $user->getServientregaPassword(),
                $user->getServientregaBillingCode(),
                $user->getServientregaNamePack()
            ));
        }

        $engine = ExtSoapEngineFactory::fromOptionsWithHandler(
            ExtSoapOptions::defaults(static::WSDL, [])->withClassMap(ServientregaClassmap::getCollection()),
            $handler
        );
        $eventDispatcher = new EventDispatcher();

        return new ServientregaClient($engine, $eventDispatcher);
    }
}

