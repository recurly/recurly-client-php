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
class PlanRampInterval extends RecurlyResource
{
    private $_currencies;
    private $_starting_billing_cycle;

    protected static $array_hints = [
        'setCurrencies' => '\Recurly\Resources\PlanRampPricing',
    ];

    
    /**
    * Getter method for the currencies attribute.
    * Represents the price for the ramp interval.
    *
    * @return array
    */
    public function getCurrencies(): array
    {
        return $this->_currencies ?? [] ;
    }

    /**
    * Setter method for the currencies attribute.
    *
    * @param array $currencies
    *
    * @return void
    */
    public function setCurrencies(array $currencies): void
    {
        $this->_currencies = $currencies;
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
}