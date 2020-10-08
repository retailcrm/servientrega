<?php

namespace App\Dto\Retailcrm;

class Customer
{
    /**
     * @var integer|null
     */
    public $id;

    /**
     * @var string|null
     */
    public $lastName;

    /**
     * @var string|null
     */
    public $firstName;

    /**
     * @var string|null
     */
    public $patronymic;

    /**
     * @var array|null
     */
    public $phones;

    /**
     * @var string|null
     */
    public $email;
}
