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
class Plan extends RecurlyResource
{
    private $_accounting_code;
    private $_allow_any_item_on_subscriptions;
    private $_auto_renew;
    private $_code;
    private $_created_at;
    private $_currencies;
    private $_deleted_at;
    private $_description;
    private $_hosted_pages;
    private $_id;
    private $_interval_length;
    private $_interval_unit;
    private $_name;
    private $_object;
    private $_revenue_schedule_type;
    private $_setup_fee_accounting_code;
    private $_setup_fee_revenue_schedule_type;
    private $_state;
    private $_tax_code;
    private $_tax_exempt;
    private $_total_billing_cycles;
    private $_trial_length;
    private $_trial_requires_billing_info;
    private $_trial_unit;
    private $_updated_at;

    protected static $array_hints = array(
        'setCurrencies' => '\Recurly\Resources\PlanPricing',
    );

    
    /**
    * Getter method for the accounting_code attribute.
    * Accounting code for invoice line items for the plan. If no value is provided, it defaults to plan's code.
    *
    * @return ?string
    */
    public function getAccountingCode(): ?string
    {
        return $this->_accounting_code;
    }

    /**
    * Setter method for the accounting_code attribute.
    *
    * @param string $accounting_code
    *
    * @return void
    */
    public function setAccountingCode(string $accounting_code): void
    {
        $this->_accounting_code = $accounting_code;
    }

    /**
    * Getter method for the allow_any_item_on_subscriptions attribute.
    * Used to determine whether items can be assigned as add-ons to individual subscriptions.
If `true`, items can be assigned as add-ons to individual subscription add-ons.
If `false`, only plan add-ons can be used.

    *
    * @return ?bool
    */
    public function getAllowAnyItemOnSubscriptions(): ?bool
    {
        return $this->_allow_any_item_on_subscriptions;
    }

    /**
    * Setter method for the allow_any_item_on_subscriptions attribute.
    *
    * @param bool $allow_any_item_on_subscriptions
    *
    * @return void
    */
    public function setAllowAnyItemOnSubscriptions(bool $allow_any_item_on_subscriptions): void
    {
        $this->_allow_any_item_on_subscriptions = $allow_any_item_on_subscriptions;
    }

    /**
    * Getter method for the auto_renew attribute.
    * Subscriptions will automatically inherit this value once they are active. If `auto_renew` is `true`, then a subscription will automatically renew its term at renewal. If `auto_renew` is `false`, then a subscription will expire at the end of its term. `auto_renew` can be overridden on the subscription record itself.
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
    * Getter method for the code attribute.
    * Unique code to identify the plan. This is used in Hosted Payment Page URLs and in the invoice exports.
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
    * Getter method for the currencies attribute.
    * Pricing
    *
    * @return array
    */
    public function getCurrencies(): array
    {
        return $this->_currencies ?? [] ;
    }

    /**
    * Setter method for the currencies attribute.
    *
    * @param array $currencies
    *
    * @return void
    */
    public function setCurrencies(array $currencies): void
    {
        $this->_currencies = $currencies;
    }

    /**
    * Getter method for the deleted_at attribute.
    * Deleted at
    *
    * @return ?string
    */
    public function getDeletedAt(): ?string
    {
        return $this->_deleted_at;
    }

    /**
    * Setter method for the deleted_at attribute.
    *
    * @param string $deleted_at
    *
    * @return void
    */
    public function setDeletedAt(string $deleted_at): void
    {
        $this->_deleted_at = $deleted_at;
    }

    /**
    * Getter method for the description attribute.
    * Optional description, not displayed.
    *
    * @return ?string
    */
    public function getDescription(): ?string
    {
        return $this->_description;
    }

    /**
    * Setter method for the description attribute.
    *
    * @param string $description
    *
    * @return void
    */
    public function setDescription(string $description): void
    {
        $this->_description = $description;
    }

    /**
    * Getter method for the hosted_pages attribute.
    * Hosted pages settings
    *
    * @return ?\Recurly\Resources\PlanHostedPages
    */
    public function getHostedPages(): ?\Recurly\Resources\PlanHostedPages
    {
        return $this->_hosted_pages;
    }

    /**
    * Setter method for the hosted_pages attribute.
    *
    * @param \Recurly\Resources\PlanHostedPages $hosted_pages
    *
    * @return void
    */
    public function setHostedPages(\Recurly\Resources\PlanHostedPages $hosted_pages): void
    {
        $this->_hosted_pages = $hosted_pages;
    }

    /**
    * Getter method for the id attribute.
    * Plan ID
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
    * Getter method for the interval_length attribute.
    * Length of the plan's billing interval in `interval_unit`.
    *
    * @return ?int
    */
    public function getIntervalLength(): ?int
    {
        return $this->_interval_length;
    }

    /**
    * Setter method for the interval_length attribute.
    *
    * @param int $interval_length
    *
    * @return void
    */
    public function setIntervalLength(int $interval_length): void
    {
        $this->_interval_length = $interval_length;
    }

