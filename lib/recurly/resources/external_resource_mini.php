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
class ExternalResourceMini extends RecurlyResource
{
    private $_external_object_reference;
    private $_id;
    private $_object;

    protected static $array_hints = [
    ];

    
    /**
    * Getter method for the external_object_reference attribute.
    * Identifier or URL reference where the resource is canonically available in the external platform.
    *
    * @return ?string
    */
    public function getExternalObjectReference(): ?string
    {
        return $this->_external_object_reference;
    }

    /**
    * Setter method for the external_object_reference attribute.
    *
    * @param string $external_object_reference
    *
    * @return void
    */
    public function setExternalObjectReference(string $external_object_reference): void
    {
        $this->_external_object_reference = $external_object_reference;
    }

    /**
    * Getter method for the id attribute.
    * System-generated unique identifier for an external resource ID, e.g. `e28zov4fw0v2`.
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
}