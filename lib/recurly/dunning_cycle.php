<?php

/**
 * Class Recurly_DunningCycle
 * @property string $type
 * @property boolean $applies_to_manual_trial
 * @property integer $first_communication_interval
 * @property string $send_immediately_on_hard_decline
 * @property array $intervals
 * @property boolean $expire_subscription
 * @property boolean $fail_invoice
 * @property integer $total_dunning_days
 * @property integer $total_recycling_days
 * @property integer $version
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Recurly_DunningCycle extends Recurly_Resource
{
  protected function getNodeName() {
    return 'dunning_cycle';
  }

  protected function getWriteableAttributes() {
    return array();
  }
}
