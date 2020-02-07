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
class Coupon extends RecurlyResource
{
    private $_applies_to_all_plans;
    private $_applies_to_non_plan_charges;
    private $_code;
    private $_coupon_type;
    private $_created_at;
    private $_discount;
    private $_duration;
    private $_expired_at;
    private $_free_trial_amount;
    private $_free_trial_unit;
    private $_hosted_page_description;
    private $_id;
    private $_invoice_description;
    private $_max_redemptions;
    private $_max_redemptions_per_account;
    private $_name;
    private $_object;
    private $_plans;
    private $_plans_names;
    private $_redeem_by;
    private $_redemption_resource;
    private $_state;
    private $_temporal_amount;
    private $_temporal_unit;
    private $_unique_code_template;
    private $_unique_coupon_codes_count;
    private $_updated_at;

    protected static $array_hints = array(
        'setPlans' => '\Recurly\Resources\PlanMini',
        'setPlansNames' => 'string',
    );

    
    /**
    * Getter method for the applies_to_all_plans attribute.
    *
    * @return bool The coupon is valid for all plans if true. If false then `plans` and `plans_names` will list the applicable plans.
    */
    public function getAppliesToAllPlans(): bool
    {
        return $this->_applies_to_all_plans;
    }

    /**
    * Setter method for the applies_to_all_plans attribute.
    *
    * @param bool $applies_to_all_plans
    *
    * @return void
    */
    public function setAppliesToAllPlans(bool $value): void
    {
        $this->_applies_to_all_plans = $value;
    }

    /**
    * Getter method for the applies_to_non_plan_charges attribute.
    *
    * @return bool The coupon is valid for one-time, non-plan charges if true.
    */
    public function getAppliesToNonPlanCharges(): bool
    {
        return $this->_applies_to_non_plan_charges;
    }

    /**
    * Setter method for the applies_to_non_plan_charges attribute.
    *
    * @param bool $applies_to_non_plan_charges
    *
    * @return void
    */
    public function setAppliesToNonPlanCharges(bool $value): void
    {
        $this->_applies_to_non_plan_charges = $value;
    }

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
    * Getter method for the duration attribute.
    *
    * @return string - "single_use" coupons applies to the first invoice only.
- "temporal" coupons will apply to invoices for the duration determined by the `temporal_unit` and `temporal_amount` attributes.

    */
    public function getDuration(): string
    {
        return $this->_duration;
    }

