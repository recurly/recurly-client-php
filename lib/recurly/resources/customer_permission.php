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
class CustomerPermission extends RecurlyResource
{
    private $_code;
    private $_description;
    private $_id;
    private $_name;
    private $_object;

    protected static $array_hints = [
    ];

    
    /**
    * Getter method for the code attribute.
    * Customer permission code.
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
    * Getter method for the description attribute.
    * Description of customer permission.
    *
    * @return ?string
    */
    public function getDescription(): ?string
    {
        return $this->_description;
    }

    /**
    * Setter method for the description attribute.
    *
    * @param string $description
    *
    * @return void
    */
    public function setDescription(string $description): void
    {
        $this->_description = $description;
    }

    /**
    * Getter method for the id attribute.
    * Customer permission ID.
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
    * Getter method for the name attribute.
    * Customer permission name.
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
    * It will always be "customer_permission".
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