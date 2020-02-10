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
class CouponRedemptionMini extends RecurlyResource
{
    private $_coupon;
    private $_created_at;
    private $_discounted;
    private $_id;
    private $_object;
    private $_state;

    protected static $array_hints = array(
    );

    
    /**
    * Getter method for the coupon attribute.
    *
    * @return \Recurly\Resources\CouponMini 
    */
    public function getCoupon(): \Recurly\Resources\CouponMini
    {
        return $this->_coupon;
    }

    /**
    * Setter method for the coupon attribute.
    *
    * @param \Recurly\Resources\CouponMini $coupon
    *
    * @return void
    */
    public function setCoupon(\Recurly\Resources\CouponMini $coupon): void
    {
        $this->_coupon = $coupon;
    }

    /**
    * Getter method for the created_at attribute.
    *
    * @return string Created at
    */
    public function getCreatedAt(): string
    {
        return $this->_created_at;
    }

    /**
    * Setter method for the created_at attribute.
    *
    * @param string $created_at
    *
    * @return void
    */
    public function setCreatedAt(string $created_at): void
    {
        $this->_created_at = $created_at;
    }

    /**
    * Getter method for the discounted attribute.
    *
    * @return float The amount that was discounted upon the application of the coupon, formatted with the currency.
    */
    public function getDiscounted(): float
    {
        return $this->_discounted;
    }

    /**
    * Setter method for the discounted attribute.
    *
    * @param float $discounted
    *
    * @return void
    */
    public function setDiscounted(float $discounted): void
    {
        $this->_discounted = $discounted;
    }

    /**
    * Getter method for the id attribute.
    *
    * @return string Coupon Redemption ID
    */
    public function getId(): string
    {
        return $this->_id;
    }

    /**
    * Setter method for the id attribute.
    *
    * @param string $id
    *
    * @return void
    */
    public function setId(string $id): void
    {
        $this->_id = $id;
    }

    /**
    * Getter method for the object attribute.
    *
    * @return string Will always be `coupon`.
    */
    public function getObject(): string
    {
        return $this->_object;
    }

    /**
    * Setter method for the object attribute.
    *
    * @param string $object
    *
    * @return void
    */
    public function setObject(string $object): void
    {
        $this->_object = $object;
    }

    /**
    * Getter method for the state attribute.
    *
    * @return string Invoice state
    */
    public function getState(): string
    {
        return $this->_state;
    }

    /**
    * Setter method for the state attribute.
    *
    * @param string $state
    *
    * @return void
    */
    public function setState(string $state): void
    {
        $this->_state = $state;
    }
}