    /**
    * Setter method for the duration attribute.
    *
    * @param string $duration
    *
    * @return void
    */
    public function setDuration(string $value): void
    {
        $this->_duration = $value;
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
    * Getter method for the free_trial_amount attribute.
    *
    * @return int Sets the duration of time the `free_trial_unit` is for.
    */
    public function getFreeTrialAmount(): int
    {
        return $this->_free_trial_amount;
    }

    /**
    * Setter method for the free_trial_amount attribute.
    *
    * @param int $free_trial_amount
    *
    * @return void
    */
    public function setFreeTrialAmount(int $value): void
    {
        $this->_free_trial_amount = $value;
    }

    /**
    * Getter method for the free_trial_unit attribute.
    *
    * @return string Description of the unit of time the coupon is for. Used with `free_trial_amount` to determine the duration of time the coupon is for.
    */
    public function getFreeTrialUnit(): string
    {
        return $this->_free_trial_unit;
    }

    /**
    * Setter method for the free_trial_unit attribute.
    *
    * @param string $free_trial_unit
    *
    * @return void
    */
    public function setFreeTrialUnit(string $value): void
    {
        $this->_free_trial_unit = $value;
    }

    /**
    * Getter method for the hosted_page_description attribute.
    *
    * @return string This description will show up when a customer redeems a coupon on your Hosted Payment Pages, or if you choose to show the description on your own checkout page.
    */
    public function getHostedPageDescription(): string
    {
        return $this->_hosted_page_description;
    }

    /**
    * Setter method for the hosted_page_description attribute.
    *
    * @param string $hosted_page_description
    *
    * @return void
    */
    public function setHostedPageDescription(string $value): void
    {
        $this->_hosted_page_description = $value;
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
    * Getter method for the invoice_description attribute.
    *
    * @return string Description of the coupon on the invoice.
    */
    public function getInvoiceDescription(): string
    {
        return $this->_invoice_description;
    }

    /**
    * Setter method for the invoice_description attribute.
    *
    * @param string $invoice_description
    *
    * @return void
    */
    public function setInvoiceDescription(string $value): void
    {
        $this->_invoice_description = $value;
    }

    /**
    * Getter method for the max_redemptions attribute.
    *
    * @return int A maximum number of redemptions for the coupon. The coupon will expire when it hits its maximum redemptions.
    */
    public function getMaxRedemptions(): int
    {
        return $this->_max_redemptions;
    }

    /**
    * Setter method for the max_redemptions attribute.
    *
    * @param int $max_redemptions
    *
    * @return void
    */
    public function setMaxRedemptions(int $value): void
    {
        $this->_max_redemptions = $value;
    }

    /**
    * Getter method for the max_redemptions_per_account attribute.
    *
    * @return int Redemptions per account is the number of times a specific account can redeem the coupon. Set redemptions per account to `1` if you want to keep customers from gaming the system and getting more than one discount from the coupon campaign.
    */
    public function getMaxRedemptionsPerAccount(): int
    {
        return $this->_max_redemptions_per_account;
    }

    /**
    * Setter method for the max_redemptions_per_account attribute.
    *
    * @param int $max_redemptions_per_account
    *
    * @return void
    */
    public function setMaxRedemptionsPerAccount(int $value): void
    {
        $this->_max_redemptions_per_account = $value;
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
    * Getter method for the plans attribute.
    *
    * @return array A list of plans for which this coupon applies. This will be `null` if `applies_to_all_plans=true`.
    */
    public function getPlans(): array
    {
        return $this->_plans;
    }

    /**
    * Setter method for the plans attribute.
    *
    * @param array $plans
    *
    * @return void
    */
    public function setPlans(array $value): void
    {
        $this->_plans = $value;
    }

    /**
    * Getter method for the plans_names attribute.
    *
    * @return array TODO
    */
    public function getPlansNames(): array
    {
        return $this->_plans_names;
    }

    /**
    * Setter method for the plans_names attribute.
    *
    * @param array $plans_names
    *
    * @return void
    */
    public function setPlansNames(array $value): void
    {
        $this->_plans_names = $value;
    }

    /**
    * Getter method for the redeem_by attribute.
    *
    * @return string The date and time the coupon will expire and can no longer be redeemed. Time is always 11:59:59, the end-of-day Pacific time.
    */
    public function getRedeemBy(): string
    {
        return $this->_redeem_by;
    }

    /**
    * Setter method for the redeem_by attribute.
    *
    * @param string $redeem_by
    *
    * @return void
    */
    public function setRedeemBy(string $value): void
    {
        $this->_redeem_by = $value;
    }

    /**
    * Getter method for the redemption_resource attribute.
    *
    * @return string Whether the discount is for all eligible charges on the account, or only a specific subscription.
    */
    public function getRedemptionResource(): string
    {
        return $this->_redemption_resource;
    }

    /**
    * Setter method for the redemption_resource attribute.
    *
    * @param string $redemption_resource
    *
    * @return void
    */
    public function setRedemptionResource(string $value): void
    {
        $this->_redemption_resource = $value;
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

    /**
    * Getter method for the temporal_amount attribute.
    *
    * @return int If `duration` is "temporal" than `temporal_amount` is an integer which is multiplied by `temporal_unit` to define the duration that the coupon will be applied to invoices for.
    */
    public function getTemporalAmount(): int
    {
        return $this->_temporal_amount;
    }

    /**
    * Setter method for the temporal_amount attribute.
    *
    * @param int $temporal_amount
    *
    * @return void
    */
    public function setTemporalAmount(int $value): void
    {
        $this->_temporal_amount = $value;
    }

    /**
    * Getter method for the temporal_unit attribute.
    *
    * @return string If `duration` is "temporal" than `temporal_unit` is multiplied by `temporal_amount` to define the duration that the coupon will be applied to invoices for.
    */
    public function getTemporalUnit(): string
    {
        return $this->_temporal_unit;
    }

    /**
    * Setter method for the temporal_unit attribute.
    *
    * @param string $temporal_unit
    *
    * @return void
    */
    public function setTemporalUnit(string $value): void
    {
        $this->_temporal_unit = $value;
    }

    /**
    * Getter method for the unique_code_template attribute.
    *
    * @return string On a bulk coupon, the template from which unique coupon codes are generated.
    */
    public function getUniqueCodeTemplate(): string
    {
        return $this->_unique_code_template;
    }

    /**
    * Setter method for the unique_code_template attribute.
    *
    * @param string $unique_code_template
    *
    * @return void
    */
    public function setUniqueCodeTemplate(string $value): void
    {
        $this->_unique_code_template = $value;
    }

    /**
    * Getter method for the unique_coupon_codes_count attribute.
    *
    * @return int When this number reaches `max_redemptions` the coupon will no longer be redeemable.
    */
    public function getUniqueCouponCodesCount(): int
    {
        return $this->_unique_coupon_codes_count;
    }

    /**
    * Setter method for the unique_coupon_codes_count attribute.
    *
    * @param int $unique_coupon_codes_count
    *
    * @return void
    */
    public function setUniqueCouponCodesCount(int $value): void
    {
        $this->_unique_coupon_codes_count = $value;
    }

    /**
    * Getter method for the updated_at attribute.
    *
    * @return string Last updated at
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