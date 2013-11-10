<?php

require_once(__DIR__ . '/../test_helpers.php');

class Recurly_PlanTest extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/plans/silver', 'plans/show-200.xml'),
    );
  }

  public function testGetPlan() {
    $plan = Recurly_Plan::get('silver', $this->client);

    $this->assertInstanceOf('Recurly_Plan', $plan);
    $this->assertInstanceOf('Recurly_Stub', $plan->add_ons);
    $this->assertEquals('https://api.recurly.com/v2/plans/silver/add_ons', $plan->add_ons->getHref());
    $this->assertEquals('silver', $plan->plan_code);
    $this->assertEquals(1303196400, $plan->created_at->getTimestamp());
    $this->assertEquals('https://api.recurly.com/v2/plans/silver', $plan->getHref());
    $this->assertEquals(15, $plan->trial_interval_length);
    $this->assertEquals('days', $plan->trial_interval_unit);
    $this->assertEquals(6, $plan->total_billing_cycles);

    $this->assertInstanceOf('Recurly_CurrencyList', $plan->unit_amount_in_cents);
    $this->assertEquals(1000, $plan->unit_amount_in_cents['USD']->amount_in_cents);
    $this->assertEquals(800, $plan->unit_amount_in_cents['EUR']->amount_in_cents);

    $this->assertInstanceOf('Recurly_CurrencyList', $plan->setup_fee_in_cents);
    $this->assertEquals(500, $plan->setup_fee_in_cents['USD']->amount_in_cents);
    $this->assertEquals(400, $plan->setup_fee_in_cents['EUR']->amount_in_cents);
  }

  public function testDeletePlan() {
    $this->client->addResponse('DELETE', '/plans/platinum', 'plans/destroy-204.xml');

    Recurly_Plan::deletePlan('platinum', $this->client);
  }

  public function testCreateXml() {
    $plan = new Recurly_Plan();
    $plan->plan_code = 'platinum';
    $plan->name = 'Platinum Plan';
    $plan->unit_amount_in_cents->addCurrency('USD', 1500);
    $plan->unit_amount_in_cents->addCurrency('EUR', 1200);
    $plan->setup_fee_in_cents->addCurrency('EUR', 500);
    $plan->total_billing_cycles = 6;

    $this->assertEquals(
      "<?xml version=\"1.0\"?>\n<plan><plan_code>platinum</plan_code><name>Platinum Plan</name><unit_amount_in_cents><USD>1500</USD><EUR>1200</EUR></unit_amount_in_cents><setup_fee_in_cents><EUR>500</EUR></setup_fee_in_cents><total_billing_cycles>6</total_billing_cycles></plan>\n",
      $plan->xml()
    );
  }

  public function testUpdateXml() {
    $plan = Recurly_Plan::get('silver', $this->client);
    $plan->plan_code = 'platinum';
    $plan->name = 'Platinum Plan';
    $plan->unit_amount_in_cents->addCurrency('USD', 1500);
    $plan->unit_amount_in_cents->addCurrency('EUR', 1200);
    $plan->setup_fee_in_cents->addCurrency('EUR', 500);
    $plan->total_billing_cycles = NULL;

    $this->assertEquals(
      "<?xml version=\"1.0\"?>\n<plan><plan_code>platinum</plan_code><name>Platinum Plan</name><unit_amount_in_cents><USD>1500</USD><EUR>1200</EUR></unit_amount_in_cents><setup_fee_in_cents><USD>500</USD><EUR>500</EUR></setup_fee_in_cents><total_billing_cycles nil=\"nil\"></total_billing_cycles></plan>\n",
      $plan->xml()
    );
  }
}
