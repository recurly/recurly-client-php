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
class Subscription extends RecurlyResource
{
    private $_account;
    private $_activated_at;
    private $_add_ons;
    private $_add_ons_total;
    private $_auto_renew;
    private $_bank_account_authorized_at;
    private $_canceled_at;
    private $_collection_method;
    private $_coupon_redemptions;
    private $_created_at;
    private $_currency;
    private $_current_period_ends_at;
    private $_current_period_started_at;
    private $_current_term_ends_at;
    private $_current_term_started_at;
    private $_custom_fields;
    private $_customer_notes;
    private $_expiration_reason;
    private $_expires_at;
    private $_id;
    private $_net_terms;
    private $_object;
    private $_paused_at;
    private $_pending_change;
    private $_plan;
    private $_po_number;
    private $_quantity;
    private $_remaining_billing_cycles;
    private $_remaining_pause_cycles;
    private $_renewal_billing_cycles;
    private $_revenue_schedule_type;
    private $_shipping;
    private $_state;
    private $_subtotal;
    private $_terms_and_conditions;
    private $_total_billing_cycles;
    private $_trial_ends_at;
    private $_trial_started_at;
    private $_unit_amount;
    private $_updated_at;
    private $_uuid;

    protected static $array_hints = array(
        'setAddOns' => '\Recurly\Resources\SubscriptionAddOn',
        'setCouponRedemptions' => '\Recurly\Resources\CouponRedemptionMini',
        'setCustomFields' => '\Recurly\Resources\CustomField',
    );

    
    /**
    * Getter method for the account attribute.
    * Account mini details
    *
    * @return ?\Recurly\Resources\AccountMini
    */
    public function getAccount(): ?\Recurly\Resources\AccountMini
    {
        return $this->_account;
    }

    /**
    * Setter method for the account attribute.
    *
    * @param \Recurly\Resources\AccountMini $account
    *
    * @return void
    */
    public function setAccount(\Recurly\Resources\AccountMini $account): void
    {
        $this->_account = $account;
    }

    /**
    * Getter method for the activated_at attribute.
    * Activated at
    *
    * @return ?string
    */
    public function getActivatedAt(): ?string
    {
        return $this->_activated_at;
    }

    /**
    * Setter method for the activated_at attribute.
    *
    * @param string $activated_at
    *
    * @return void
    */
    public function setActivatedAt(string $activated_at): void
    {
        $this->_activated_at = $activated_at;
    }

    /**
    * Getter method for the add_ons attribute.
    * Add-ons
    *
    * @return array
    */
    public function getAddOns(): array
    {
        return $this->_add_ons ?? [] ;
    }

    /**
    * Setter method for the add_ons attribute.
    *
    * @param array $add_ons
    *
    * @return void
    */
    public function setAddOns(array $add_ons): void
    {
        $this->_add_ons = $add_ons;
    }

    /**
    * Getter method for the add_ons_total attribute.
    * Total price of add-ons
    *
    * @return ?float
    */
    public function getAddOnsTotal(): ?float
    {
        return $this->_add_ons_total;
    }

    /**
    * Setter method for the add_ons_total attribute.
    *
    * @param float $add_ons_total
    *
    * @return void
    */
    public function setAddOnsTotal(float $add_ons_total): void
    {
        $this->_add_ons_total = $add_ons_total;
    }

    /**
    * Getter method for the auto_renew attribute.
    * Whether the subscription renews at the end of its term.
    *
    * @return ?bool
    */
    public function getAutoRenew(): ?bool
    {
        return $this->_auto_renew;
    }

    /**
    * Setter method for the auto_renew attribute.
    *
    * @param bool $auto_renew
    *
    * @return void
    */
    public function setAutoRenew(bool $auto_renew): void
    {
        $this->_auto_renew = $auto_renew;
    }

    /**
    * Getter method for the bank_account_authorized_at attribute.
    * Recurring subscriptions paid with ACH will have this attribute set. This timestamp is used for alerting customers to reauthorize in 3 years in accordance with NACHA rules. If a subscription becomes inactive or the billing info is no longer a bank account, this timestamp is cleared.
    *
    * @return ?string
    */
    public function getBankAccountAuthorizedAt(): ?string
    {
        return $this->_bank_account_authorized_at;
    }

    /**
    * Setter method for the bank_account_authorized_at attribute.
    *
    * @param string $bank_account_authorized_at
    *
    * @return void
    */
    public function setBankAccountAuthorizedAt(string $bank_account_authorized_at): void
    {
        $this->_bank_account_authorized_at = $bank_account_authorized_at;
    }

