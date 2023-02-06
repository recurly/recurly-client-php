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
class GiftCardDelivery extends RecurlyResource
{
    private $_deliver_at;
    private $_email_address;
    private $_first_name;
    private $_gifter_name;
    private $_last_name;
    private $_method;
    private $_personal_message;
    private $_recipient_address;

    protected static $array_hints = [
    ];

    
    /**
    * Getter method for the deliver_at attribute.
    * When the gift card should be delivered to the recipient. If null, the gift card will be delivered immediately. If a datetime is provided, the delivery will be in an hourly window, rounding down. For example, 6:23 pm will be in the 6:00 pm hourly batch.
    *
    * @return ?string
    */
    public function getDeliverAt(): ?string
    {
        return $this->_deliver_at;
    }

    /**
    * Setter method for the deliver_at attribute.
    *
    * @param string $deliver_at
    *
    * @return void
    */
    public function setDeliverAt(string $deliver_at): void
    {
        $this->_deliver_at = $deliver_at;
    }

    /**
    * Getter method for the email_address attribute.
    * The email address of the recipient.
    *
    * @return ?string
    */
    public function getEmailAddress(): ?string
    {
        return $this->_email_address;
    }

    /**
    * Setter method for the email_address attribute.
    *
    * @param string $email_address
    *
    * @return void
    */
    public function setEmailAddress(string $email_address): void
    {
        $this->_email_address = $email_address;
    }

    /**
    * Getter method for the first_name attribute.
    * The first name of the recipient.
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
    * Getter method for the gifter_name attribute.
    * The name of the gifter for the purpose of a message displayed to the recipient.
    *
    * @return ?string
    */
    public function getGifterName(): ?string
    {
        return $this->_gifter_name;
    }

    /**
    * Setter method for the gifter_name attribute.
    *
    * @param string $gifter_name
    *
    * @return void
    */
    public function setGifterName(string $gifter_name): void
    {
        $this->_gifter_name = $gifter_name;
    }

    /**
    * Getter method for the last_name attribute.
    * The last name of the recipient.
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
    * Getter method for the method attribute.
    * Whether the delivery method is email or postal service.
    *
    * @return ?string
    */
    public function getMethod(): ?string
    {
        return $this->_method;
    }

    /**
    * Setter method for the method attribute.
    *
    * @param string $method
    *
    * @return void
    */
    public function setMethod(string $method): void
    {
        $this->_method = $method;
    }

    /**
    * Getter method for the personal_message attribute.
    * The personal message from the gifter to the recipient.
    *
    * @return ?string
    */
    public function getPersonalMessage(): ?string
    {
        return $this->_personal_message;
    }

    /**
    * Setter method for the personal_message attribute.
    *
    * @param string $personal_message
    *
    * @return void
    */
    public function setPersonalMessage(string $personal_message): void
    {
        $this->_personal_message = $personal_message;
    }

    /**
    * Getter method for the recipient_address attribute.
    * Address information for the recipient.
    *
    * @return ?\Recurly\Resources\Address
    */
    public function getRecipientAddress(): ?\Recurly\Resources\Address
    {
        return $this->_recipient_address;
    }

    /**
    * Setter method for the recipient_address attribute.
    *
    * @param \Recurly\Resources\Address $recipient_address
    *
    * @return void
    */
    public function setRecipientAddress(\Recurly\Resources\Address $recipient_address): void
    {
        $this->_recipient_address = $recipient_address;
    }
}