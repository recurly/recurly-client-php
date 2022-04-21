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
    private $_add_on_source;
    private $_created_at;
    private $_expired_at;
    private $_id;
    private $_object;
    private $_percentage_tiers;
    private $_quantity;
    private $_revenue_schedule_type;
    private $_subscription_id;
    private $_tier_type;
    private $_tiers;
    private $_unit_amount;
    private $_unit_amount_decimal;
    private $_updated_at;
    private $_usage_percentage;
    private $_usage_timeframe;

    protected static $array_hints = [
        'setPercentageTiers' => '\Recurly\Resources\SubscriptionAddOnPercentageTier',
        'setTiers' => '\Recurly\Resources\SubscriptionAddOnTier',
    ];

    
    /**
    * Getter method for the add_on attribute.
    * Just the important parts.
    *
    * @return ?\Recurly\Resources\AddOnMini
    */
    public function getAddOn(): ?\Recurly\Resources\AddOnMini
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
    public function setAddOn(\Recurly\Resources\AddOnMini $add_on): void
    {
        $this->_add_on = $add_on;
    }

    /**
    * Getter method for the add_on_source attribute.
    * Used to determine where the associated add-on data is pulled from. If this value is set to
`plan_add_on` or left blank, then add-on data will be pulled from the plan's add-ons. If the associated
`plan` has `allow_any_item_on_subscriptions` set to `true` and this field is set to `item`, then
the associated add-on data will be pulled from the site's item catalog.

    *
    * @return ?string
    */
    public function getAddOnSource(): ?string
    {
        return $this->_add_on_source;
    }

    /**
    * Setter method for the add_on_source attribute.
    *
    * @param string $add_on_source
    *
    * @return void
    */
    public function setAddOnSource(string $add_on_source): void
    {
        $this->_add_on_source = $add_on_source;
    }

    /**
    * Getter method for the created_at attribute.
    * Created at
    *
    * @return ?string
    */
    public function getCreatedAt(): ?string
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
    * Getter method for the expired_at attribute.
    * Expired at
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
    * Subscription Add-on ID
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
    * Getter method for the percentage_tiers attribute.
    * If percentage tiers are provided in the request, all existing percentage tiers on the Subscription Add-on will be
removed and replaced by the percentage tiers in the request. Use only if add_on.tier_type is tiered or volume and
add_on.usage_type is percentage.
There must be one tier without an `ending_amount` value which represents the final tier.

    *
    * @return array
    */
    public function getPercentageTiers(): array
    {
        return $this->_percentage_tiers ?? [] ;
    }

    /**
    * Setter method for the percentage_tiers attribute.
    *
    * @param array $percentage_tiers
    *
    * @return void
    */
    public function setPercentageTiers(array $percentage_tiers): void
    {
        $this->_percentage_tiers = $percentage_tiers;
    }

    /**
    * Getter method for the quantity attribute.
    * Add-on quantity
    *
    * @return ?int
    */
    public function getQuantity(): ?int
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
    public function setQuantity(int $quantity): void
    {
        $this->_quantity = $quantity;
    }

    /**
    * Getter method for the revenue_schedule_type attribute.
    * Revenue schedule type
    *
    * @return ?string
    */
    public function getRevenueScheduleType(): ?string
    {
        return $this->_revenue_schedule_type;
    }

    /**
    * Setter method for the revenue_schedule_type attribute.
    *
    * @param string $revenue_schedule_type
    *
    * @return void
    */
    public function setRevenueScheduleType(string $revenue_schedule_type): void
    {
        $this->_revenue_schedule_type = $revenue_schedule_type;
    }

    /**
    * Getter method for the subscription_id attribute.
    * Subscription ID
    *
    * @return ?string
    */
    public function getSubscriptionId(): ?string
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
    public function setSubscriptionId(string $subscription_id): void
    {
        $this->_subscription_id = $subscription_id;
    }

    /**
    * Getter method for the tier_type attribute.
    * The pricing model for the add-on.  For more information,
[click here](https://docs.recurly.com/docs/billing-models#section-quantity-based). See our
[Guide](https://developers.recurly.com/guides/item-addon-guide.html) for an overview of how
to configure quantity-based pricing models.

    *
    * @return ?string
    */
    public function getTierType(): ?string
    {
        return $this->_tier_type;
    }

    /**
    * Setter method for the tier_type attribute.
    *
    * @param string $tier_type
    *
    * @return void
    */
    public function setTierType(string $tier_type): void
    {
        $this->_tier_type = $tier_type;
    }

    /**
    * Getter method for the tiers attribute.
    * If tiers are provided in the request, all existing tiers on the Subscription Add-on will be
removed and replaced by the tiers in the request. If add_on.tier_type is tiered or volume and
add_on.usage_type is percentage use percentage_tiers instead.
There must be one tier without an `ending_quantity` value which represents the final tier.

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

    /**
    * Getter method for the unit_amount attribute.
    * Supports up to 2 decimal places.
    *
    * @return ?float
    */
    public function getUnitAmount(): ?float
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
    public function setUnitAmount(float $unit_amount): void
    {
        $this->_unit_amount = $unit_amount;
    }

    /**
    * Getter method for the unit_amount_decimal attribute.
    * Supports up to 9 decimal places.
    *
    * @return ?string
    */
    public function getUnitAmountDecimal(): ?string
    {
        return $this->_unit_amount_decimal;
    }

    /**
    * Setter method for the unit_amount_decimal attribute.
    *
    * @param string $unit_amount_decimal
    *
    * @return void
    */
    public function setUnitAmountDecimal(string $unit_amount_decimal): void
    {
        $this->_unit_amount_decimal = $unit_amount_decimal;
    }

    /**
    * Getter method for the updated_at attribute.
    * Updated at
    *
    * @return ?string
    */
    public function getUpdatedAt(): ?string
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
    public function setUpdatedAt(string $updated_at): void
    {
        $this->_updated_at = $updated_at;
    }

    /**
    * Getter method for the usage_percentage attribute.
    * The percentage taken of the monetary amount of usage tracked. This can be up to 4 decimal places. A value between 0.0 and 100.0. Required if add_on_type is usage and usage_type is percentage.
    *
    * @return ?float
    */
    public function getUsagePercentage(): ?float
    {
        return $this->_usage_percentage;
    }

    /**
    * Setter method for the usage_percentage attribute.
    *
    * @param float $usage_percentage
    *
    * @return void
    */
    public function setUsagePercentage(float $usage_percentage): void
    {
        $this->_usage_percentage = $usage_percentage;
    }

    /**
    * Getter method for the usage_timeframe attribute.
    * The time at which usage totals are reset for billing purposes.
    *
    * @return ?string
    */
    public function getUsageTimeframe(): ?string
    {
        return $this->_usage_timeframe;
    }

    /**
    * Setter method for the usage_timeframe attribute.
    *
    * @param string $usage_timeframe
    *
    * @return void
    */
    public function setUsageTimeframe(string $usage_timeframe): void
    {
        $this->_usage_timeframe = $usage_timeframe;
    }
}