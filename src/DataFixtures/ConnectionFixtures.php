<?php

namespace App\DataFixtures;

use App\Entity\Connection;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

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

        $manager->persist($connection);
        $manager->flush();
    }
}
