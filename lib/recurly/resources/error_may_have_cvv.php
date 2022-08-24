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
class ErrorMayHaveCVV extends RecurlyResource
{
    private $_message;
    private $_type;

    protected static $array_hints = [
    ];

    
    /**
    * Getter method for the message attribute.
    * The security code you entered does not match. Please update the CVV and try again.
    *
    * @return ?string
    */
    public function getMessage(): ?string
    {
        return $this->_message;
    }

    /**
    * Setter method for the message attribute.
    *
    * @param string $message
    *
    * @return void
    */
    public function setMessage(string $message): void
    {
        $this->_message = $message;
    }

    /**
    * Getter method for the type attribute.
    * Type
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
}