    /**
    * Getter method for the canceled_at attribute.
    * Canceled at
    *
    * @return ?string
    */
    public function getCanceledAt(): ?string
    {
        return $this->_canceled_at;
    }

    /**
    * Setter method for the canceled_at attribute.
    *
    * @param string $canceled_at
    *
    * @return void
    */
    public function setCanceledAt(string $canceled_at): void
    {
        $this->_canceled_at = $canceled_at;
    }

    /**
    * Getter method for the collection_method attribute.
    * Collection method
    *
    * @return ?string
    */
    public function getCollectionMethod(): ?string
    {
        return $this->_collection_method;
    }

    /**
    * Setter method for the collection_method attribute.
    *
    * @param string $collection_method
    *
    * @return void
    */
    public function setCollectionMethod(string $collection_method): void
    {
        $this->_collection_method = $collection_method;
    }

    /**
    * Getter method for the coupon_redemptions attribute.
    * Coupon redemptions
    *
    * @return array
    */
    public function getCouponRedemptions(): array
    {
        return $this->_coupon_redemptions ?? [] ;
    }

    /**
    * Setter method for the coupon_redemptions attribute.
    *
    * @param array $coupon_redemptions
    *
    * @return void
    */
    public function setCouponRedemptions(array $coupon_redemptions): void
    {
        $this->_coupon_redemptions = $coupon_redemptions;
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
    * Getter method for the current_period_ends_at attribute.
    * Current billing period ends at
    *
    * @return ?string
    */
    public function getCurrentPeriodEndsAt(): ?string
    {
        return $this->_current_period_ends_at;
    }

    /**
    * Setter method for the current_period_ends_at attribute.
    *
    * @param string $current_period_ends_at
    *
    * @return void
    */
    public function setCurrentPeriodEndsAt(string $current_period_ends_at): void
    {
        $this->_current_period_ends_at = $current_period_ends_at;
    }

    /**
    * Getter method for the current_period_started_at attribute.
    * Current billing period started at
    *
    * @return ?string
    */
    public function getCurrentPeriodStartedAt(): ?string
    {
        return $this->_current_period_started_at;
    }

    /**
    * Setter method for the current_period_started_at attribute.
    *
    * @param string $current_period_started_at
    *
    * @return void
    */
    public function setCurrentPeriodStartedAt(string $current_period_started_at): void
    {
        $this->_current_period_started_at = $current_period_started_at;
    }

    /**
    * Getter method for the current_term_ends_at attribute.
    * When the term ends. This is calculated by a plan's interval and `total_billing_cycles` in a term. Subscription changes with a `timeframe=renewal` will be applied on this date.
    *
    * @return ?string
    */
    public function getCurrentTermEndsAt(): ?string
    {
        return $this->_current_term_ends_at;
    }

    /**
    * Setter method for the current_term_ends_at attribute.
    *
    * @param string $current_term_ends_at
    *
    * @return void
    */
    public function setCurrentTermEndsAt(string $current_term_ends_at): void
    {
        $this->_current_term_ends_at = $current_term_ends_at;
    }

    /**
    * Getter method for the current_term_started_at attribute.
    * The start date of the term when the first billing period starts. The subscription term is the length of time that a customer will be committed to a subscription. A term can span multiple billing periods.
    *
    * @return ?string
    */
    public function getCurrentTermStartedAt(): ?string
    {
        return $this->_current_term_started_at;
    }

    /**
    * Setter method for the current_term_started_at attribute.
    *
    * @param string $current_term_started_at
    *
    * @return void
    */
    public function setCurrentTermStartedAt(string $current_term_started_at): void
    {
        $this->_current_term_started_at = $current_term_started_at;
    }

    /**
    * Getter method for the custom_fields attribute.
    * The custom fields will only be altered when they are included in a request. Sending an empty array will not remove any existing values. To remove a field send the name with a null or empty value.
    *
    * @return array
    */
    public function getCustomFields(): array
    {
        return $this->_custom_fields ?? [] ;
    }

    /**
    * Setter method for the custom_fields attribute.
    *
    * @param array $custom_fields
    *
    * @return void
    */
    public function setCustomFields(array $custom_fields): void
    {
        $this->_custom_fields = $custom_fields;
    }

    /**
    * Getter method for the customer_notes attribute.
    * Customer notes
    *
    * @return ?string
    */
    public function getCustomerNotes(): ?string
    {
        return $this->_customer_notes;
    }

    /**
    * Setter method for the customer_notes attribute.
    *
    * @param string $customer_notes
    *
    * @return void
    */
    public function setCustomerNotes(string $customer_notes): void
    {
        $this->_customer_notes = $customer_notes;
    }

    /**
    * Getter method for the expiration_reason attribute.
    * Expiration reason
    *
    * @return ?string
    */
    public function getExpirationReason(): ?string
    {
        return $this->_expiration_reason;
    }

    /**
    * Setter method for the expiration_reason attribute.
    *
    * @param string $expiration_reason
    *
    * @return void
    */
    public function setExpirationReason(string $expiration_reason): void
    {
        $this->_expiration_reason = $expiration_reason;
    }

    /**
    * Getter method for the expires_at attribute.
    * Expires at
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
    * Getter method for the id attribute.
    * Subscription ID
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
    * Getter method for the net_terms attribute.
    * Integer representing the number of days after an invoice's creation that the invoice will become past due. If an invoice's net terms are set to '0', it is due 'On Receipt' and will become past due 24 hours after it’s created. If an invoice is due net 30, it will become past due at 31 days exactly.
    *
    * @return ?int
    */
    public function getNetTerms(): ?int
    {
        return $this->_net_terms;
    }

    /**
    * Setter method for the net_terms attribute.
    *
    * @param int $net_terms
    *
    * @return void
    */
    public function setNetTerms(int $net_terms): void
    {
        $this->_net_terms = $net_terms;
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
    * Getter method for the paused_at attribute.
    * Null unless subscription is paused or will pause at the end of the current billing period.
    *
    * @return ?string
    */
    public function getPausedAt(): ?string
    {
        return $this->_paused_at;
    }

    /**
    * Setter method for the paused_at attribute.
    *
    * @param string $paused_at
    *
    * @return void
    */
    public function setPausedAt(string $paused_at): void
    {
        $this->_paused_at = $paused_at;
    }

    /**
    * Getter method for the pending_change attribute.
    * Subscription Change
    *
    * @return ?\Recurly\Resources\SubscriptionChange
    */
    public function getPendingChange(): ?\Recurly\Resources\SubscriptionChange
    {
        return $this->_pending_change;
    }

    /**
    * Setter method for the pending_change attribute.
    *
    * @param \Recurly\Resources\SubscriptionChange $pending_change
    *
    * @return void
    */
    public function setPendingChange(\Recurly\Resources\SubscriptionChange $pending_change): void
    {
        $this->_pending_change = $pending_change;
    }

    /**
    * Getter method for the plan attribute.
    * Just the important parts.
    *
    * @return ?\Recurly\Resources\PlanMini
    */
    public function getPlan(): ?\Recurly\Resources\PlanMini
    {
        return $this->_plan;
    }

    /**
    * Setter method for the plan attribute.
    *
    * @param \Recurly\Resources\PlanMini $plan
    *
    * @return void
    */
    public function setPlan(\Recurly\Resources\PlanMini $plan): void
    {
        $this->_plan = $plan;
    }

    /**
    * Getter method for the po_number attribute.
    * For manual invoicing, this identifies the PO number associated with the subscription.
    *
    * @return ?string
    */
    public function getPoNumber(): ?string
    {
        return $this->_po_number;
    }

    /**
    * Setter method for the po_number attribute.
    *
    * @param string $po_number
    *
    * @return void
    */
    public function setPoNumber(string $po_number): void
    {
        $this->_po_number = $po_number;
    }

    /**
    * Getter method for the quantity attribute.
    * Subscription quantity
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
    * Getter method for the remaining_billing_cycles attribute.
    * The remaining billing cycles in the current term.
    *
    * @return ?int
    */
    public function getRemainingBillingCycles(): ?int
    {
        return $this->_remaining_billing_cycles;
    }

    /**
    * Setter method for the remaining_billing_cycles attribute.
    *
    * @param int $remaining_billing_cycles
    *
    * @return void
    */
    public function setRemainingBillingCycles(int $remaining_billing_cycles): void
    {
        $this->_remaining_billing_cycles = $remaining_billing_cycles;
    }

    /**
    * Getter method for the remaining_pause_cycles attribute.
    * Null unless subscription is paused or will pause at the end of the current billing period.
    *
    * @return ?int
    */
    public function getRemainingPauseCycles(): ?int
    {
        return $this->_remaining_pause_cycles;
    }

    /**
    * Setter method for the remaining_pause_cycles attribute.
    *
    * @param int $remaining_pause_cycles
    *
    * @return void
    */
    public function setRemainingPauseCycles(int $remaining_pause_cycles): void
    {
        $this->_remaining_pause_cycles = $remaining_pause_cycles;
    }

    /**
    * Getter method for the renewal_billing_cycles attribute.
    * If `auto_renew=true`, when a term completes, `total_billing_cycles` takes this value as the length of subsequent terms. Defaults to the plan's `total_billing_cycles`.
    *
    * @return ?int
    */
    public function getRenewalBillingCycles(): ?int
    {
        return $this->_renewal_billing_cycles;
    }

    /**
    * Setter method for the renewal_billing_cycles attribute.
    *
    * @param int $renewal_billing_cycles
    *
    * @return void
    */
    public function setRenewalBillingCycles(int $renewal_billing_cycles): void
    {
        $this->_renewal_billing_cycles = $renewal_billing_cycles;
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
    * Getter method for the shipping attribute.
    * Subscription shipping details
    *
    * @return ?\Recurly\Resources\SubscriptionShipping
    */
    public function getShipping(): ?\Recurly\Resources\SubscriptionShipping
    {
        return $this->_shipping;
    }

    /**
    * Setter method for the shipping attribute.
    *
    * @param \Recurly\Resources\SubscriptionShipping $shipping
    *
    * @return void
    */
    public function setShipping(\Recurly\Resources\SubscriptionShipping $shipping): void
    {
        $this->_shipping = $shipping;
    }

    /**
    * Getter method for the state attribute.
    * State
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
    * Getter method for the subtotal attribute.
    * Estimated total, before tax.
    *
    * @return ?float
    */
    public function getSubtotal(): ?float
    {
        return $this->_subtotal;
    }

    /**
    * Setter method for the subtotal attribute.
    *
    * @param float $subtotal
    *
    * @return void
    */
    public function setSubtotal(float $subtotal): void
    {
        $this->_subtotal = $subtotal;
    }

    /**
    * Getter method for the terms_and_conditions attribute.
    * Terms and conditions
    *
    * @return ?string
    */
    public function getTermsAndConditions(): ?string
    {
        return $this->_terms_and_conditions;
    }

    /**
    * Setter method for the terms_and_conditions attribute.
    *
    * @param string $terms_and_conditions
    *
    * @return void
    */
    public function setTermsAndConditions(string $terms_and_conditions): void
    {
        $this->_terms_and_conditions = $terms_and_conditions;
    }

    /**
    * Getter method for the total_billing_cycles attribute.
    * The number of cycles/billing periods in a term. When `remaining_billing_cycles=0`, if `auto_renew=true` the subscription will renew and a new term will begin, otherwise the subscription will expire.
    *
    * @return ?int
    */
    public function getTotalBillingCycles(): ?int
    {
        return $this->_total_billing_cycles;
    }

    /**
    * Setter method for the total_billing_cycles attribute.
    *
    * @param int $total_billing_cycles
    *
    * @return void
    */
    public function setTotalBillingCycles(int $total_billing_cycles): void
    {
        $this->_total_billing_cycles = $total_billing_cycles;
    }

    /**
    * Getter method for the trial_ends_at attribute.
    * Trial period ends at
    *
    * @return ?string
    */
    public function getTrialEndsAt(): ?string
    {
        return $this->_trial_ends_at;
    }

    /**
    * Setter method for the trial_ends_at attribute.
    *
    * @param string $trial_ends_at
    *
    * @return void
    */
    public function setTrialEndsAt(string $trial_ends_at): void
    {
        $this->_trial_ends_at = $trial_ends_at;
    }

    /**
    * Getter method for the trial_started_at attribute.
    * Trial period started at
    *
    * @return ?string
    */
    public function getTrialStartedAt(): ?string
    {
        return $this->_trial_started_at;
    }

    /**
    * Setter method for the trial_started_at attribute.
    *
    * @param string $trial_started_at
    *
    * @return void
    */
    public function setTrialStartedAt(string $trial_started_at): void
    {
        $this->_trial_started_at = $trial_started_at;
    }

    /**
    * Getter method for the unit_amount attribute.
    * Subscription unit price
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

    /**
    * Getter method for the uuid attribute.
    * The UUID is useful for matching data with the CSV exports and building URLs into Recurly's UI.
    *
    * @return ?string
    */
    public function getUuid(): ?string
    {
        return $this->_uuid;
    }

    /**
    * Setter method for the uuid attribute.
    *
    * @param string $uuid
    *
    * @return void
    */
    public function setUuid(string $uuid): void
    {
        $this->_uuid = $uuid;
    }
}