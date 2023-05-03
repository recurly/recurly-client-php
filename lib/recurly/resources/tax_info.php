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
class TaxInfo extends RecurlyResource
{
    private $_rate;
    private $_region;
    private $_tax_details;
    private $_type;

    protected static $array_hints = [
        'setTaxDetails' => '\Recurly\Resources\TaxDetail',
    ];

    
    /**
    * Getter method for the rate attribute.
    * The combined tax rate. Not present when Avalara for Communications is enabled.
    *
    * @return ?float
    */
    public function getRate(): ?float
    {
        return $this->_rate;
    }

    /**
    * Setter method for the rate attribute.
    *
    * @param float $rate
    *
    * @return void
    */
    public function setRate(float $rate): void
    {
        $this->_rate = $rate;
    }

    /**
    * Getter method for the region attribute.
    * Provides the tax region applied on an invoice. For U.S. Sales Tax, this will be the 2 letter state code. For EU VAT this will be the 2 letter country code. For all country level tax types, this will display the regional tax, like VAT, GST, or PST. Not present when Avalara for Communications is enabled.
    *
    * @return ?string
    */
    public function getRegion(): ?string
    {
        return $this->_region;
    }

    /**
    * Setter method for the region attribute.
    *
    * @param string $region
    *
    * @return void
    */
    public function setRegion(string $region): void
    {
        $this->_region = $region;
    }

    /**
    * Getter method for the tax_details attribute.
    * Provides additional tax details for Communications taxes when Avalara for Communications is enabled or Canadian Sales Tax when there is tax applied at both the country and province levels. This will only be populated for the Invoice response when fetching a single invoice and not for the InvoiceList or LineItemList. Only populated for a single LineItem fetch when Avalara for Communications is enabled.
    *
    * @return array
    */
    public function getTaxDetails(): array
    {
        return $this->_tax_details ?? [] ;
    }

    /**
    * Setter method for the tax_details attribute.
    *
    * @param array $tax_details
    *
    * @return void
    */
    public function setTaxDetails(array $tax_details): void
    {
        $this->_tax_details = $tax_details;
    }

    /**
    * Getter method for the type attribute.
    * Provides the tax type as "vat" for EU VAT, "usst" for U.S. Sales Tax, or the 2 letter country code for country level tax types like Canada, Australia, New Zealand, Israel, and all non-EU European countries. Not present when Avalara for Communications is enabled.
    *
    * @return ?string
    */
    public function getType(): ?string
    {
        return $this->_type;
    }

    /**
    * Setter method for the type attribute.
    *
    * @param string $type
    *
    * @return void
    */
    public function setType(string $type): void
    {
        $this->_type = $type;
    }
}