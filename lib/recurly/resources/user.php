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
class User extends RecurlyResource
{
    private $_created_at;
    private $_deleted_at;
    private $_email;
    private $_first_name;
    private $_id;
    private $_last_name;
    private $_object;
    private $_time_zone;

    protected static $array_hints = array(
    );

    
    /**
    * Getter method for the created_at attribute.
    * 
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
    * Getter method for the deleted_at attribute.
    * 
    *
    * @return ?string
    */
    public function getDeletedAt(): ?string
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
    * Getter method for the email attribute.
    * 
    *
    * @return ?string
    */
    public function getEmail(): ?string
    {
        return $this->_email;
    }

    /**
    * Setter method for the email attribute.
    *
    * @param string $email
    *
    * @return void
    */
    public function setEmail(string $email): void
    {
        $this->_email = $email;
    }

    /**
    * Getter method for the first_name attribute.
    * 
    *
    * @return ?string
    */
    public function getFirstName(): ?string
    {
        return $this->_first_name;
    }

    /**
    * Setter method for the first_name attribute.
    *
    * @param string $first_name
    *
    * @return void
    */
    public function setFirstName(string $first_name): void
    {
        $this->_first_name = $first_name;
    }

    /**
    * Getter method for the id attribute.
    * 
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
    * Getter method for the last_name attribute.
    * 
    *
    * @return ?string
    */
    public function getLastName(): ?string
    {
        return $this->_last_name;
    }

    /**
    * Setter method for the last_name attribute.
    *
    * @param string $last_name
    *
    * @return void
    */
    public function setLastName(string $last_name): void
    {
        $this->_last_name = $last_name;
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
    * Getter method for the time_zone attribute.
    * 
    *
    * @return ?string
    */
    public function getTimeZone(): ?string
    {
        return $this->_time_zone;
    }

    /**
    * Setter method for the time_zone attribute.
    *
    * @param string $time_zone
    *
    * @return void
    */
    public function setTimeZone(string $time_zone): void
    {
        $this->_time_zone = $time_zone;
    }
}