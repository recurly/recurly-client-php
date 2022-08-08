<?php

/**
 * A single ramp interval specification that identifies the billing cycle
 * that should be the first to apply the price specified in the accompanied
 * `unit_amount_in_cents` using the subscription's currency. When fetching
 * these ramps, there will also be a property to identify the remaining
 * billing cycles for each ramp. The only exception is the last ramp which
 * will have no value specified for that property.
 *
 * @property number $starting_billing_cycle
 * @property number $unit_amount_in_cents
 * @property number $remaining_billing_cycles
 */
class Recurly_SubscriptionRampInterval extends Recurly_RampInterval
{
  /**
   * When creating a subscription change, new ramp intervals should
   * be created to replace the existing ones. The remaining billing
   * cycles should not be specified.
   *
   * @param number $startingBillingCycle Optional. Defaults to `null`.
   * @param number $unitAmountInCents    Optional. Defaults to `null`.
   */
  public function __construct($startingBillingCycle = null, $unitAmountInCents = null)
  {
    $this->starting_billing_cycle = is_null($startingBillingCycle) ? 'null' : $startingBillingCycle;
    $this->unit_amount_in_cents = is_null($unitAmountInCents) ? 'null' : $unitAmountInCents;
  }


  protected function getRequiredAttributes() {
    return array_merge(
      parent::getRequiredAttributes(),
      array('remaining_billing_cycles')
    );
  }
}
