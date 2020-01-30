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
    
    
    /**
    * Getter method for the address attribute.
    *
    * @return \Recurly\Resources\Address 
    */
    public function getAddress(): \Recurly\Resources\Address
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
    public function setAddress(\Recurly\Resources\Address $value): void
    {
        $this->_address = $value;
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
    * Getter method for the features attribute.
    *
    * @return array A list of features enabled for the site.
    */
    public function getFeatures(): array
    {
        return $this->_features;
    }

    /**
    * Setter method for the features attribute.
    *
    * @param array $features
    *
    * @return void
    */
    public function setFeatures(array $value): void
    {
        $this->_features = $value;
    }

    /**
    * Getter method for the id attribute.
    *
    * @return string Site ID
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
    * Getter method for the mode attribute.
    *
    * @return string Mode
    */
    public function getMode(): string
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
    public function setMode(string $value): void
    {
        $this->_mode = $value;
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
    * Getter method for the public_api_key attribute.
    *
    * @return string This value is used to configure RecurlyJS to submit tokenized billing information.
    */
    public function getPublicApiKey(): string
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
    public function setPublicApiKey(string $value): void
    {
        $this->_public_api_key = $value;
    }

    /**
    * Getter method for the settings attribute.
    *
    * @return \Recurly\Resources\Settings 
    */
    public function getSettings(): \Recurly\Resources\Settings
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
    public function setSettings(\Recurly\Resources\Settings $value): void
    {
        $this->_settings = $value;
    }

    /**
    * Getter method for the subdomain attribute.
    *
    * @return string 
    */
    public function getSubdomain(): string
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
    public function setSubdomain(string $value): void
    {
        $this->_subdomain = $value;
    }

    /**
    * Getter method for the updated_at attribute.
    *
    * @return string Updated at
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
            'setFeatures' => 'string',
        );
        return $array_hints[$key];
    }

}