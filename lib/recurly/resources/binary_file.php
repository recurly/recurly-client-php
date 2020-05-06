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
class BinaryFile extends RecurlyResource
{
    private $_data;

    protected static $array_hints = array(
    );

    
    /**
    * Getter method for the data attribute.
    * 
    *
    * @return ?string
    */
    public function getData(): ?string
    {
        return $this->_data;
    }

    /**
    * Setter method for the data attribute.
    *
    * @param string $data
    *
    * @return void
    */
    public function setData(string $data): void
    {
        $this->_data = $data;
    }
}