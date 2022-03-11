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
    private $_unit_amount_decimal;

    protected static $array_hints = [
    ];

    
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
    * Allows up to 2 decimal places. Optionally, override the tiers' default unit amount.
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

    /**
    * Getter method for the unit_amount_decimal attribute.
    * Allows up to 9 decimal places.  Optionally, override tiers' default unit amount.
If `unit_amount_decimal` is provided, `unit_amount` cannot be provided.

    *
    * @return ?string
    */
    public function getUnitAmountDecimal(): ?string
    {
        return $this->_unit_amount_decimal;
    }

    /**
    * Setter method for the unit_amount_decimal attribute.
    *
    * @param string $unit_amount_decimal
    *
    * @return void
    */
    public function setUnitAmountDecimal(string $unit_amount_decimal): void
    {
        $this->_unit_amount_decimal = $unit_amount_decimal;
    }
}