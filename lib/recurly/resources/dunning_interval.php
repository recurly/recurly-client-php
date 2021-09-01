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
class DunningInterval extends RecurlyResource
{
    private $_days;
    private $_email_template;

    protected static $array_hints = [
    ];

    
    /**
    * Getter method for the days attribute.
    * Number of days before sending the next email.
    *
    * @return ?int
    */
    public function getDays(): ?int
    {
        return $this->_days;
    }

    /**
    * Setter method for the days attribute.
    *
    * @param int $days
    *
    * @return void
    */
    public function setDays(int $days): void
    {
        $this->_days = $days;
    }

    /**
    * Getter method for the email_template attribute.
    * Email template being used.
    *
    * @return ?string
    */
    public function getEmailTemplate(): ?string
    {
        return $this->_email_template;
    }

    /**
    * Setter method for the email_template attribute.
    *
    * @param string $email_template
    *
    * @return void
    */
    public function setEmailTemplate(string $email_template): void
    {
        $this->_email_template = $email_template;
    }
}