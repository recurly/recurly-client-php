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
class Tier extends RecurlyResource
{
    private $_currencies;
    private $_ending_quantity;
    private $_usage_percentage;

    protected static $array_hints = [
        'setCurrencies' => '\Recurly\Resources\TierPricing',
    ];

    
    /**
    * Getter method for the currencies attribute.
    * Tier pricing
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
    * Getter method for the ending_quantity attribute.
    * Ending quantity for the tier.  This represents a unit amount for unit-priced add ons. Must be left empty if it is the final tier.
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
    * Getter method for the usage_percentage attribute.
    * (deprecated) -- Use the percentage_tiers object instead.
    *
    * @return ?string
    */
    public function getUsagePercentage(): ?string
    {
        return $this->_usage_percentage;
    }

    /**
    * Setter method for the usage_percentage attribute.
    *
    * @param string $usage_percentage
    *
    * @return void
    */
    public function setUsagePercentage(string $usage_percentage): void
    {
        $this->_usage_percentage = $usage_percentage;
    }
}