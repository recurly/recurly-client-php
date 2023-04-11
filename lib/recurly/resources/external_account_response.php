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
class ExternalAccountResponse extends RecurlyResource
{
    private $_created_at;
    private $_external_account_code;
    private $_external_connection_type;
    private $_id;
    private $_object;
    private $_updated_at;

    protected static $array_hints = [
    ];

    
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
    * Getter method for the external_account_code attribute.
    * Represents the account code for the external account.
    *
    * @return ?string
    */
    public function getExternalAccountCode(): ?string
    {
        return $this->_external_account_code;
    }

    /**
    * Setter method for the external_account_code attribute.
    *
    * @param string $external_account_code
    *
    * @return void
    */
    public function setExternalAccountCode(string $external_account_code): void
    {
        $this->_external_account_code = $external_account_code;
    }

    /**
    * Getter method for the external_connection_type attribute.
    * Represents the connection type. `AppleAppStore` or `GooglePlayStore`
    *
    * @return ?string
    */
    public function getExternalConnectionType(): ?string
    {
        return $this->_external_connection_type;
    }

    /**
    * Setter method for the external_connection_type attribute.
    *
    * @param string $external_connection_type
    *
    * @return void
    */
    public function setExternalConnectionType(string $external_connection_type): void
    {
        $this->_external_connection_type = $external_connection_type;
    }

    /**
    * Getter method for the id attribute.
    * UUID of the external_account .
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
    * 
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
    * Last updated at
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