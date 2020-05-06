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
class Site extends RecurlyResource
{
    private $_address;
    private $_created_at;
    private $_deleted_at;
    private $_features;
    private $_id;
    private $_mode;
    private $_object;
    private $_public_api_key;
    private $_settings;
    private $_subdomain;
    private $_updated_at;

    protected static $array_hints = array(
        'setFeatures' => 'string',
    );

    
    /**
    * Getter method for the address attribute.
    * 
    *
    * @return ?\Recurly\Resources\Address
    */
    public function getAddress(): ?\Recurly\Resources\Address
    {
        return $this->_address;
    }

    /**
    * Setter method for the address attribute.
    *
    * @param \Recurly\Resources\Address $address
    *
    * @return void
    */
    public function setAddress(\Recurly\Resources\Address $address): void
    {
        $this->_address = $address;
    }

    /**
    * Getter method for the created_at attribute.
    * Created at
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
    * Deleted at
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
    * Getter method for the features attribute.
    * A list of features enabled for the site.
    *
    * @return array
    */
    public function getFeatures(): array
    {
        return $this->_features ?? [] ;
    }

    /**
    * Setter method for the features attribute.
    *
    * @param array $features
    *
    * @return void
    */
    public function setFeatures(array $features): void
    {
        $this->_features = $features;
    }

    /**
    * Getter method for the id attribute.
    * Site ID
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
    * Getter method for the mode attribute.
    * Mode
    *
    * @return ?string
    */
    public function getMode(): ?string
    {
        return $this->_mode;
    }

    /**
    * Setter method for the mode attribute.
    *
    * @param string $mode
    *
    * @return void
    */
    public function setMode(string $mode): void
    {
        $this->_mode = $mode;
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
    * Getter method for the public_api_key attribute.
    * This value is used to configure RecurlyJS to submit tokenized billing information.
    *
    * @return ?string
    */
    public function getPublicApiKey(): ?string
    {
        return $this->_public_api_key;
    }

    /**
    * Setter method for the public_api_key attribute.
    *
    * @param string $public_api_key
    *
    * @return void
    */
    public function setPublicApiKey(string $public_api_key): void
    {
        $this->_public_api_key = $public_api_key;
    }

    /**
    * Getter method for the settings attribute.
    * 
    *
    * @return ?\Recurly\Resources\Settings
    */
    public function getSettings(): ?\Recurly\Resources\Settings
    {
        return $this->_settings;
    }

    /**
    * Setter method for the settings attribute.
    *
    * @param \Recurly\Resources\Settings $settings
    *
    * @return void
    */
    public function setSettings(\Recurly\Resources\Settings $settings): void
    {
        $this->_settings = $settings;
    }

    /**
    * Getter method for the subdomain attribute.
    * 
    *
    * @return ?string
    */
    public function getSubdomain(): ?string
    {
        return $this->_subdomain;
    }

    /**
    * Setter method for the subdomain attribute.
    *
    * @param string $subdomain
    *
    * @return void
    */
    public function setSubdomain(string $subdomain): void
    {
        $this->_subdomain = $subdomain;
    }

    /**
    * Getter method for the updated_at attribute.
    * Updated at
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