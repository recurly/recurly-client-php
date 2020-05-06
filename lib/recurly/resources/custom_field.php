<?php
/**
 * This file is automatically created by Recurly's OpenAPI generation process
 * and thus any edits you make by hand will be lost. If you wish to make a
 * change to this file, please create a Github issue explaining the changes you
 * need and we will usher them to the appropriate places.
 */
namespace Recurly\Resources;

use Recurly\RecurlyResource;

// phpcs:disable
class CustomField extends RecurlyResource
{
    private $_name;
    private $_value;

    protected static $array_hints = array(
    );

    
    /**
    * Getter method for the name attribute.
    * Fields must be created in the UI before values can be assigned to them.
    *
    * @return ?string
    */
    public function getName(): ?string
    {
        return $this->_name;
    }

    /**
    * Setter method for the name attribute.
    *
    * @param string $name
    *
    * @return void
    */
    public function setName(string $name): void
    {
        $this->_name = $name;
    }

    /**
    * Getter method for the value attribute.
    * Any values that resemble a credit card number or security code (CVV/CVC) will be rejected.
    *
    * @return ?string
    */
    public function getValue(): ?string
    {
        return $this->_value;
    }

    /**
    * Setter method for the value attribute.
    *
    * @param string $value
    *
    * @return void
    */
    public function setValue(string $value): void
    {
        $this->_value = $value;
    }
}