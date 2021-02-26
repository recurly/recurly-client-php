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
class AddOn extends RecurlyResource
{
    private $_accounting_code;
    private $_add_on_type;
    private $_avalara_service_type;
    private $_avalara_transaction_type;
    private $_code;
    private $_created_at;
    private $_currencies;
    private $_default_quantity;
    private $_deleted_at;
    private $_display_quantity;
    private $_external_sku;
    private $_id;
    private $_item;
    private $_measured_unit_id;
    private $_name;
    private $_object;
    private $_optional;
    private $_plan_id;
    private $_revenue_schedule_type;
    private $_state;
    private $_tax_code;
    private $_tier_type;
    private $_tiers;
    private $_updated_at;
    private $_usage_percentage;
    private $_usage_type;

    protected static $array_hints = [
        'setCurrencies' => '\Recurly\Resources\AddOnPricing',
        'setTiers' => '\Recurly\Resources\Tier',
    ];

    
    /**
    * Getter method for the accounting_code attribute.
    * Accounting code for invoice line items for this add-on. If no value is provided, it defaults to add-on's code.
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
    * Getter method for the add_on_type attribute.
    * Whether the add-on type is fixed, or usage-based.
    *
    * @return ?string
    */
    public function getAddOnType(): ?string
    {
        return $this->_add_on_type;
    }

    /**
    * Setter method for the add_on_type attribute.
    *
    * @param string $add_on_type
    *
    * @return void
    */
    public function setAddOnType(string $add_on_type): void
    {
        $this->_add_on_type = $add_on_type;
    }

    /**
    * Getter method for the avalara_service_type attribute.
    * Used by Avalara for Communications taxes. The transaction type in combination with the service type describe how the add-on is taxed. Refer to [the documentation](https://help.avalara.com/AvaTax_for_Communications/Tax_Calculation/AvaTax_for_Communications_Tax_Engine/Mapping_Resources/TM_00115_AFC_Modules_Corresponding_Transaction_Types) for more available t/s types.
    *
    * @return ?int
    */
    public function getAvalaraServiceType(): ?int
    {
        return $this->_avalara_service_type;
    }

    /**
    * Setter method for the avalara_service_type attribute.
    *
    * @param int $avalara_service_type
    *
    * @return void
    */
    public function setAvalaraServiceType(int $avalara_service_type): void
    {
        $this->_avalara_service_type = $avalara_service_type;
    }

    /**
    * Getter method for the avalara_transaction_type attribute.
    * Used by Avalara for Communications taxes. The transaction type in combination with the service type describe how the add-on is taxed. Refer to [the documentation](https://help.avalara.com/AvaTax_for_Communications/Tax_Calculation/AvaTax_for_Communications_Tax_Engine/Mapping_Resources/TM_00115_AFC_Modules_Corresponding_Transaction_Types) for more available t/s types.
    *
    * @return ?int
    */
    public function getAvalaraTransactionType(): ?int
    {
        return $this->_avalara_transaction_type;
    }

    /**
    * Setter method for the avalara_transaction_type attribute.
    *
    * @param int $avalara_transaction_type
    *
    * @return void
    */
    public function setAvalaraTransactionType(int $avalara_transaction_type): void
    {
        $this->_avalara_transaction_type = $avalara_transaction_type;
    }

    /**
    * Getter method for the code attribute.
    * The unique identifier for the add-on within its plan.
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
    * Add-on pricing
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
    * Getter method for the default_quantity attribute.
    * Default quantity for the hosted pages.
    *
    * @return ?int
    */
    public function getDefaultQuantity(): ?int
    {
        return $this->_default_quantity;
    }

