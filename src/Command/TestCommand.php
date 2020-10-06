<?php

namespace App\Command;

use App\Servientrega\RestType\CalculateRequest;
use App\Servientrega\RestType\LoginRequest;
use App\Servientrega\RestType\Pieza;
use App\Servientrega\ServientregaRestClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command
{
    protected static $defaultName = 'app:test';

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $client = new ServientregaRestClient('test');

        $login = new LoginRequest();
        $login->login = 'test';
        $login->password = 'test';
        $login->codFacturacion = 'SER408';

        $res = $client->authenticationLogin($login);

        dump($res->expiration->getTimezone());

//        $calculate = new CalculateRequest();
//        $pieza = new Pieza();
//        $pieza->Alto = 123;
//        $pieza->Ancho = 123;
//        $pieza->Largo = 123;
//        $pieza->Peso = 123;
//
//        $calculate->Piezas = [$pieza];
//
//        $res = $client->calculate($calculate);

        dump($res);

        return 0;
    }
}
