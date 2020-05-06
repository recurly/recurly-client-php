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
    private $_redeemed_at;
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
    * The coupon is valid for all plans if true. If false then `plans` and `plans_names` will list the applicable plans.
    *
    * @return ?bool
    */
    public function getAppliesToAllPlans(): ?bool
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
    public function setAppliesToAllPlans(bool $applies_to_all_plans): void
    {
        $this->_applies_to_all_plans = $applies_to_all_plans;
    }

    /**
    * Getter method for the applies_to_non_plan_charges attribute.
    * The coupon is valid for one-time, non-plan charges if true.
    *
    * @return ?bool
    */
    public function getAppliesToNonPlanCharges(): ?bool
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
    public function setAppliesToNonPlanCharges(bool $applies_to_non_plan_charges): void
    {
        $this->_applies_to_non_plan_charges = $applies_to_non_plan_charges;
    }

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
    * Getter method for the duration attribute.
    * - "single_use" coupons applies to the first invoice only.
- "temporal" coupons will apply to invoices for the duration determined by the `temporal_unit` and `temporal_amount` attributes.

    *
    * @return ?string
    */
    public function getDuration(): ?string
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
    public function setDuration(string $duration): void
    {
        $this->_duration = $duration;
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
    * Getter method for the free_trial_amount attribute.
    * Sets the duration of time the `free_trial_unit` is for.
    *
    * @return ?int
    */
    public function getFreeTrialAmount(): ?int
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
    public function setFreeTrialAmount(int $free_trial_amount): void
    {
        $this->_free_trial_amount = $free_trial_amount;
    }

    /**
    * Getter method for the free_trial_unit attribute.
    * Description of the unit of time the coupon is for. Used with `free_trial_amount` to determine the duration of time the coupon is for.
    *
    * @return ?string
    */
    public function getFreeTrialUnit(): ?string
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
    public function setFreeTrialUnit(string $free_trial_unit): void
    {
        $this->_free_trial_unit = $free_trial_unit;
    }

    /**
    * Getter method for the hosted_page_description attribute.
    * This description will show up when a customer redeems a coupon on your Hosted Payment Pages, or if you choose to show the description on your own checkout page.
    *
    * @return ?string
    */
    public function getHostedPageDescription(): ?string
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
    public function setHostedPageDescription(string $hosted_page_description): void
    {
        $this->_hosted_page_description = $hosted_page_description;
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
    * Getter method for the invoice_description attribute.
    * Description of the coupon on the invoice.
    *
    * @return ?string
    */
    public function getInvoiceDescription(): ?string
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
    public function setInvoiceDescription(string $invoice_description): void
    {
        $this->_invoice_description = $invoice_description;
    }

    /**
    * Getter method for the max_redemptions attribute.
    * A maximum number of redemptions for the coupon. The coupon will expire when it hits its maximum redemptions.
    *
    * @return ?int
    */
    public function getMaxRedemptions(): ?int
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
    public function setMaxRedemptions(int $max_redemptions): void
    {
        $this->_max_redemptions = $max_redemptions;
    }

    /**
    * Getter method for the max_redemptions_per_account attribute.
    * Redemptions per account is the number of times a specific account can redeem the coupon. Set redemptions per account to `1` if you want to keep customers from gaming the system and getting more than one discount from the coupon campaign.
    *
    * @return ?int
    */
    public function getMaxRedemptionsPerAccount(): ?int
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
    public function setMaxRedemptionsPerAccount(int $max_redemptions_per_account): void
    {
        $this->_max_redemptions_per_account = $max_redemptions_per_account;
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
    * Getter method for the plans attribute.
    * A list of plans for which this coupon applies. This will be `null` if `applies_to_all_plans=true`.
    *
    * @return array
    */
    public function getPlans(): array
    {
        return $this->_plans ?? [] ;
    }

    /**
    * Setter method for the plans attribute.
    *
    * @param array $plans
    *
    * @return void
    */
    public function setPlans(array $plans): void
    {
        $this->_plans = $plans;
    }

    /**
    * Getter method for the plans_names attribute.
    * TODO
    *
    * @return array
    */
    public function getPlansNames(): array
    {
        return $this->_plans_names ?? [] ;
    }

    /**
    * Setter method for the plans_names attribute.
    *
    * @param array $plans_names
    *
    * @return void
    */
    public function setPlansNames(array $plans_names): void
    {
        $this->_plans_names = $plans_names;
    }

    /**
    * Getter method for the redeem_by attribute.
    * The date and time the coupon will expire and can no longer be redeemed. Time is always 11:59:59, the end-of-day Pacific time.
    *
    * @return ?string
    */
    public function getRedeemBy(): ?string
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
    public function setRedeemBy(string $redeem_by): void
    {
        $this->_redeem_by = $redeem_by;
    }

    /**
    * Getter method for the redeemed_at attribute.
    * The date and time the unique coupon code was redeemed. This is only present for bulk coupons.
    *
    * @return ?string
    */
    public function getRedeemedAt(): ?string
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
    public function setRedeemedAt(string $redeemed_at): void
    {
        $this->_redeemed_at = $redeemed_at;
    }

    /**
    * Getter method for the redemption_resource attribute.
    * Whether the discount is for all eligible charges on the account, or only a specific subscription.
    *
    * @return ?string
    */
    public function getRedemptionResource(): ?string
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
    public function setRedemptionResource(string $redemption_resource): void
    {
        $this->_redemption_resource = $redemption_resource;
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

    /**
    * Getter method for the temporal_amount attribute.
    * If `duration` is "temporal" than `temporal_amount` is an integer which is multiplied by `temporal_unit` to define the duration that the coupon will be applied to invoices for.
    *
    * @return ?int
    */
    public function getTemporalAmount(): ?int
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
    public function setTemporalAmount(int $temporal_amount): void
    {
        $this->_temporal_amount = $temporal_amount;
    }

    /**
    * Getter method for the temporal_unit attribute.
    * If `duration` is "temporal" than `temporal_unit` is multiplied by `temporal_amount` to define the duration that the coupon will be applied to invoices for.
    *
    * @return ?string
    */
    public function getTemporalUnit(): ?string
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
    public function setTemporalUnit(string $temporal_unit): void
    {
        $this->_temporal_unit = $temporal_unit;
    }

    /**
    * Getter method for the unique_code_template attribute.
    * On a bulk coupon, the template from which unique coupon codes are generated.
    *
    * @return ?string
    */
    public function getUniqueCodeTemplate(): ?string
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
    public function setUniqueCodeTemplate(string $unique_code_template): void
    {
        $this->_unique_code_template = $unique_code_template;
    }

    /**
    * Getter method for the unique_coupon_codes_count attribute.
    * When this number reaches `max_redemptions` the coupon will no longer be redeemable.
    *
    * @return ?int
    */
    public function getUniqueCouponCodesCount(): ?int
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
    public function setUniqueCouponCodesCount(int $unique_coupon_codes_count): void
    {
        $this->_unique_coupon_codes_count = $unique_coupon_codes_count;
    }

    /**
    * Getter method for the updated_at attribute.
    * Last updated at
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
}