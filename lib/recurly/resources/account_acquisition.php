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
class AccountAcquisition extends RecurlyResource
{
        private $_account;
        private $_campaign;
        private $_channel;
        private $_cost;
        private $_created_at;
        private $_id;
        private $_object;
        private $_subchannel;
        private $_updated_at;
    
    
    /**
    * Getter method for the account attribute.
    *
    * @return \Recurly\Resources\AccountMini Account mini details
    */
    public function getAccount(): \Recurly\Resources\AccountMini
    {
        return $this->_account;
    }

    /**
    * Setter method for the account attribute.
    *
    * @param \Recurly\Resources\AccountMini $account
    *
    * @return void
    */
    public function setAccount(\Recurly\Resources\AccountMini $value): void
    {
        $this->_account = $value;
    }

    /**
    * Getter method for the campaign attribute.
    *
    * @return string An arbitrary identifier for the marketing campaign that led to the acquisition of this account.
    */
    public function getCampaign(): string
    {
        return $this->_campaign;
    }

    /**
    * Setter method for the campaign attribute.
    *
    * @param string $campaign
    *
    * @return void
    */
    public function setCampaign(string $value): void
    {
        $this->_campaign = $value;
    }

    /**
    * Getter method for the channel attribute.
    *
    * @return string The channel through which the account was acquired.
    */
    public function getChannel(): string
    {
        return $this->_channel;
    }

    /**
    * Setter method for the channel attribute.
    *
    * @param string $channel
    *
    * @return void
    */
    public function setChannel(string $value): void
    {
        $this->_channel = $value;
    }

    /**
    * Getter method for the cost attribute.
    *
    * @return \Recurly\Resources\AccountAcquisitionCost Account balance
    */
    public function getCost(): \Recurly\Resources\AccountAcquisitionCost
    {
        return $this->_cost;
    }

    /**
    * Setter method for the cost attribute.
    *
    * @param \Recurly\Resources\AccountAcquisitionCost $cost
    *
    * @return void
    */
    public function setCost(\Recurly\Resources\AccountAcquisitionCost $value): void
    {
        $this->_cost = $value;
    }

    /**
    * Getter method for the created_at attribute.
    *
    * @return string When the account acquisition data was created.
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
    * Getter method for the id attribute.
    *
    * @return string 
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
    * Getter method for the subchannel attribute.
    *
    * @return string An arbitrary subchannel string representing a distinction/subcategory within a broader channel.
    */
    public function getSubchannel(): string
    {
        return $this->_subchannel;
    }

    /**
    * Setter method for the subchannel attribute.
    *
    * @param string $subchannel
    *
    * @return void
    */
    public function setSubchannel(string $value): void
    {
        $this->_subchannel = $value;
    }

    /**
    * Getter method for the updated_at attribute.
    *
    * @return string When the account acquisition data was last changed.
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