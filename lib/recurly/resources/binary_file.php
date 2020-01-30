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
    
    
    /**
    * Getter method for the data attribute.
    *
    * @return string 
    */
    public function getData(): string
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
    public function setData(string $value): void
    {
        $this->_data = $value;
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