    /**
    * Getter method for the interval_unit attribute.
    * Unit for the plan's billing interval.
    *
    * @return ?string
    */
    public function getIntervalUnit(): ?string
    {
        return $this->_interval_unit;
    }

    /**
    * Setter method for the interval_unit attribute.
    *
    * @param string $interval_unit
    *
    * @return void
    */
    public function setIntervalUnit(string $interval_unit): void
    {
        $this->_interval_unit = $interval_unit;
    }

    /**
    * Getter method for the name attribute.
    * This name describes your plan and will appear on the Hosted Payment Page and the subscriber's invoice.
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
    * Getter method for the setup_fee_accounting_code attribute.
    * Accounting code for invoice line items for the plan's setup fee. If no value is provided, it defaults to plan's accounting code.
    *
    * @return ?string
    */
    public function getSetupFeeAccountingCode(): ?string
    {
        return $this->_setup_fee_accounting_code;
    }

    /**
    * Setter method for the setup_fee_accounting_code attribute.
    *
    * @param string $setup_fee_accounting_code
    *
    * @return void
    */
    public function setSetupFeeAccountingCode(string $setup_fee_accounting_code): void
    {
        $this->_setup_fee_accounting_code = $setup_fee_accounting_code;
    }

    /**
    * Getter method for the setup_fee_revenue_schedule_type attribute.
    * Setup fee revenue schedule type
    *
    * @return ?string
    */
    public function getSetupFeeRevenueScheduleType(): ?string
    {
        return $this->_setup_fee_revenue_schedule_type;
    }

    /**
    * Setter method for the setup_fee_revenue_schedule_type attribute.
    *
    * @param string $setup_fee_revenue_schedule_type
    *
    * @return void
    */
    public function setSetupFeeRevenueScheduleType(string $setup_fee_revenue_schedule_type): void
    {
        $this->_setup_fee_revenue_schedule_type = $setup_fee_revenue_schedule_type;
    }

    /**
    * Getter method for the state attribute.
    * The current state of the plan.
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
    * Getter method for the tax_code attribute.
    * Used by Avalara, Vertex, and Recurly’s EU VAT tax feature. The tax code values are specific to each tax system. If you are using Recurly’s EU VAT feature you can use `unknown`, `physical`, or `digital`.
    *
    * @return ?string
    */
    public function getTaxCode(): ?string
    {
        return $this->_tax_code;
    }

    /**
    * Setter method for the tax_code attribute.
    *
    * @param string $tax_code
    *
    * @return void
    */
    public function setTaxCode(string $tax_code): void
    {
        $this->_tax_code = $tax_code;
    }

    /**
    * Getter method for the tax_exempt attribute.
    * `true` exempts tax on the plan, `false` applies tax on the plan.
    *
    * @return ?bool
    */
    public function getTaxExempt(): ?bool
    {
        return $this->_tax_exempt;
    }

    /**
    * Setter method for the tax_exempt attribute.
    *
    * @param bool $tax_exempt
    *
    * @return void
    */
    public function setTaxExempt(bool $tax_exempt): void
    {
        $this->_tax_exempt = $tax_exempt;
    }

    /**
    * Getter method for the total_billing_cycles attribute.
    * Automatically terminate subscriptions after a defined number of billing cycles. Number of billing cycles before the plan automatically stops renewing, defaults to `null` for continuous, automatic renewal.
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
    * Getter method for the trial_length attribute.
    * Length of plan's trial period in `trial_units`. `0` means `no trial`.
    *
    * @return ?int
    */
    public function getTrialLength(): ?int
    {
        return $this->_trial_length;
    }

    /**
    * Setter method for the trial_length attribute.
    *
    * @param int $trial_length
    *
    * @return void
    */
    public function setTrialLength(int $trial_length): void
    {
        $this->_trial_length = $trial_length;
    }

    /**
    * Getter method for the trial_requires_billing_info attribute.
    * Allow free trial subscriptions to be created without billing info.
    *
    * @return ?bool
    */
    public function getTrialRequiresBillingInfo(): ?bool
    {
        return $this->_trial_requires_billing_info;
    }

    /**
    * Setter method for the trial_requires_billing_info attribute.
    *
    * @param bool $trial_requires_billing_info
    *
    * @return void
    */
    public function setTrialRequiresBillingInfo(bool $trial_requires_billing_info): void
    {
        $this->_trial_requires_billing_info = $trial_requires_billing_info;
    }

    /**
    * Getter method for the trial_unit attribute.
    * Units for the plan's trial period.
    *
    * @return ?string
    */
    public function getTrialUnit(): ?string
    {
        return $this->_trial_unit;
    }

    /**
    * Setter method for the trial_unit attribute.
    *
    * @param string $trial_unit
    *
    * @return void
    */
    public function setTrialUnit(string $trial_unit): void
    {
        $this->_trial_unit = $trial_unit;
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