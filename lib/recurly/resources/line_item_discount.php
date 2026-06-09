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
class LineItemDiscount extends RecurlyResource
{
    private $_coupon_id;
    private $_coupon_redemption_id;
    private $_currency;
    private $_discount_amount;
    private $_object;
    private $_order_applied;

    protected static $array_hints = [
    ];

    
    /**
    * Getter method for the coupon_id attribute.
    * The ID of the coupon that generated this discount.
    *
    * @return ?string
    */
    public function getCouponId(): ?string
    {
        return $this->_coupon_id;
    }

    /**
    * Setter method for the coupon_id attribute.
    *
    * @param string $coupon_id
    *
    * @return void
    */
    public function setCouponId(string $coupon_id): void
    {
        $this->_coupon_id = $coupon_id;
    }

    /**
    * Getter method for the coupon_redemption_id attribute.
    * The ID of the coupon redemption that generated this discount.
    *
    * @return ?string
    */
    public function getCouponRedemptionId(): ?string
    {
        return $this->_coupon_redemption_id;
    }

    /**
    * Setter method for the coupon_redemption_id attribute.
    *
    * @param string $coupon_redemption_id
    *
    * @return void
    */
    public function setCouponRedemptionId(string $coupon_redemption_id): void
    {
        $this->_coupon_redemption_id = $coupon_redemption_id;
    }

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
    * Getter method for the discount_amount attribute.
    * The amount discounted on this line item by this coupon redemption.
    *
    * @return ?float
    */
    public function getDiscountAmount(): ?float
    {
        return $this->_discount_amount;
    }

    /**
    * Setter method for the discount_amount attribute.
    *
    * @param float $discount_amount
    *
    * @return void
    */
    public function setDiscountAmount(float $discount_amount): void
    {
        $this->_discount_amount = $discount_amount;
    }

    /**
    * Getter method for the object attribute.
    * Will always be `line_item_discount`.
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
    * Getter method for the order_applied attribute.
    * The order in which this discount was applied when multiple coupons were redeemed.
    *
    * @return ?int
    */
    public function getOrderApplied(): ?int
    {
        return $this->_order_applied;
    }

    /**
    * Setter method for the order_applied attribute.
    *
    * @param int $order_applied
    *
    * @return void
    */
    public function setOrderApplied(int $order_applied): void
    {
        $this->_order_applied = $order_applied;
    }
}