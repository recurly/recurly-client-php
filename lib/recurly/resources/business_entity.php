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
class BusinessEntity extends RecurlyResource
{
    private $_code;
    private $_created_at;
    private $_default_registration_number;
    private $_default_vat_number;
    private $_id;
    private $_invoice_display_address;
    private $_name;
    private $_object;
    private $_subscriber_location_countries;
    private $_tax_address;
    private $_updated_at;

    protected static $array_hints = [
        'setSubscriberLocationCountries' => 'string',
    ];

    
    /**
    * Getter method for the code attribute.
    * The entity code of the business entity.
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
    * Getter method for the default_registration_number attribute.
    * Registration number for the customer used on the invoice.
    *
    * @return ?string
    */
    public function getDefaultRegistrationNumber(): ?string
    {
        return $this->_default_registration_number;
    }

    /**
    * Setter method for the default_registration_number attribute.
    *
    * @param string $default_registration_number
    *
    * @return void
    */
    public function setDefaultRegistrationNumber(string $default_registration_number): void
    {
        $this->_default_registration_number = $default_registration_number;
    }

    /**
    * Getter method for the default_vat_number attribute.
    * VAT number for the customer used on the invoice.
    *
    * @return ?string
    */
    public function getDefaultVatNumber(): ?string
    {
        return $this->_default_vat_number;
    }

    /**
    * Setter method for the default_vat_number attribute.
    *
    * @param string $default_vat_number
    *
    * @return void
    */
    public function setDefaultVatNumber(string $default_vat_number): void
    {
        $this->_default_vat_number = $default_vat_number;
    }

    /**
    * Getter method for the id attribute.
    * Business entity ID
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
    * Getter method for the invoice_display_address attribute.
    * Address information for the business entity that will appear on the invoice.
    *
    * @return ?\Recurly\Resources\Address
    */
    public function getInvoiceDisplayAddress(): ?\Recurly\Resources\Address
    {
        return $this->_invoice_display_address;
    }

    /**
    * Setter method for the invoice_display_address attribute.
    *
    * @param \Recurly\Resources\Address $invoice_display_address
    *
    * @return void
    */
    public function setInvoiceDisplayAddress(\Recurly\Resources\Address $invoice_display_address): void
    {
        $this->_invoice_display_address = $invoice_display_address;
    }

    /**
    * Getter method for the name attribute.
    * This name describes your business entity and will appear on the invoice.
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
    * Getter method for the subscriber_location_countries attribute.
    * List of countries for which the business entity will be used.
    *
    * @return array
    */
    public function getSubscriberLocationCountries(): array
    {
        return $this->_subscriber_location_countries ?? [] ;
    }

    /**
    * Setter method for the subscriber_location_countries attribute.
    *
    * @param array $subscriber_location_countries
    *
    * @return void
    */
    public function setSubscriberLocationCountries(array $subscriber_location_countries): void
    {
        $this->_subscriber_location_countries = $subscriber_location_countries;
    }

    /**
    * Getter method for the tax_address attribute.
    * Address information for the business entity that will be used for calculating taxes.
    *
    * @return ?\Recurly\Resources\Address
    */
    public function getTaxAddress(): ?\Recurly\Resources\Address
    {
        return $this->_tax_address;
    }

    /**
    * Setter method for the tax_address attribute.
    *
    * @param \Recurly\Resources\Address $tax_address
    *
    * @return void
    */
    public function setTaxAddress(\Recurly\Resources\Address $tax_address): void
    {
        $this->_tax_address = $tax_address;
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