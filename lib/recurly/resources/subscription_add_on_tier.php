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
class SubscriptionAddOnTier extends RecurlyResource
{
    private $_ending_quantity;
    private $_unit_amount;

    protected static $array_hints = array(
    );

    
    /**
    * Getter method for the ending_quantity attribute.
    * Ending quantity
    *
    * @return ?int
    */
    public function getEndingQuantity(): ?int
    {
        return $this->_ending_quantity;
    }

    /**
    * Setter method for the ending_quantity attribute.
    *
    * @param int $ending_quantity
    *
    * @return void
    */
    public function setEndingQuantity(int $ending_quantity): void
    {
        $this->_ending_quantity = $ending_quantity;
    }

    /**
    * Getter method for the unit_amount attribute.
    * Unit amount
    *
    * @return ?float
    */
    public function getUnitAmount(): ?float
    {
        return $this->_unit_amount;
    }

    /**
    * Setter method for the unit_amount attribute.
    *
    * @param float $unit_amount
    *
    * @return void
    */
    public function setUnitAmount(float $unit_amount): void
    {
        $this->_unit_amount = $unit_amount;
    }
}