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
class Settings extends RecurlyResource
{
    private $_accepted_currencies;
    private $_billing_address_requirement;
    private $_default_currency;

    protected static $array_hints = array(
        'setAcceptedCurrencies' => 'string',
    );

    
    /**
    * Getter method for the accepted_currencies attribute.
    * 
    *
    * @return array
    */
    public function getAcceptedCurrencies(): array
    {
        return $this->_accepted_currencies ?? [] ;
    }

    /**
    * Setter method for the accepted_currencies attribute.
    *
    * @param array $accepted_currencies
    *
    * @return void
    */
    public function setAcceptedCurrencies(array $accepted_currencies): void
    {
        $this->_accepted_currencies = $accepted_currencies;
    }

    /**
    * Getter method for the billing_address_requirement attribute.
    * - full:      Full Address (Street, City, State, Postal Code and Country)
- streetzip: Street and Postal Code only
- zip:       Postal Code only
- none:      No Address

    *
    * @return ?string
    */
    public function getBillingAddressRequirement(): ?string
    {
        return $this->_billing_address_requirement;
    }

    /**
    * Setter method for the billing_address_requirement attribute.
    *
    * @param string $billing_address_requirement
    *
    * @return void
    */
    public function setBillingAddressRequirement(string $billing_address_requirement): void
    {
        $this->_billing_address_requirement = $billing_address_requirement;
    }

    /**
    * Getter method for the default_currency attribute.
    * The default 3-letter ISO 4217 currency code.
    *
    * @return ?string
    */
    public function getDefaultCurrency(): ?string
    {
        return $this->_default_currency;
    }

    /**
    * Setter method for the default_currency attribute.
    *
    * @param string $default_currency
    *
    * @return void
    */
    public function setDefaultCurrency(string $default_currency): void
    {
        $this->_default_currency = $default_currency;
    }
}