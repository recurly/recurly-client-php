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
class TransactionNextAction extends RecurlyResource
{
    private $_type;
    private $_value;

    protected static $array_hints = [
    ];

    
    /**
    * Getter method for the type attribute.
    * The type of next action required.
    *
    * @return ?string
    */
    public function getType(): ?string
    {
        return $this->_type;
    }

    /**
    * Setter method for the type attribute.
    *
    * @param string $type
    *
    * @return void
    */
    public function setType(string $type): void
    {
        $this->_type = $type;
    }

    /**
    * Getter method for the value attribute.
    * The value associated with the next action type.
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