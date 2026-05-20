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
class CustomField extends RecurlyResource
{
    private $_name;
    private $_source_record_id;
    private $_source_record_type;
    private $_value;

    protected static $array_hints = [
    ];

    
    /**
    * Getter method for the name attribute.
    * Fields must be created in the UI before values can be assigned to them.
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
    * Getter method for the source_record_id attribute.
    * The UUID of the record this custom field was automatically copied from. Only present when the field was copied from another record.
    *
    * @return ?string
    */
    public function getSourceRecordId(): ?string
    {
        return $this->_source_record_id;
    }

    /**
    * Setter method for the source_record_id attribute.
    *
    * @param string $source_record_id
    *
    * @return void
    */
    public function setSourceRecordId(string $source_record_id): void
    {
        $this->_source_record_id = $source_record_id;
    }

    /**
    * Getter method for the source_record_type attribute.
    * The type of record this custom field was automatically copied from. Only present when the field was copied from another record.
    *
    * @return ?string
    */
    public function getSourceRecordType(): ?string
    {
        return $this->_source_record_type;
    }

    /**
    * Setter method for the source_record_type attribute.
    *
    * @param string $source_record_type
    *
    * @return void
    */
    public function setSourceRecordType(string $source_record_type): void
    {
        $this->_source_record_type = $source_record_type;
    }

    /**
    * Getter method for the value attribute.
    * Any values that resemble a credit card number or security code (CVV/CVC) will be rejected.
    *
    * @return ?string
    */
    public function getValue(): ?string
    {
        return $this->_value;
    }

    /**
    * Setter method for the value attribute.
    *
    * @param string $value
    *
    * @return void
    */
    public function setValue(string $value): void
    {
        $this->_value = $value;
    }
}