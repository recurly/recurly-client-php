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
class PercentageTier extends RecurlyResource
{
    private $_ending_amount;
    private $_usage_percentage;

    protected static $array_hints = [
    ];

    
    /**
    * Getter method for the ending_amount attribute.
    * Ending amount for the tier. Allows up to 2 decimal places. The last tier ending_amount is null.
    *
    * @return ?float
    */
    public function getEndingAmount(): ?float
    {
        return $this->_ending_amount;
    }

    /**
    * Setter method for the ending_amount attribute.
    *
    * @param float $ending_amount
    *
    * @return void
    */
    public function setEndingAmount(float $ending_amount): void
    {
        $this->_ending_amount = $ending_amount;
    }

    /**
    * Getter method for the usage_percentage attribute.
    * Decimal usage percentage.
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