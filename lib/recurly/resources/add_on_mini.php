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
class AddOnMini extends RecurlyResource
{
    private $_accounting_code;
    private $_add_on_type;
    private $_code;
    private $_external_sku;
    private $_id;
    private $_item_id;
    private $_measured_unit_id;
    private $_name;
    private $_object;
    private $_usage_percentage;
    private $_usage_type;

    protected static $array_hints = [
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
    * Getter method for the item_id attribute.
    * Item ID
    *
    * @return ?string
    */
    public function getItemId(): ?string
    {
        return $this->_item_id;
    }

    /**
    * Setter method for the item_id attribute.
    *
    * @param string $item_id
    *
    * @return void
    */
    public function setItemId(string $item_id): void
    {
        $this->_item_id = $item_id;
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
