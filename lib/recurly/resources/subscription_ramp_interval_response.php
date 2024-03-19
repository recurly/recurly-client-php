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
class SubscriptionRampIntervalResponse extends RecurlyResource
{
    private $_ending_on;
    private $_remaining_billing_cycles;
    private $_starting_billing_cycle;
    private $_starting_on;
    private $_unit_amount;

    protected static $array_hints = [
    ];

    
    /**
    * Getter method for the ending_on attribute.
    * Date the ramp interval ends
    *
    * @return ?string
    */
    public function getEndingOn(): ?string
    {
        return $this->_ending_on;
    }

    /**
    * Setter method for the ending_on attribute.
    *
    * @param string $ending_on
    *
    * @return void
    */
    public function setEndingOn(string $ending_on): void
    {
        $this->_ending_on = $ending_on;
    }

    /**
    * Getter method for the remaining_billing_cycles attribute.
    * Represents how many billing cycles are left in a ramp interval.
    *
    * @return ?int
    */
    public function getRemainingBillingCycles(): ?int
    {
        return $this->_remaining_billing_cycles;
    }

    /**
    * Setter method for the remaining_billing_cycles attribute.
    *
    * @param int $remaining_billing_cycles
    *
    * @return void
    */
    public function setRemainingBillingCycles(int $remaining_billing_cycles): void
    {
        $this->_remaining_billing_cycles = $remaining_billing_cycles;
    }

    /**
    * Getter method for the starting_billing_cycle attribute.
    * Represents the billing cycle where a ramp interval starts.
    *
    * @return ?int
    */
    public function getStartingBillingCycle(): ?int
    {
        return $this->_starting_billing_cycle;
    }

    /**
    * Setter method for the starting_billing_cycle attribute.
    *
    * @param int $starting_billing_cycle
    *
    * @return void
    */
    public function setStartingBillingCycle(int $starting_billing_cycle): void
    {
        $this->_starting_billing_cycle = $starting_billing_cycle;
    }

    /**
    * Getter method for the starting_on attribute.
    * Date the ramp interval starts
    *
    * @return ?string
    */
    public function getStartingOn(): ?string
    {
        return $this->_starting_on;
    }

    /**
    * Setter method for the starting_on attribute.
    *
    * @param string $starting_on
    *
    * @return void
    */
    public function setStartingOn(string $starting_on): void
    {
        $this->_starting_on = $starting_on;
    }

    /**
    * Getter method for the unit_amount attribute.
    * Represents the price for the ramp interval.
    *
    * @return ?int
    */
    public function getUnitAmount(): ?int
    {
        return $this->_unit_amount;
    }

    /**
    * Setter method for the unit_amount attribute.
    *
    * @param int $unit_amount
    *
    * @return void
    */
    public function setUnitAmount(int $unit_amount): void
    {
        $this->_unit_amount = $unit_amount;
    }
}