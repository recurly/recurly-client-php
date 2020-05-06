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

    protected static $array_hints = array(
    );

    
    /**
    * Getter method for the account attribute.
    * Account mini details
    *
    * @return ?\Recurly\Resources\AccountMini
    */
    public function getAccount(): ?\Recurly\Resources\AccountMini
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
    public function setAccount(\Recurly\Resources\AccountMini $account): void
    {
        $this->_account = $account;
    }

    /**
    * Getter method for the campaign attribute.
    * An arbitrary identifier for the marketing campaign that led to the acquisition of this account.
    *
    * @return ?string
    */
    public function getCampaign(): ?string
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
    public function setCampaign(string $campaign): void
    {
        $this->_campaign = $campaign;
    }

    /**
    * Getter method for the channel attribute.
    * The channel through which the account was acquired.
    *
    * @return ?string
    */
    public function getChannel(): ?string
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
    public function setChannel(string $channel): void
    {
        $this->_channel = $channel;
    }

    /**
    * Getter method for the cost attribute.
    * Account balance
    *
    * @return ?\Recurly\Resources\AccountAcquisitionCost
    */
    public function getCost(): ?\Recurly\Resources\AccountAcquisitionCost
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
    public function setCost(\Recurly\Resources\AccountAcquisitionCost $cost): void
    {
        $this->_cost = $cost;
    }

    /**
    * Getter method for the created_at attribute.
    * When the account acquisition data was created.
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
    * Getter method for the subchannel attribute.
    * An arbitrary subchannel string representing a distinction/subcategory within a broader channel.
    *
    * @return ?string
    */
    public function getSubchannel(): ?string
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
    public function setSubchannel(string $subchannel): void
    {
        $this->_subchannel = $subchannel;
    }

    /**
    * Getter method for the updated_at attribute.
    * When the account acquisition data was last changed.
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