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
class Item extends RecurlyResource
{
        private $_accounting_code;
        private $_code;
        private $_created_at;
        private $_currencies;
        private $_custom_fields;
        private $_deleted_at;
        private $_description;
        private $_external_sku;
        private $_id;
        private $_name;
        private $_object;
        private $_revenue_schedule_type;
        private $_state;
        private $_tax_code;
        private $_tax_exempt;
        private $_updated_at;
    
    
    /**
    * Getter method for the accounting_code attribute.
    *
    * @return string Accounting code for invoice line items.
    */
    public function getAccountingCode(): string
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
    public function setAccountingCode(string $value): void
    {
        $this->_accounting_code = $value;
    }

    /**
    * Getter method for the code attribute.
    *
    * @return string Unique code to identify the item.
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
    * Getter method for the currencies attribute.
    *
    * @return array Item Pricing
    */
    public function getCurrencies(): array
    {
        return $this->_currencies;
    }

    /**
    * Setter method for the currencies attribute.
    *
    * @param array $currencies
    *
    * @return void
    */
    public function setCurrencies(array $value): void
    {
        $this->_currencies = $value;
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
    * Getter method for the deleted_at attribute.
    *
    * @return string Deleted at
    */
    public function getDeletedAt(): string
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
    public function setDeletedAt(string $value): void
    {
        $this->_deleted_at = $value;
    }

    /**
    * Getter method for the description attribute.
    *
    * @return string Optional, description.
    */
    public function getDescription(): string
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
    public function setDescription(string $value): void
    {
        $this->_description = $value;
    }

    /**
    * Getter method for the external_sku attribute.
    *
    * @return string Optional, stock keeping unit to link the item to other inventory systems.
    */
    public function getExternalSku(): string
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
    public function setExternalSku(string $value): void
    {
        $this->_external_sku = $value;
    }

    /**
    * Getter method for the id attribute.
    *
    * @return string Item ID
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
    * Getter method for the name attribute.
    *
    * @return string This name describes your item and will appear on the invoice when it's purchased on a one time basis.
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
    * Getter method for the revenue_schedule_type attribute.
    *
    * @return string Revenue schedule type
    */
    public function getRevenueScheduleType(): string
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
    public function setRevenueScheduleType(string $value): void
    {
        $this->_revenue_schedule_type = $value;
    }

    /**
    * Getter method for the state attribute.
    *
    * @return string The current state of the item.
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
    * Getter method for the tax_code attribute.
    *
    * @return string Used by Avalara, Vertex, and Recurly’s EU VAT tax feature. The tax code values are specific to each tax system. If you are using Recurly’s EU VAT feature you can use `unknown`, `physical`, or `digital`.
    */
    public function getTaxCode(): string
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
    public function setTaxCode(string $value): void
    {
        $this->_tax_code = $value;
    }

    /**
    * Getter method for the tax_exempt attribute.
    *
    * @return bool `true` exempts tax on the item, `false` applies tax on the item.
    */
    public function getTaxExempt(): bool
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
    public function setTaxExempt(bool $value): void
    {
        $this->_tax_exempt = $value;
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
     * The hintArrayType method will provide type hinting for setter methods that
     * have array parameters.
     * 
     * @param string $key The property to get teh type hint for.
     * 
     * @return string The class name of the expected array type.
     */
    public static function hintArrayType($key): string
    {
        $array_hints = array(
            'setCurrencies' => '\Recurly\Resources\Pricing',
            'setCustomFields' => '\Recurly\Resources\CustomField',
        );
        return $array_hints[$key];
    }

}