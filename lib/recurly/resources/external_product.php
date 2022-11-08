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
class ExternalProduct extends RecurlyResource
{
    private $_created_at;
    private $_external_product_references;
    private $_id;
    private $_name;
    private $_object;
    private $_plan;
    private $_updated_at;

    protected static $array_hints = [
        'setExternalProductReferences' => '\Recurly\Resources\ExternalProductReferenceMini',
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
    * Getter method for the external_product_references attribute.
    * List of external product references of the external product.
    *
    * @return array
    */
    public function getExternalProductReferences(): array
    {
        return $this->_external_product_references ?? [] ;
    }

    /**
    * Setter method for the external_product_references attribute.
    *
    * @param array $external_product_references
    *
    * @return void
    */
    public function setExternalProductReferences(array $external_product_references): void
    {
        $this->_external_product_references = $external_product_references;
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
    * Getter method for the name attribute.
    * Name to identify the external product in Recurly.
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
    * Getter method for the plan attribute.
    * Just the important parts.
    *
    * @return ?\Recurly\Resources\PlanMini
    */
    public function getPlan(): ?\Recurly\Resources\PlanMini
    {
        return $this->_plan;
    }

    /**
    * Setter method for the plan attribute.
    *
    * @param \Recurly\Resources\PlanMini $plan
    *
    * @return void
    */
    public function setPlan(\Recurly\Resources\PlanMini $plan): void
    {
        $this->_plan = $plan;
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