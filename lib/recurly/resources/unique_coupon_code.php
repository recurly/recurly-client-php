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
class UniqueCouponCode extends RecurlyResource
{
    private $_code;
    private $_created_at;
    private $_expired_at;
    private $_id;
    private $_object;
    private $_redeemed_at;
    private $_state;
    private $_updated_at;

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
    public function setCreatedAt(string $value): void
    {
        $this->_created_at = $value;
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
    * @return string Unique Coupon Code ID
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
    * Getter method for the redeemed_at attribute.
    *
    * @return string The date and time the unique coupon code was redeemed.
    */
    public function getRedeemedAt(): string
    {
        return $this->_redeemed_at;
    }

    /**
    * Setter method for the redeemed_at attribute.
    *
    * @param string $redeemed_at
    *
    * @return void
    */
    public function setRedeemedAt(string $value): void
    {
        $this->_redeemed_at = $value;
    }

    /**
    * Getter method for the state attribute.
    *
    * @return string Indicates if the unique coupon code is redeemable or why not.
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

    /**
    * Getter method for the updated_at attribute.
    *
    * @return string Updated at
    */
    public function getUpdatedAt(): string
    {
        return $this->_updated_at;
    }

    /**
    * Setter method for the updated_at attribute.
    *
    * @param string $updated_at
    *
    * @return void
    */
    public function setUpdatedAt(string $value): void
    {
        $this->_updated_at = $value;
    }
}