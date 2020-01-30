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
class CustomFieldDefinition extends RecurlyResource
{
        private $_created_at;
        private $_deleted_at;
        private $_display_name;
        private $_id;
        private $_name;
        private $_object;
        private $_related_type;
        private $_tooltip;
        private $_updated_at;
        private $_user_access;
    
    
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
    * Getter method for the deleted_at attribute.
    *
    * @return string Definitions are initially soft deleted, and once all the values are removed from the accouts or subscriptions, will be hard deleted an no longer visible.
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
    * Getter method for the display_name attribute.
    *
    * @return string Used to label the field when viewing and editing the field in Recurly's admin UI.
    */
    public function getDisplayName(): string
    {
        return $this->_display_name;
    }

    /**
    * Setter method for the display_name attribute.
    *
    * @param string $display_name
    *
    * @return void
    */
    public function setDisplayName(string $value): void
    {
        $this->_display_name = $value;
    }

    /**
    * Getter method for the id attribute.
    *
    * @return string Custom field definition ID
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
    * @return string Used by the API to identify the field or reading and writing. The name can only be used once per Recurly object type.
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
    * Getter method for the related_type attribute.
    *
    * @return string Related Recurly object type
    */
    public function getRelatedType(): string
    {
        return $this->_related_type;
    }

    /**
    * Setter method for the related_type attribute.
    *
    * @param string $related_type
    *
    * @return void
    */
    public function setRelatedType(string $value): void
    {
        $this->_related_type = $value;
    }

    /**
    * Getter method for the tooltip attribute.
    *
    * @return string Displayed as a tooltip when editing the field in the Recurly admin UI.
    */
    public function getTooltip(): string
    {
        return $this->_tooltip;
    }

    /**
    * Setter method for the tooltip attribute.
    *
    * @param string $tooltip
    *
    * @return void
    */
    public function setTooltip(string $value): void
    {
        $this->_tooltip = $value;
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
    * Getter method for the user_access attribute.
    *
    * @return string The access control applied inside Recurly's admin UI:
- `api_only` - No one will be able to view or edit this field's data via the admin UI.
- `read_only` - Users with the Customers role will be able to view this field's data via the admin UI, but
  editing will only be available via the API.
- `write` - Users with the Customers role will be able to view and edit this field's data via the admin UI.

    */
    public function getUserAccess(): string
    {
        return $this->_user_access;
    }

    /**
    * Setter method for the user_access attribute.
    *
    * @param string $user_access
    *
    * @return void
    */
    public function setUserAccess(string $value): void
    {
        $this->_user_access = $value;
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
        );
        return $array_hints[$key];
    }

}