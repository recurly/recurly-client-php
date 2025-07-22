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
class PlanRampPricing extends RecurlyResource
{
    private $_currency;
    private $_price_segment_id;
    private $_unit_amount;

    protected static $array_hints = [
    ];

    
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
    * Getter method for the price_segment_id attribute.
    * The price segment ID or code. For ID no prefix is used e.g. `e28zov4fw0v2`. For requests, the code can also be used. Use prefix `code-`, e.g. `code-gold`.
    *
    * @return ?string
    */
    public function getPriceSegmentId(): ?string
    {
        return $this->_price_segment_id;
    }

    /**
    * Setter method for the price_segment_id attribute.
    *
    * @param string $price_segment_id
    *
    * @return void
    */
    public function setPriceSegmentId(string $price_segment_id): void
    {
        $this->_price_segment_id = $price_segment_id;
    }

    /**
    * Getter method for the unit_amount attribute.
    * Represents the price for the Ramp Interval.
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