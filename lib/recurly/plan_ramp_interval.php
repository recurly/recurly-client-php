<?php

/**
 * A single ramp interval specification that identifies the billing cycle
 * that should be the first to apply the prices specified in the accompanied
 * currency list.
 *
 * @property number $starting_billing_cycle
 * @property Recurly_CurrencyList $unit_amount_in_cents
 */
class Recurly_PlanRampInterval extends Recurly_RampInterval
{
  /**
   * After instantiation, a Recurly_CurrencyList instance will need to be created
   * and configured before assigning to the ramp interval object.
   *
   * @param number $startingBillingCycle       Optional. Defaults to `null`.
   * @param Recurly_CurrencyList $currencyList Optional. Defaults to `null` but a new
   *                                              Recurly_CurrencyList will be created
   */
  public function __construct($startingBillingCycle = null, $currencyList = null)
  {
    $this->starting_billing_cycle = is_null($startingBillingCycle) ? 'null' : $startingBillingCycle;
    $this->unit_amount_in_cents = ($currencyList instanceof Recurly_CurrencyList)
      ? $currencyList :
      new Recurly_CurrencyList('unit_amount_in_cents');
  }
}
