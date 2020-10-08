<?php

namespace App\DataFixtures;

use App\Entity\Connection;
use App\Entity\Token;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use DateTimeImmutable;

class ConnectionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $connection = new Connection();
        $connection->setCrmUrl('https://test.retailcrm.es/');
        $connection->setCrmApiKey('test_api_key');
        $connection->setIsActive(true);
        $connection->setClientId('123');
        $connection->setServientregaLogin('test');
        $connection->setServientregaPassword('test');
        $connection->setServientregaBillingCode('test');
        $connection->setServientregaNamePack('test');

        $token = new Token();
        $token->setToken('123');
        $token->setExpiration((new DateTimeImmutable())->modify("+1 hour"));
        $token->setLogin('test');
        $token->setState(false);
        $token->setIdClient('test');
        $token->setCodBilling('test');
        $token->setName('test');

        $connection->setToken($token);

        $manager->persist($token);
        $manager->persist($connection);

        $manager->flush();
    }
}
