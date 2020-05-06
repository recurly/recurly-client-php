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

    protected static $array_hints = array(
    );

    
    /**
    * Getter method for the currency attribute.
    * 3-letter ISO 4217 currency code.
    *
    * @return ?string
    */
    public function getCurrency(): ?string
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
    public function setCurrency(string $currency): void
    {
        $this->_currency = $currency;
    }

    /**
    * Getter method for the setup_fee attribute.
    * Amount of one-time setup fee automatically charged at the beginning of a subscription billing cycle. For subscription plans with a trial, the setup fee will be charged at the time of signup. Setup fees do not increase with the quantity of a subscription plan.
    *
    * @return ?float
    */
    public function getSetupFee(): ?float
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
    public function setSetupFee(float $setup_fee): void
    {
        $this->_setup_fee = $setup_fee;
    }

    /**
    * Getter method for the unit_amount attribute.
    * Unit price
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