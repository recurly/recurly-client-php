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
class SubscriptionAddOn extends RecurlyResource
{
    private $_add_on;
    private $_created_at;
    private $_expired_at;
    private $_id;
    private $_object;
    private $_quantity;
    private $_subscription_id;
    private $_unit_amount;
    private $_updated_at;

    protected static $array_hints = array(
    );

    
    /**
    * Getter method for the add_on attribute.
    *
    * @return \Recurly\Resources\AddOnMini Just the important parts.
    */
    public function getAddOn(): \Recurly\Resources\AddOnMini
    {
        return $this->_add_on;
    }

    /**
    * Setter method for the add_on attribute.
    *
    * @param \Recurly\Resources\AddOnMini $add_on
    *
    * @return void
    */
    public function setAddOn(\Recurly\Resources\AddOnMini $value): void
    {
        $this->_add_on = $value;
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
    * @return string Expired at
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
    * @return string Subscription Add-on ID
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
    * Getter method for the quantity attribute.
    *
    * @return int Add-on quantity
    */
    public function getQuantity(): int
    {
        return $this->_quantity;
    }

    /**
    * Setter method for the quantity attribute.
    *
    * @param int $quantity
    *
    * @return void
    */
    public function setQuantity(int $value): void
    {
        $this->_quantity = $value;
    }

    /**
    * Getter method for the subscription_id attribute.
    *
    * @return string Subscription ID
    */
    public function getSubscriptionId(): string
    {
        return $this->_subscription_id;
    }

    /**
    * Setter method for the subscription_id attribute.
    *
    * @param string $subscription_id
    *
    * @return void
    */
    public function setSubscriptionId(string $value): void
    {
        $this->_subscription_id = $value;
    }

    /**
    * Getter method for the unit_amount attribute.
    *
    * @return float This is priced in the subscription's currency.
    */
    public function getUnitAmount(): float
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
    public function setUnitAmount(float $value): void
    {
        $this->_unit_amount = $value;
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