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
    private $_remaining_billing_cycles;
    private $_starting_billing_cycle;
    private $_unit_amount;

    protected static $array_hints = [
    ];

    
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
    * Getter method for the unit_amount attribute.
    * Represents the price for the ramp interval.
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