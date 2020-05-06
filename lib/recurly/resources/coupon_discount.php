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
class CouponDiscount extends RecurlyResource
{
    private $_currencies;
    private $_percent;
    private $_trial;
    private $_type;

    protected static $array_hints = array(
        'setCurrencies' => '\Recurly\Resources\CouponDiscountPricing',
    );

    
    /**
    * Getter method for the currencies attribute.
    * This is only present when `type=fixed`.
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
    * Getter method for the percent attribute.
    * This is only present when `type=percent`.
    *
    * @return ?int
    */
    public function getPercent(): ?int
    {
        return $this->_percent;
    }

    /**
    * Setter method for the percent attribute.
    *
    * @param int $percent
    *
    * @return void
    */
    public function setPercent(int $percent): void
    {
        $this->_percent = $percent;
    }

    /**
    * Getter method for the trial attribute.
    * This is only present when `type=free_trial`.
    *
    * @return ?\Recurly\Resources\CouponDiscountTrial
    */
    public function getTrial(): ?\Recurly\Resources\CouponDiscountTrial
    {
        return $this->_trial;
    }

    /**
    * Setter method for the trial attribute.
    *
    * @param \Recurly\Resources\CouponDiscountTrial $trial
    *
    * @return void
    */
    public function setTrial(\Recurly\Resources\CouponDiscountTrial $trial): void
    {
        $this->_trial = $trial;
    }

    /**
    * Getter method for the type attribute.
    * 
    *
    * @return ?string
    */
    public function getType(): ?string
    {
        return $this->_type;
    }

    /**
    * Setter method for the type attribute.
    *
    * @param string $type
    *
    * @return void
    */
    public function setType(string $type): void
    {
        $this->_type = $type;
    }
}