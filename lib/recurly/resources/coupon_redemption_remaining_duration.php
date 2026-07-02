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
class CouponRedemptionRemainingDuration extends RecurlyResource
{
    private $_expires_at;
    private $_redemptions_remaining;
    private $_type;

    protected static $array_hints = [
    ];

    
    /**
    * Getter method for the expires_at attribute.
    * Present when `type` is `temporal`. The datetime after which this redemption will no longer apply.
    *
    * @return ?string
    */
    public function getExpiresAt(): ?string
    {
        return $this->_expires_at;
    }

    /**
    * Setter method for the expires_at attribute.
    *
    * @param string $expires_at
    *
    * @return void
    */
    public function setExpiresAt(string $expires_at): void
    {
        $this->_expires_at = $expires_at;
    }

    /**
    * Getter method for the redemptions_remaining attribute.
    * The number of redemption periods remaining for which this coupon will still apply.
    *
    * @return ?int
    */
    public function getRedemptionsRemaining(): ?int
    {
        return $this->_redemptions_remaining;
    }

    /**
    * Setter method for the redemptions_remaining attribute.
    *
    * @param int $redemptions_remaining
    *
    * @return void
    */
    public function setRedemptionsRemaining(int $redemptions_remaining): void
    {
        $this->_redemptions_remaining = $redemptions_remaining;
    }

    /**
    * Getter method for the type attribute.
    * The coupon's duration type. `temporal` includes an `expires_at` timestamp. `billing_periods` includes a `redemptions_remaining` count of billing cycles. `forever` and `single_use` have no additional fields.
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