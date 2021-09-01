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
class DunningCycle extends RecurlyResource
{
    private $_applies_to_manual_trial;
    private $_created_at;
    private $_expire_subscription;
    private $_fail_invoice;
    private $_first_communication_interval;
    private $_intervals;
    private $_send_immediately_on_hard_decline;
    private $_total_dunning_days;
    private $_total_recycling_days;
    private $_type;
    private $_updated_at;
    private $_version;

    protected static $array_hints = [
        'setIntervals' => '\Recurly\Resources\DunningInterval',
    ];

    
    /**
    * Getter method for the applies_to_manual_trial attribute.
    * Whether the dunning settings will be applied to manual trials. Only applies to trial cycles.
    *
    * @return ?bool
    */
    public function getAppliesToManualTrial(): ?bool
    {
        return $this->_applies_to_manual_trial;
    }

    /**
    * Setter method for the applies_to_manual_trial attribute.
    *
    * @param bool $applies_to_manual_trial
    *
    * @return void
    */
    public function setAppliesToManualTrial(bool $applies_to_manual_trial): void
    {
        $this->_applies_to_manual_trial = $applies_to_manual_trial;
    }

    /**
    * Getter method for the created_at attribute.
    * When the current settings were created in Recurly.
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
    * Getter method for the expire_subscription attribute.
    * Whether the subscription(s) should be cancelled at the end of the dunning cycle.
    *
    * @return ?bool
    */
    public function getExpireSubscription(): ?bool
    {
        return $this->_expire_subscription;
    }

    /**
    * Setter method for the expire_subscription attribute.
    *
    * @param bool $expire_subscription
    *
    * @return void
    */
    public function setExpireSubscription(bool $expire_subscription): void
    {
        $this->_expire_subscription = $expire_subscription;
    }

    /**
    * Getter method for the fail_invoice attribute.
    * Whether the invoice should be failed at the end of the dunning cycle.
    *
    * @return ?bool
    */
    public function getFailInvoice(): ?bool
    {
        return $this->_fail_invoice;
    }

    /**
    * Setter method for the fail_invoice attribute.
    *
    * @param bool $fail_invoice
    *
    * @return void
    */
    public function setFailInvoice(bool $fail_invoice): void
    {
        $this->_fail_invoice = $fail_invoice;
    }

    /**
    * Getter method for the first_communication_interval attribute.
    * The number of days after a transaction failure before the first dunning email is sent.
    *
    * @return ?int
    */
    public function getFirstCommunicationInterval(): ?int
    {
        return $this->_first_communication_interval;
    }

    /**
    * Setter method for the first_communication_interval attribute.
    *
    * @param int $first_communication_interval
    *
    * @return void
    */
    public function setFirstCommunicationInterval(int $first_communication_interval): void
    {
        $this->_first_communication_interval = $first_communication_interval;
    }

    /**
    * Getter method for the intervals attribute.
    * Dunning intervals.
    *
    * @return array
    */
    public function getIntervals(): array
    {
        return $this->_intervals ?? [] ;
    }

    /**
    * Setter method for the intervals attribute.
    *
    * @param array $intervals
    *
    * @return void
    */
    public function setIntervals(array $intervals): void
    {
        $this->_intervals = $intervals;
    }

    /**
    * Getter method for the send_immediately_on_hard_decline attribute.
    * Whether or not to send an extra email immediately to customers whose initial payment attempt fails with either a hard decline or invalid billing info.
    *
    * @return ?bool
    */
    public function getSendImmediatelyOnHardDecline(): ?bool
    {
        return $this->_send_immediately_on_hard_decline;
    }

    /**
    * Setter method for the send_immediately_on_hard_decline attribute.
    *
    * @param bool $send_immediately_on_hard_decline
    *
    * @return void
    */
    public function setSendImmediatelyOnHardDecline(bool $send_immediately_on_hard_decline): void
    {
        $this->_send_immediately_on_hard_decline = $send_immediately_on_hard_decline;
    }

    /**
    * Getter method for the total_dunning_days attribute.
    * The number of days between the first dunning email being sent and the end of the dunning cycle.
    *
    * @return ?int
    */
    public function getTotalDunningDays(): ?int
    {
        return $this->_total_dunning_days;
    }

    /**
    * Setter method for the total_dunning_days attribute.
    *
    * @param int $total_dunning_days
    *
    * @return void
    */
    public function setTotalDunningDays(int $total_dunning_days): void
    {
        $this->_total_dunning_days = $total_dunning_days;
    }

    /**
    * Getter method for the total_recycling_days attribute.
    * The number of days between a transaction failure and the end of the dunning cycle.
    *
    * @return ?int
    */
    public function getTotalRecyclingDays(): ?int
    {
        return $this->_total_recycling_days;
    }

    /**
    * Setter method for the total_recycling_days attribute.
    *
    * @param int $total_recycling_days
    *
    * @return void
    */
    public function setTotalRecyclingDays(int $total_recycling_days): void
    {
        $this->_total_recycling_days = $total_recycling_days;
    }

    /**
    * Getter method for the type attribute.
    * The type of invoice this cycle applies to.
    *
    * @return ?string
    */
    public function getType(): ?string
    {
        return $this->_type;
    }

    /**
    * Setter method for the type attribute.
    *
    * @param string $type
    *
    * @return void
    */
    public function setType(string $type): void
    {
        $this->_type = $type;
    }

    /**
    * Getter method for the updated_at attribute.
    * When the current settings were updated in Recurly.
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

    /**
    * Getter method for the version attribute.
    * Current campaign version.
    *
    * @return ?int
    */
    public function getVersion(): ?int
    {
        return $this->_version;
    }

    /**
    * Setter method for the version attribute.
    *
    * @param int $version
    *
    * @return void
    */
    public function setVersion(int $version): void
    {
        $this->_version = $version;
    }
}