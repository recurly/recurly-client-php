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
    *
    * @return \Recurly\Resources\AccountMini Account mini details
    */
    public function getAccount(): \Recurly\Resources\AccountMini
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
    public function setAccount(\Recurly\Resources\AccountMini $value): void
    {
        $this->_account = $value;
    }

    /**
    * Getter method for the activated_at attribute.
    *
    * @return string Activated at
    */
    public function getActivatedAt(): string
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
    public function setActivatedAt(string $value): void
    {
        $this->_activated_at = $value;
    }

    /**
    * Getter method for the add_ons attribute.
    *
    * @return array Add-ons
    */
    public function getAddOns(): array
    {
        return $this->_add_ons;
    }

    /**
    * Setter method for the add_ons attribute.
    *
    * @param array $add_ons
    *
    * @return void
    */
    public function setAddOns(array $value): void
    {
        $this->_add_ons = $value;
    }

    /**
    * Getter method for the add_ons_total attribute.
    *
    * @return float Total price of add-ons
    */
    public function getAddOnsTotal(): float
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
    public function setAddOnsTotal(float $value): void
    {
        $this->_add_ons_total = $value;
    }

    /**
    * Getter method for the auto_renew attribute.
    *
    * @return bool Whether the subscription renews at the end of its term.
    */
    public function getAutoRenew(): bool
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
    public function setAutoRenew(bool $value): void
    {
        $this->_auto_renew = $value;
    }

    /**
    * Getter method for the bank_account_authorized_at attribute.
    *
    * @return string Recurring subscriptions paid with ACH will have this attribute set. This timestamp is used for alerting customers to reauthorize in 3 years in accordance with NACHA rules. If a subscription becomes inactive or the billing info is no longer a bank account, this timestamp is cleared.
    */
    public function getBankAccountAuthorizedAt(): string
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
    public function setBankAccountAuthorizedAt(string $value): void
    {
        $this->_bank_account_authorized_at = $value;
    }

    /**
    * Getter method for the canceled_at attribute.
    *
    * @return string Canceled at
    */
    public function getCanceledAt(): string
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
    public function setCanceledAt(string $value): void
    {
        $this->_canceled_at = $value;
    }

    /**
    * Getter method for the collection_method attribute.
    *
    * @return string Collection method
    */
    public function getCollectionMethod(): string
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
    public function setCollectionMethod(string $value): void
    {
        $this->_collection_method = $value;
    }

    /**
    * Getter method for the coupon_redemptions attribute.
    *
    * @return array Coupon redemptions
    */
    public function getCouponRedemptions(): array
    {
        return $this->_coupon_redemptions;
    }

    /**
    * Setter method for the coupon_redemptions attribute.
    *
    * @param array $coupon_redemptions
    *
    * @return void
    */
    public function setCouponRedemptions(array $value): void
    {
        $this->_coupon_redemptions = $value;
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
    * Getter method for the currency attribute.
    *
    * @return string 3-letter ISO 4217 currency code.
    */
    public function getCurrency(): string
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
    public function setCurrency(string $value): void
    {
        $this->_currency = $value;
    }

    /**
    * Getter method for the current_period_ends_at attribute.
    *
    * @return string Current billing period ends at
    */
    public function getCurrentPeriodEndsAt(): string
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
    public function setCurrentPeriodEndsAt(string $value): void
    {
        $this->_current_period_ends_at = $value;
    }

    /**
    * Getter method for the current_period_started_at attribute.
    *
    * @return string Current billing period started at
    */
    public function getCurrentPeriodStartedAt(): string
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
    public function setCurrentPeriodStartedAt(string $value): void
    {
        $this->_current_period_started_at = $value;
    }

    /**
    * Getter method for the current_term_ends_at attribute.
    *
    * @return string When the term ends. This is calculated by a plan's interval and `total_billing_cycles` in a term. Subscription changes with a `timeframe=renewal` will be applied on this date.
    */
    public function getCurrentTermEndsAt(): string
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
    public function setCurrentTermEndsAt(string $value): void
    {
        $this->_current_term_ends_at = $value;
    }

    /**
    * Getter method for the current_term_started_at attribute.
    *
    * @return string The start date of the term when the first billing period starts. The subscription term is the length of time that a customer will be committed to a subscription. A term can span multiple billing periods.
    */
    public function getCurrentTermStartedAt(): string
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
    public function setCurrentTermStartedAt(string $value): void
    {
        $this->_current_term_started_at = $value;
    }

    /**
    * Getter method for the custom_fields attribute.
    *
    * @return array The custom fields will only be altered when they are included in a request. Sending an empty array will not remove any existing values. To remove a field send the name with a null or empty value.
    */
    public function getCustomFields(): array
    {
        return $this->_custom_fields;
    }

    /**
    * Setter method for the custom_fields attribute.
    *
    * @param array $custom_fields
    *
    * @return void
    */
    public function setCustomFields(array $value): void
    {
        $this->_custom_fields = $value;
    }

    /**
    * Getter method for the customer_notes attribute.
    *
    * @return string Customer notes
    */
    public function getCustomerNotes(): string
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
    public function setCustomerNotes(string $value): void
    {
        $this->_customer_notes = $value;
    }

    /**
    * Getter method for the expiration_reason attribute.
    *
    * @return string Expiration reason
    */
    public function getExpirationReason(): string
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
    public function setExpirationReason(string $value): void
    {
        $this->_expiration_reason = $value;
    }

    /**
    * Getter method for the expires_at attribute.
    *
    * @return string Expires at
    */
    public function getExpiresAt(): string
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
    public function setExpiresAt(string $value): void
    {
        $this->_expires_at = $value;
    }

    /**
    * Getter method for the id attribute.
    *
    * @return string Subscription ID
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
    * Getter method for the net_terms attribute.
    *
    * @return int Integer representing the number of days after an invoice's creation that the invoice will become past due. If an invoice's net terms are set to '0', it is due 'On Receipt' and will become past due 24 hours after it’s created. If an invoice is due net 30, it will become past due at 31 days exactly.
    */
    public function getNetTerms(): int
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
    public function setNetTerms(int $value): void
    {
        $this->_net_terms = $value;
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
    * Getter method for the paused_at attribute.
    *
    * @return string Null unless subscription is paused or will pause at the end of the current billing period.
    */
    public function getPausedAt(): string
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
    public function setPausedAt(string $value): void
    {
        $this->_paused_at = $value;
    }

    /**
    * Getter method for the pending_change attribute.
    *
    * @return \Recurly\Resources\SubscriptionChange Subscription Change
    */
    public function getPendingChange(): \Recurly\Resources\SubscriptionChange
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
    public function setPendingChange(\Recurly\Resources\SubscriptionChange $value): void
    {
        $this->_pending_change = $value;
    }

    /**
    * Getter method for the plan attribute.
    *
    * @return \Recurly\Resources\PlanMini Just the important parts.
    */
    public function getPlan(): \Recurly\Resources\PlanMini
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
    public function setPlan(\Recurly\Resources\PlanMini $value): void
    {
        $this->_plan = $value;
    }

    /**
    * Getter method for the po_number attribute.
    *
    * @return string For manual invoicing, this identifies the PO number associated with the subscription.
    */
    public function getPoNumber(): string
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
    public function setPoNumber(string $value): void
    {
        $this->_po_number = $value;
    }

    /**
    * Getter method for the quantity attribute.
    *
    * @return int Subscription quantity
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
    * Getter method for the remaining_billing_cycles attribute.
    *
    * @return int The remaining billing cycles in the current term.
    */
    public function getRemainingBillingCycles(): int
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
    public function setRemainingBillingCycles(int $value): void
    {
        $this->_remaining_billing_cycles = $value;
    }

    /**
    * Getter method for the remaining_pause_cycles attribute.
    *
    * @return int Null unless subscription is paused or will pause at the end of the current billing period.
    */
    public function getRemainingPauseCycles(): int
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
    public function setRemainingPauseCycles(int $value): void
    {
        $this->_remaining_pause_cycles = $value;
    }

    /**
    * Getter method for the renewal_billing_cycles attribute.
    *
    * @return int If `auto_renew=true`, when a term completes, `total_billing_cycles` takes this value as the length of subsequent terms. Defaults to the plan's `total_billing_cycles`.
    */
    public function getRenewalBillingCycles(): int
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
    public function setRenewalBillingCycles(int $value): void
    {
        $this->_renewal_billing_cycles = $value;
    }

    /**
    * Getter method for the shipping attribute.
    *
    * @return \Recurly\Resources\SubscriptionShipping Subscription shipping details
    */
    public function getShipping(): \Recurly\Resources\SubscriptionShipping
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
    public function setShipping(\Recurly\Resources\SubscriptionShipping $value): void
    {
        $this->_shipping = $value;
    }

    /**
    * Getter method for the state attribute.
    *
    * @return string State
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
    * Getter method for the subtotal attribute.
    *
    * @return float Estimated total, before tax.
    */
    public function getSubtotal(): float
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
    public function setSubtotal(float $value): void
    {
        $this->_subtotal = $value;
    }

    /**
    * Getter method for the terms_and_conditions attribute.
    *
    * @return string Terms and conditions
    */
    public function getTermsAndConditions(): string
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
    public function setTermsAndConditions(string $value): void
    {
        $this->_terms_and_conditions = $value;
    }

    /**
    * Getter method for the total_billing_cycles attribute.
    *
    * @return int The number of cycles/billing periods in a term. When `remaining_billing_cycles=0`, if `auto_renew=true` the subscription will renew and a new term will begin, otherwise the subscription will expire.
    */
    public function getTotalBillingCycles(): int
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
    public function setTotalBillingCycles(int $value): void
    {
        $this->_total_billing_cycles = $value;
    }

    /**
    * Getter method for the trial_ends_at attribute.
    *
    * @return string Trial period ends at
    */
    public function getTrialEndsAt(): string
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
    public function setTrialEndsAt(string $value): void
    {
        $this->_trial_ends_at = $value;
    }

    /**
    * Getter method for the trial_started_at attribute.
    *
    * @return string Trial period started at
    */
    public function getTrialStartedAt(): string
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
    public function setTrialStartedAt(string $value): void
    {
        $this->_trial_started_at = $value;
    }

    /**
    * Getter method for the unit_amount attribute.
    *
    * @return float Subscription unit price
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

    /**
    * Getter method for the uuid attribute.
    *
    * @return string The UUID is useful for matching data with the CSV exports and building URLs into Recurly's UI.
    */
    public function getUuid(): string
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
    public function setUuid(string $value): void
    {
        $this->_uuid = $value;
    }
}