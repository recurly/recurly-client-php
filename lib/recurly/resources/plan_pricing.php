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
class PlanPricing extends RecurlyResource
{
        private $_currency;
        private $_setup_fee;
        private $_unit_amount;
    
    
    /**
    * Getter method for the currency attribute.
    *
    * @return string 3-letter ISO 4217 currency code.
    */
    public function getCurrency(): string
    {
        return $this->_currency;
    }

    /**
    * Setter method for the currency attribute.
    *
    * @param string $currency
    *
    * @return void
    */
    public function setCurrency(string $value): void
    {
        $this->_currency = $value;
    }

    /**
    * Getter method for the setup_fee attribute.
    *
    * @return float Amount of one-time setup fee automatically charged at the beginning of a subscription billing cycle. For subscription plans with a trial, the setup fee will be charged at the time of signup. Setup fees do not increase with the quantity of a subscription plan.
    */
    public function getSetupFee(): float
    {
        return $this->_setup_fee;
    }

    /**
    * Setter method for the setup_fee attribute.
    *
    * @param float $setup_fee
    *
    * @return void
    */
    public function setSetupFee(float $value): void
    {
        $this->_setup_fee = $value;
    }

    /**
    * Getter method for the unit_amount attribute.
    *
    * @return float Unit price
    */
    public function getUnitAmount(): float
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
    public function setUnitAmount(float $value): void
    {
        $this->_unit_amount = $value;
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