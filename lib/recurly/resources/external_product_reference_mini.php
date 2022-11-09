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
class ExternalProductReferenceMini extends RecurlyResource
{
    private $_created_at;
    private $_external_connection_type;
    private $_id;
    private $_object;
    private $_reference_code;
    private $_updated_at;

    protected static $array_hints = [
    ];

    
    /**
    * Getter method for the created_at attribute.
    * When the external product was created in Recurly.
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
    * Getter method for the external_connection_type attribute.
    * Source connection platform.
    *
    * @return ?string
    */
    public function getExternalConnectionType(): ?string
    {
        return $this->_external_connection_type;
    }

    /**
    * Setter method for the external_connection_type attribute.
    *
    * @param string $external_connection_type
    *
    * @return void
    */
    public function setExternalConnectionType(string $external_connection_type): void
    {
        $this->_external_connection_type = $external_connection_type;
    }

    /**
    * Getter method for the id attribute.
    * System-generated unique identifier for an external product ID, e.g. `e28zov4fw0v2`.
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
    * Getter method for the object attribute.
    * object
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
    * Getter method for the reference_code attribute.
    * A code which associates the external product to a corresponding object or resource in an external platform like the Apple App Store or Google Play Store.
    *
    * @return ?string
    */
    public function getReferenceCode(): ?string
    {
        return $this->_reference_code;
    }

    /**
    * Setter method for the reference_code attribute.
    *
    * @param string $reference_code
    *
    * @return void
    */
    public function setReferenceCode(string $reference_code): void
    {
        $this->_reference_code = $reference_code;
    }

    /**
    * Getter method for the updated_at attribute.
    * When the external product was updated in Recurly.
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