<?php

namespace App\Dto\Retailcrm;

class DeliveryDataField
{
    const TYPE_INTEGER = 'integer';
    const TYPE_TEXT = 'text';
    const TYPE_AUTOCOMPLETE = 'autocomplete';
    const TYPE_CHECKBOX = 'checkbox';
    const TYPE_CHOICE = 'choice';
    const TYPE_DATE = 'date';

    /**
     * @var string|null
     */
    public $code;

    /**
     * @var string|null
     */
    public $label;

    /**
     * @var string|null
     */
    public $hint;

    /**
     * @var string|null
     */
    public $type;

    /**
     * @var boolean
     */
    public $multiple = false;

    /**
     * @var array|null
     */
    public $choices;

    /**
     * @var string|null
     */
    public $autocompleteUrl;

    /**
     * @var boolean
     */
    public $isRequired = false;

    /**
     * @var boolean
     */
    public $isAffectsCost = false;

    /**
     * @var boolean
     */
    public $isEditable = true;
}
