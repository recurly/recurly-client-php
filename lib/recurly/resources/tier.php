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

    protected static $array_hints = array(
        'setCurrencies' => '\Recurly\Resources\Pricing',
    );

    
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
    * Ending quantity
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
}