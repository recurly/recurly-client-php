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
class SubscriptionChange extends RecurlyResource
{
    private $_activate_at;
    private $_activated;
    private $_add_ons;
    private $_billing_info;
    private $_created_at;
    private $_custom_fields;
    private $_deleted_at;
    private $_id;
    private $_invoice_collection;
    private $_object;
    private $_plan;
    private $_quantity;
    private $_ramp_intervals;
    private $_revenue_schedule_type;
    private $_shipping;
    private $_subscription_id;
    private $_unit_amount;
    private $_updated_at;

    protected static $array_hints = [
        'setAddOns' => '\Recurly\Resources\SubscriptionAddOn',
        'setCustomFields' => '\Recurly\Resources\CustomField',
        'setRampIntervals' => '\Recurly\Resources\SubscriptionRampIntervalResponse',
    ];

    
    /**
    * Getter method for the activate_at attribute.
    * Activated at
    *
    * @return ?string
    */
    public function getActivateAt(): ?string
    {
        return $this->_activate_at;
    }

    /**
    * Setter method for the activate_at attribute.
    *
    * @param string $activate_at
    *
    * @return void
    */
    public function setActivateAt(string $activate_at): void
    {
        $this->_activate_at = $activate_at;
    }

    /**
    * Getter method for the activated attribute.
    * Returns `true` if the subscription change is activated.
    *
    * @return ?bool
    */
    public function getActivated(): ?bool
    {
        return $this->_activated;
    }

    /**
    * Setter method for the activated attribute.
    *
    * @param bool $activated
    *
    * @return void
    */
    public function setActivated(bool $activated): void
    {
        $this->_activated = $activated;
    }

    /**
    * Getter method for the add_ons attribute.
    * These add-ons will be used when the subscription renews.
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
    * Getter method for the billing_info attribute.
    * Accept nested attributes for three_d_secure_action_result_token_id
    *
    * @return ?\Recurly\Resources\SubscriptionChangeBillingInfo
    */
    public function getBillingInfo(): ?\Recurly\Resources\SubscriptionChangeBillingInfo
    {
        return $this->_billing_info;
    }

    /**
    * Setter method for the billing_info attribute.
    *
    * @param \Recurly\Resources\SubscriptionChangeBillingInfo $billing_info
    *
    * @return void
    */
    public function setBillingInfo(\Recurly\Resources\SubscriptionChangeBillingInfo $billing_info): void
    {
        $this->_billing_info = $billing_info;
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
    * Getter method for the id attribute.
    * The ID of the Subscription Change.
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
    * Getter method for the invoice_collection attribute.
    * Invoice Collection
    *
    * @return ?\Recurly\Resources\InvoiceCollection
    */
    public function getInvoiceCollection(): ?\Recurly\Resources\InvoiceCollection
    {
        return $this->_invoice_collection;
    }

    /**
    * Setter method for the invoice_collection attribute.
    *
    * @param \Recurly\Resources\InvoiceCollection $invoice_collection
    *
    * @return void
    */
    public function setInvoiceCollection(\Recurly\Resources\InvoiceCollection $invoice_collection): void
    {
        $this->_invoice_collection = $invoice_collection;
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
    * Getter method for the ramp_intervals attribute.
    * Ramp Intervals
    *
    * @return array
    */
    public function getRampIntervals(): array
    {
        return $this->_ramp_intervals ?? [] ;
    }

    /**
    * Setter method for the ramp_intervals attribute.
    *
    * @param array $ramp_intervals
    *
    * @return void
    */
    public function setRampIntervals(array $ramp_intervals): void
    {
        $this->_ramp_intervals = $ramp_intervals;
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
    * Getter method for the subscription_id attribute.
    * The ID of the subscription that is going to be changed.
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
    * Getter method for the unit_amount attribute.
    * Unit amount
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
}