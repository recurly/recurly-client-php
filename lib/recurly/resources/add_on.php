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
    private $_code;
    private $_created_at;
    private $_currencies;
    private $_default_quantity;
    private $_deleted_at;
    private $_display_quantity;
    private $_id;
    private $_name;
    private $_object;
    private $_plan_id;
    private $_state;
    private $_tax_code;
    private $_updated_at;

    protected static $array_hints = array(
        'setCurrencies' => '\Recurly\Resources\AddOnPricing',
    );

    
    /**
    * Getter method for the accounting_code attribute.
    *
    * @return string Accounting code for invoice line items for this add-on. If no value is provided, it defaults to add-on's code.
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
    public function setAccountingCode(string $accounting_code): void
    {
        $this->_accounting_code = $accounting_code;
    }

    /**
    * Getter method for the code attribute.
    *
    * @return string The unique identifier for the add-on within its plan.
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
    public function setCode(string $code): void
    {
        $this->_code = $code;
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
    public function setCreatedAt(string $created_at): void
    {
        $this->_created_at = $created_at;
    }

    /**
    * Getter method for the currencies attribute.
    *
    * @return array Add-on pricing
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
    public function setCurrencies(array $currencies): void
    {
        $this->_currencies = $currencies;
    }

    /**
    * Getter method for the default_quantity attribute.
    *
    * @return int Default quantity for the hosted pages.
    */
    public function getDefaultQuantity(): int
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
    public function setDeletedAt(string $deleted_at): void
    {
        $this->_deleted_at = $deleted_at;
    }

    /**
    * Getter method for the display_quantity attribute.
    *
    * @return bool Determines if the quantity field is displayed on the hosted pages for the add-on.
    */
    public function getDisplayQuantity(): bool
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
    * Getter method for the id attribute.
    *
    * @return string Add-on ID
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
    public function setId(string $id): void
    {
        $this->_id = $id;
    }

    /**
    * Getter method for the name attribute.
    *
    * @return string Describes your add-on and will appear in subscribers' invoices.
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
    public function setName(string $name): void
    {
        $this->_name = $name;
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
    public function setObject(string $object): void
    {
        $this->_object = $object;
    }

    /**
    * Getter method for the plan_id attribute.
    *
    * @return string Plan ID
    */
    public function getPlanId(): string
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
    * Getter method for the state attribute.
    *
    * @return string Add-ons can be either active or inactive.
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
    public function setState(string $state): void
    {
        $this->_state = $state;
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
    public function setTaxCode(string $tax_code): void
    {
        $this->_tax_code = $tax_code;
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
    public function setUpdatedAt(string $updated_at): void
    {
        $this->_updated_at = $updated_at;
    }
}