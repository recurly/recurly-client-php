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
class CouponMini extends RecurlyResource
{
    private $_code;
    private $_coupon_type;
    private $_discount;
    private $_expired_at;
    private $_id;
    private $_name;
    private $_object;
    private $_state;

    protected static $array_hints = array(
    );

    
    /**
    * Getter method for the code attribute.
    *
    * @return string The code the customer enters to redeem the coupon.
    */
    public function getCode(): string
    {
        return $this->_code;
    }

    /**
    * Setter method for the code attribute.
    *
    * @param string $code
    *
    * @return void
    */
    public function setCode(string $value): void
    {
        $this->_code = $value;
    }

    /**
    * Getter method for the coupon_type attribute.
    *
    * @return string Whether the coupon is "single_code" or "bulk". Bulk coupons will require a `unique_code_template` and will generate unique codes through the `/generate` endpoint.
    */
    public function getCouponType(): string
    {
        return $this->_coupon_type;
    }

    /**
    * Setter method for the coupon_type attribute.
    *
    * @param string $coupon_type
    *
    * @return void
    */
    public function setCouponType(string $value): void
    {
        $this->_coupon_type = $value;
    }

    /**
    * Getter method for the discount attribute.
    *
    * @return \Recurly\Resources\CouponDiscount Details of the discount a coupon applies. Will contain a `type`
property and one of the following properties: `percent`, `fixed`, `trial`.

    */
    public function getDiscount(): \Recurly\Resources\CouponDiscount
    {
        return $this->_discount;
    }

    /**
    * Setter method for the discount attribute.
    *
    * @param \Recurly\Resources\CouponDiscount $discount
    *
    * @return void
    */
    public function setDiscount(\Recurly\Resources\CouponDiscount $value): void
    {
        $this->_discount = $value;
    }

    /**
    * Getter method for the expired_at attribute.
    *
    * @return string The date and time the coupon was expired early or reached its `max_redemptions`.
    */
    public function getExpiredAt(): string
    {
        return $this->_expired_at;
    }

    /**
    * Setter method for the expired_at attribute.
    *
    * @param string $expired_at
    *
    * @return void
    */
    public function setExpiredAt(string $value): void
    {
        $this->_expired_at = $value;
    }

    /**
    * Getter method for the id attribute.
    *
    * @return string Coupon ID
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
    public function setId(string $value): void
    {
        $this->_id = $value;
    }

    /**
    * Getter method for the name attribute.
    *
    * @return string The internal name for the coupon.
    */
    public function getName(): string
    {
        return $this->_name;
    }

    /**
    * Setter method for the name attribute.
    *
    * @param string $name
    *
    * @return void
    */
    public function setName(string $value): void
    {
        $this->_name = $value;
    }

    /**
    * Getter method for the object attribute.
    *
    * @return string Object type
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
    public function setObject(string $value): void
    {
        $this->_object = $value;
    }

    /**
    * Getter method for the state attribute.
    *
    * @return string Indicates if the coupon is redeemable, and if it is not, why.
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
    public function setState(string $value): void
    {
        $this->_state = $value;
    }
}