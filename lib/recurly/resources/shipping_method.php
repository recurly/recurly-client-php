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
class ShippingMethod extends RecurlyResource
{
        private $_code;
        private $_created_at;
        private $_deleted_at;
        private $_id;
        private $_name;
        private $_object;
        private $_tax_code;
        private $_updated_at;
    
    
    /**
    * Getter method for the code attribute.
    *
    * @return string The internal name used identify the shipping method.
    */
    public function getCode(): string
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
    public function setCode(string $value): void
    {
        $this->_code = $value;
    }

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
    * @return string Deleted at
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
    * Getter method for the id attribute.
    *
    * @return string Shipping Method ID
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
    * @return string The name of the shipping method displayed to customers.
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
    * Getter method for the tax_code attribute.
    *
    * @return string Used by Avalara, Vertex, and Recurly’s built-in tax feature. The tax
code values are specific to each tax system. If you are using Recurly’s
built-in taxes the values are:

- `FR` – Common Carrier FOB Destination
- `FR022000` – Common Carrier FOB Origin
- `FR020400` – Non Common Carrier FOB Destination
- `FR020500` – Non Common Carrier FOB Origin
- `FR010100` – Delivery by Company Vehicle Before Passage of Title
- `FR010200` – Delivery by Company Vehicle After Passage of Title
- `NT` – Non-Taxable

    */
    public function getTaxCode(): string
    {
        return $this->_tax_code;
    }

    /**
    * Setter method for the tax_code attribute.
    *
    * @param string $tax_code
    *
    * @return void
    */
    public function setTaxCode(string $value): void
    {
        $this->_tax_code = $value;
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