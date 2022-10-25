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
class Entitlement extends RecurlyResource
{
    private $_created_at;
    private $_customer_permission;
    private $_granted_by;
    private $_object;
    private $_updated_at;

    protected static $array_hints = [
        'setGrantedBy' => '\Recurly\Resources\GrantedBy',
    ];

    
    /**
    * Getter method for the created_at attribute.
    * Time object was created.
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
    * Getter method for the customer_permission attribute.
    * 
    *
    * @return ?\Recurly\Resources\CustomerPermission
    */
    public function getCustomerPermission(): ?\Recurly\Resources\CustomerPermission
    {
        return $this->_customer_permission;
    }

    /**
    * Setter method for the customer_permission attribute.
    *
    * @param \Recurly\Resources\CustomerPermission $customer_permission
    *
    * @return void
    */
    public function setCustomerPermission(\Recurly\Resources\CustomerPermission $customer_permission): void
    {
        $this->_customer_permission = $customer_permission;
    }

    /**
    * Getter method for the granted_by attribute.
    * Subscription or item that granted the customer permission.
    *
    * @return array
    */
    public function getGrantedBy(): array
    {
        return $this->_granted_by ?? [] ;
    }

    /**
    * Setter method for the granted_by attribute.
    *
    * @param array $granted_by
    *
    * @return void
    */
    public function setGrantedBy(array $granted_by): void
    {
        $this->_granted_by = $granted_by;
    }

    /**
    * Getter method for the object attribute.
    * Entitlement
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
    * Getter method for the updated_at attribute.
    * Time the object was last updated
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