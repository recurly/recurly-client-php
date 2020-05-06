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

    protected static $array_hints = array(
    );

    
    /**
    * Getter method for the length attribute.
    * Trial length measured in the units specified by the sibling `unit` property
    *
    * @return ?int
    */
    public function getLength(): ?int
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
    public function setLength(int $length): void
    {
        $this->_length = $length;
    }

    /**
    * Getter method for the unit attribute.
    * Temporal unit of the free trial
    *
    * @return ?string
    */
    public function getUnit(): ?string
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
    public function setUnit(string $unit): void
    {
        $this->_unit = $unit;
    }
}