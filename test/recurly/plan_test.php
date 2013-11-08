<?php

require_once(__DIR__ . '/../test_helpers.php');

class Recurly_PlanTest extends Recurly_TestCase
{
  public function testGetPlan() {
    $this->client->addResponse('GET', '/plans/silver', 'plans/show-200.xml');

    $plan = Recurly_Plan::get('silver', $this->client);

    $this->assertInstanceOf('Recurly_Plan', $plan);
    $this->assertInstanceOf('Recurly_Stub', $plan->add_ons);
    $this->assertEquals($plan->add_ons->getHref(), 'https://api.recurly.com/v2/plans/silver/add_ons');
    $this->assertEquals($plan->plan_code, 'silver');
    $this->assertEquals($plan->created_at->getTimestamp(), 1303196400);
    $this->assertEquals($plan->getHref(),'https://api.recurly.com/v2/plans/silver');
    $this->assertInstanceOf('Recurly_CurrencyList', $plan->unit_amount_in_cents);
    $this->assertEquals($plan->unit_amount_in_cents['USD']->amount_in_cents, 1000);
    $this->assertEquals($plan->unit_amount_in_cents['EUR']->amount_in_cents, 800);
    $this->assertInstanceOf('Recurly_CurrencyList', $plan->setup_fee_in_cents);
    $this->assertEquals($plan->setup_fee_in_cents['USD']->amount_in_cents, 500);
    $this->assertEquals($plan->setup_fee_in_cents['EUR']->amount_in_cents, 400);
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

    $this->assertEquals(
      "<?xml version=\"1.0\"?>\n<plan><plan_code>platinum</plan_code><name>Platinum Plan</name><unit_amount_in_cents><USD>1500</USD><EUR>1200</EUR></unit_amount_in_cents><setup_fee_in_cents><EUR>500</EUR></setup_fee_in_cents></plan>\n",
      $plan->xml()
    );
  }

  public function testUpdateXml() {
    $this->client->addResponse('GET', '/plans/silver', 'plans/show-200.xml');

    $plan = Recurly_Plan::get('silver', $this->client);
    $plan->plan_code = 'platinum';
    $plan->name = 'Platinum Plan';
    $plan->unit_amount_in_cents->addCurrency('USD', 1500);
    $plan->unit_amount_in_cents->addCurrency('EUR', 1200);
    $plan->setup_fee_in_cents->addCurrency('EUR', 500);

    $this->assertEquals(
      "<?xml version=\"1.0\"?>\n<plan><plan_code>platinum</plan_code><name>Platinum Plan</name><unit_amount_in_cents><USD>1500</USD><EUR>1200</EUR></unit_amount_in_cents><setup_fee_in_cents><USD>500</USD><EUR>500</EUR></setup_fee_in_cents></plan>\n",
      $plan->xml()
    );
  }
}
