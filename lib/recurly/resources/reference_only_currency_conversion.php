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
class ReferenceOnlyCurrencyConversion extends RecurlyResource
{
    private $_currency;
    private $_subtotal_in_cents;
    private $_tax_in_cents;

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
    * Getter method for the subtotal_in_cents attribute.
    * The subtotal converted to the currency.
    *
    * @return ?float
    */
    public function getSubtotalInCents(): ?float
    {
        return $this->_subtotal_in_cents;
    }

    /**
    * Setter method for the subtotal_in_cents attribute.
    *
    * @param float $subtotal_in_cents
    *
    * @return void
    */
    public function setSubtotalInCents(float $subtotal_in_cents): void
    {
        $this->_subtotal_in_cents = $subtotal_in_cents;
    }

    /**
    * Getter method for the tax_in_cents attribute.
    * The tax converted to the currency.
    *
    * @return ?float
    */
    public function getTaxInCents(): ?float
    {
        return $this->_tax_in_cents;
    }

    /**
    * Setter method for the tax_in_cents attribute.
    *
    * @param float $tax_in_cents
    *
    * @return void
    */
    public function setTaxInCents(float $tax_in_cents): void
    {
        $this->_tax_in_cents = $tax_in_cents;
    }
}