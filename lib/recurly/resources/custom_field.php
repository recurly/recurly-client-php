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
    
    
    /**
    * Getter method for the name attribute.
    *
    * @return string Fields must be created in the UI before values can be assigned to them.
    */
    public function getName(): string
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
    public function setName(string $value): void
    {
        $this->_name = $value;
    }

    /**
    * Getter method for the value attribute.
    *
    * @return string Any values that resemble a credit card number or security code (CVV/CVC) will be rejected.
    */
    public function getValue(): string
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

    /**
     * The hintArrayType method will provide type hinting for setter methods that
     * have array parameters.
     * 
     * @param string $key The property to get teh type hint for.
     * 
     * @return string The class name of the expected array type.
     */
    public static function hintArrayType($key): string
    {
        $array_hints = array(
        );
        return $array_hints[$key];
    }

}