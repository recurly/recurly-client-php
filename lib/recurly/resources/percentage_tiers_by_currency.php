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
class PercentageTiersByCurrency extends RecurlyResource
{
    private $_currency;
    private $_tiers;

    protected static $array_hints = [
        'setTiers' => '\Recurly\Resources\PercentageTier',
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
    * Getter method for the tiers attribute.
    * Tiers
    *
    * @return array
    */
    public function getTiers(): array
    {
        return $this->_tiers ?? [] ;
    }

    /**
    * Setter method for the tiers attribute.
    *
    * @param array $tiers
    *
    * @return void
    */
    public function setTiers(array $tiers): void
    {
        $this->_tiers = $tiers;
    }
}