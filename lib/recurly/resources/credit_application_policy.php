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
class CreditApplicationPolicy extends RecurlyResource
{
    private $_mode;

    protected static $array_hints = [
    ];

    
    /**
    * Getter method for the mode attribute.
    * Determines which credit invoices are applied to invoices:
- `all`: All available credit invoices are applied (default)
- `none`: No credit invoices are applied automatically

    *
    * @return ?string
    */
    public function getMode(): ?string
    {
        return $this->_mode;
    }

    /**
    * Setter method for the mode attribute.
    *
    * @param string $mode
    *
    * @return void
    */
    public function setMode(string $mode): void
    {
        $this->_mode = $mode;
    }
}