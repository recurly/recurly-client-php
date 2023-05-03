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
class TaxDetail extends RecurlyResource
{
    private $_billable;
    private $_level;
    private $_name;
    private $_rate;
    private $_region;
    private $_tax;
    private $_type;

    protected static $array_hints = [
    ];

    
    /**
    * Getter method for the billable attribute.
    * Whether or not the line item is taxable. Only populated for a single LineItem fetch when Avalara for Communications is enabled.
    *
    * @return ?bool
    */
    public function getBillable(): ?bool
    {
        return $this->_billable;
    }

    /**
    * Setter method for the billable attribute.
    *
    * @param bool $billable
    *
    * @return void
    */
    public function setBillable(bool $billable): void
    {
        $this->_billable = $billable;
    }

    /**
    * Getter method for the level attribute.
    * Provides the jurisdiction level for the Communications tax applied. Example values include city, state and federal. Present only when Avalara for Communications is enabled.
    *
    * @return ?string
    */
    public function getLevel(): ?string
    {
        return $this->_level;
    }

    /**
    * Setter method for the level attribute.
    *
    * @param string $level
    *
    * @return void
    */
    public function setLevel(string $level): void
    {
        $this->_level = $level;
    }

    /**
    * Getter method for the name attribute.
    * Provides the name of the Communications tax applied. Present only when Avalara for Communications is enabled.
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
    * Getter method for the rate attribute.
    * Provides the tax rate for the region.
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
    * Provides the tax region applied on an invoice. For Canadian Sales Tax, this will be either the 2 letter province code or country code. Not present when Avalara for Communications is enabled.
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
    * Getter method for the tax attribute.
    * The total tax applied for this tax type.
    *
    * @return ?float
    */
    public function getTax(): ?float
    {
        return $this->_tax;
    }

    /**
    * Setter method for the tax attribute.
    *
    * @param float $tax
    *
    * @return void
    */
    public function setTax(float $tax): void
    {
        $this->_tax = $tax;
    }

    /**
    * Getter method for the type attribute.
    * Provides the tax type for the region or type of Comminications tax when Avalara for Communications is enabled. For Canadian Sales Tax, this will be GST, HST, QST or PST.
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