    /**
    * Setter method for the default_quantity attribute.
    *
    * @param int $default_quantity
    *
    * @return void
    */
    public function setDefaultQuantity(int $default_quantity): void
    {
        $this->_default_quantity = $default_quantity;
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
    * Getter method for the display_quantity attribute.
    * Determines if the quantity field is displayed on the hosted pages for the add-on.
    *
    * @return ?bool
    */
    public function getDisplayQuantity(): ?bool
    {
        return $this->_display_quantity;
    }

    /**
    * Setter method for the display_quantity attribute.
    *
    * @param bool $display_quantity
    *
    * @return void
    */
    public function setDisplayQuantity(bool $display_quantity): void
    {
        $this->_display_quantity = $display_quantity;
    }

    /**
    * Getter method for the external_sku attribute.
    * Optional, stock keeping unit to link the item to other inventory systems.
    *
    * @return ?string
    */
    public function getExternalSku(): ?string
    {
        return $this->_external_sku;
    }

    /**
    * Setter method for the external_sku attribute.
    *
    * @param string $external_sku
    *
    * @return void
    */
    public function setExternalSku(string $external_sku): void
    {
        $this->_external_sku = $external_sku;
    }

    /**
    * Getter method for the id attribute.
    * Add-on ID
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
    * Getter method for the item attribute.
    * Just the important parts.
    *
    * @return ?\Recurly\Resources\ItemMini
    */
    public function getItem(): ?\Recurly\Resources\ItemMini
    {
        return $this->_item;
    }

    /**
    * Setter method for the item attribute.
    *
    * @param \Recurly\Resources\ItemMini $item
    *
    * @return void
    */
    public function setItem(\Recurly\Resources\ItemMini $item): void
    {
        $this->_item = $item;
    }

    /**
    * Getter method for the measured_unit_id attribute.
    * System-generated unique identifier for an measured unit associated with the add-on.
    *
    * @return ?string
    */
    public function getMeasuredUnitId(): ?string
    {
        return $this->_measured_unit_id;
    }

    /**
    * Setter method for the measured_unit_id attribute.
    *
    * @param string $measured_unit_id
    *
    * @return void
    */
    public function setMeasuredUnitId(string $measured_unit_id): void
    {
        $this->_measured_unit_id = $measured_unit_id;
    }

    /**
    * Getter method for the name attribute.
    * Describes your add-on and will appear in subscribers' invoices.
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
    * Getter method for the optional attribute.
    * Whether the add-on is optional for the customer to include in their purchase on the hosted payment page. If false, the add-on will be included when a subscription is created through the Recurly UI. However, the add-on will not be included when a subscription is created through the API.
    *
    * @return ?bool
    */
    public function getOptional(): ?bool
    {
        return $this->_optional;
    }

    /**
    * Setter method for the optional attribute.
    *
    * @param bool $optional
    *
    * @return void
    */
    public function setOptional(bool $optional): void
    {
        $this->_optional = $optional;
    }

    /**
    * Getter method for the plan_id attribute.
    * Plan ID
    *
    * @return ?string
    */
    public function getPlanId(): ?string
    {
        return $this->_plan_id;
    }

    /**
    * Setter method for the plan_id attribute.
    *
    * @param string $plan_id
    *
    * @return void
    */
    public function setPlanId(string $plan_id): void
    {
        $this->_plan_id = $plan_id;
    }

    /**
    * Getter method for the revenue_schedule_type attribute.
    * When this add-on is invoiced, the line item will use this revenue schedule. If `item_code`/`item_id` is part of the request then `revenue_schedule_type` must be absent in the request as the value will be set from the item.
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
    * Getter method for the state attribute.
    * Add-ons can be either active or inactive.
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
    * Tiers
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
    * Getter method for the usage_percentage attribute.
    * The percentage taken of the monetary amount of usage tracked. This can be up to 4 decimal places. A value between 0.0 and 100.0.
    *
    * @return ?float
    */
    public function getUsagePercentage(): ?float
    {
        is_null($this->usage_percentage) ? $this->_usage_percentage = 0 : '';
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
    * Getter method for the usage_type attribute.
    * Type of usage, returns usage type if `add_on_type` is `usage`.
    *
    * @return ?string
    */
    public function getUsageType(): ?string
    {
        return $this->_usage_type;
    }

    /**
    * Setter method for the usage_type attribute.
    *
    * @param string $usage_type
    *
    * @return void
    */
    public function setUsageType(string $usage_type): void
    {
        $this->_usage_type = $usage_type;
    }
}
