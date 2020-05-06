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
    * The code the customer enters to redeem the coupon.
    *
    * @return ?string
    */
    public function getCode(): ?string
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
    public function setCode(string $code): void
    {
        $this->_code = $code;
    }

    /**
    * Getter method for the coupon_type attribute.
    * Whether the coupon is "single_code" or "bulk". Bulk coupons will require a `unique_code_template` and will generate unique codes through the `/generate` endpoint.
    *
    * @return ?string
    */
    public function getCouponType(): ?string
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
    public function setCouponType(string $coupon_type): void
    {
        $this->_coupon_type = $coupon_type;
    }

    /**
    * Getter method for the discount attribute.
    * Details of the discount a coupon applies. Will contain a `type`
property and one of the following properties: `percent`, `fixed`, `trial`.

    *
    * @return ?\Recurly\Resources\CouponDiscount
    */
    public function getDiscount(): ?\Recurly\Resources\CouponDiscount
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
    public function setDiscount(\Recurly\Resources\CouponDiscount $discount): void
    {
        $this->_discount = $discount;
    }

    /**
    * Getter method for the expired_at attribute.
    * The date and time the coupon was expired early or reached its `max_redemptions`.
    *
    * @return ?string
    */
    public function getExpiredAt(): ?string
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
    public function setExpiredAt(string $expired_at): void
    {
        $this->_expired_at = $expired_at;
    }

    /**
    * Getter method for the id attribute.
    * Coupon ID
    *
    * @return ?string
    */
    public function getId(): ?string
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
    * Getter method for the name attribute.
    * The internal name for the coupon.
    *
    * @return ?string
    */
    public function getName(): ?string
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
    public function setName(string $name): void
    {
        $this->_name = $name;
    }

    /**
    * Getter method for the object attribute.
    * Object type
    *
    * @return ?string
    */
    public function getObject(): ?string
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
    * Indicates if the coupon is redeemable, and if it is not, why.
    *
    * @return ?string
    */
    public function getState(): ?string
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