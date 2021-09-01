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
class DunningCampaign extends RecurlyResource
{
    private $_code;
    private $_created_at;
    private $_default_campaign;
    private $_deleted_at;
    private $_description;
    private $_dunning_cycles;
    private $_id;
    private $_name;
    private $_object;
    private $_updated_at;

    protected static $array_hints = [
        'setDunningCycles' => '\Recurly\Resources\DunningCycle',
    ];

    
    /**
    * Getter method for the code attribute.
    * Campaign code.
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
    * Getter method for the created_at attribute.
    * When the current campaign was created in Recurly.
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
    * Getter method for the default_campaign attribute.
    * Whether or not this is the default campaign for accounts or plans without an assigned dunning campaign.
    *
    * @return ?bool
    */
    public function getDefaultCampaign(): ?bool
    {
        return $this->_default_campaign;
    }

    /**
    * Setter method for the default_campaign attribute.
    *
    * @param bool $default_campaign
    *
    * @return void
    */
    public function setDefaultCampaign(bool $default_campaign): void
    {
        $this->_default_campaign = $default_campaign;
    }

    /**
    * Getter method for the deleted_at attribute.
    * When the current campaign was deleted in Recurly.
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
    * Getter method for the description attribute.
    * Campaign description.
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
    * Getter method for the dunning_cycles attribute.
    * Dunning Cycle settings.
    *
    * @return array
    */
    public function getDunningCycles(): array
    {
        return $this->_dunning_cycles ?? [] ;
    }

    /**
    * Setter method for the dunning_cycles attribute.
    *
    * @param array $dunning_cycles
    *
    * @return void
    */
    public function setDunningCycles(array $dunning_cycles): void
    {
        $this->_dunning_cycles = $dunning_cycles;
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
    * Getter method for the name attribute.
    * Campaign name.
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
    * Getter method for the updated_at attribute.
    * When the current campaign was updated in Recurly.
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