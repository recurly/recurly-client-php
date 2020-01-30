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
class CouponDiscountTrial extends RecurlyResource
{
        private $_length;
        private $_unit;
    
    
    /**
    * Getter method for the length attribute.
    *
    * @return int Trial length measured in the units specified by the sibling `unit` property
    */
    public function getLength(): int
    {
        return $this->_length;
    }

    /**
    * Setter method for the length attribute.
    *
    * @param int $length
    *
    * @return void
    */
    public function setLength(int $value): void
    {
        $this->_length = $value;
    }

    /**
    * Getter method for the unit attribute.
    *
    * @return string Temporal unit of the free trial
    */
    public function getUnit(): string
    {
        return $this->_unit;
    }

    /**
    * Setter method for the unit attribute.
    *
    * @param string $unit
    *
    * @return void
    */
    public function setUnit(string $value): void
    {
        $this->_unit = $value;
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