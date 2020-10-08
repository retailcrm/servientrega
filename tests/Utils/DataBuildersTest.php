<?php

namespace App\Tests\Utils;

use App\Dto\Retailcrm\Customer;
use App\Dto\Retailcrm\DeliveryAddress;
use App\Dto\Retailcrm\Manager;
use App\Dto\Retailcrm\Package;
use App\Dto\Retailcrm\PackageItem;
use App\Dto\Retailcrm\SaveDeliveryData;
use App\Dto\Retailcrm\SaveRequest;
use App\Entity\Connection;
use App\Utils\DataBuilders;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class DataBuildersTest extends TestCase
{
    const PACKAGE_COUNT = 2;

    public function testBuildDelivery()
    {
        $connection = (new Connection())->setServientregaBillingCode('TEST');

        $data = DataBuilders::buildDelivery($this->getSaveRequest(), $connection);

        static::assertCount(
            static::PACKAGE_COUNT,
            $data->getObjEnvios()->getEnviosExterno()->getObjEnviosUnidadEmpaqueCargue()->getEnviosUnidadEmpaqueCargue()
        );
    }

    private function getSaveRequest(): SaveRequest
    {
        $faker = Factory::create();
        $saveRequest = new SaveRequest();
        $customer = new Customer();
        $customer->id = $faker->randomNumber();
        $customer->lastName = $faker->name();
        $customer->firstName = $faker->firstName();
        $customer->patronymic = $faker->name();
        $customer->phones = [$faker->phoneNumber];
        $customer->email = $faker->email;

        $manager = new Manager();
        $manager->phone = $faker->phoneNumber;

        $packages = [];
        for ($i = 0; $i < static::PACKAGE_COUNT; $i++) {
            $package = new Package();
            $package->weight = $faker->numberBetween(0, 1000);
            $package->width = $faker->numberBetween(0, 1000);
            $package->length = $faker->numberBetween(0, 1000);
            $package->height = $faker->numberBetween(0, 1000);
            $item = new PackageItem();
            $item->name = $faker->word;
            $item->declaredValue = $faker->randomFloat(2, 0, 1000);

            $package->items = [$item];

            $packages[] = $package;
        }

        $saveDeliveryData = new SaveDeliveryData();
        $shipmentAddress = new DeliveryAddress();
        $shipmentAddress->index = $faker->postcode;
        $shipmentAddress->region = $faker->state;
        $shipmentAddress->city = $faker->city;
        $shipmentAddress->street = $faker->streetName;
        $shipmentAddress->building = $faker->buildingNumber;
        $shipmentAddress->flat = $faker->randomNumber();

        $deliveryAddress = new DeliveryAddress();
        $deliveryAddress->index = $faker->postcode;
        $deliveryAddress->region = $faker->state;
        $deliveryAddress->city = $faker->city;
        $deliveryAddress->street = $faker->streetName;
        $deliveryAddress->building = $faker->buildingNumber;
        $deliveryAddress->flat = $faker->randomNumber();

        $saveDeliveryData->shipmentAddress = $shipmentAddress;
        $saveDeliveryData->deliveryAddress = $deliveryAddress;

        $saveRequest->order = (string)$faker->numberBetween();
        $saveRequest->orderNumber = (string)$faker->randomNumber();
        $saveRequest->site = 'test_site';
        $saveRequest->siteName = 'Test site';
        $saveRequest->legalEntity = $faker->company;
        $saveRequest->customer = $customer;
        $saveRequest->manager = $manager;
        $saveRequest->packages = $packages;
        $saveRequest->delivery = $saveDeliveryData;

        return $saveRequest;
    }
}
