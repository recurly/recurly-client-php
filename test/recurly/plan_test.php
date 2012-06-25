<?php

class Recurly_PlanTest extends UnitTestCase
{
  public function testGetPlan()
  {
    $responseFixture = loadFixture('./fixtures/plans/show-200.xml');

    $client = new MockRecurly_Client();
    $client->returns('request', $responseFixture, array('GET', '/plans/silver'));

    $plan = Recurly_Plan::get('silver', $client);

    $this->assertIsA($plan, 'Recurly_Plan');
    $this->assertIsA($plan->add_ons, 'Recurly_Stub');
    $this->assertEqual($plan->add_ons->getHref(), 'https://api.recurly.com/v2/plans/silver/add_ons');
    $this->assertEqual($plan->plan_code, 'silver');
    $this->assertEqual($plan->created_at->getTimestamp(), 1303196400);
    $this->assertEqual($plan->getHref(),'https://api.recurly.com/v2/plans/silver');
    $this->assertIsA($plan->unit_amount_in_cents, 'Recurly_CurrencyList');
    $this->assertEqual($plan->unit_amount_in_cents['USD']->amount_in_cents, 1000);
    $this->assertEqual($plan->unit_amount_in_cents['EUR']->amount_in_cents, 800);
    $this->assertIsA($plan->setup_fee_in_cents, 'Recurly_CurrencyList');
    $this->assertEqual($plan->setup_fee_in_cents['USD']->amount_in_cents, 500);
    $this->assertEqual($plan->setup_fee_in_cents['EUR']->amount_in_cents, 400);
  }

  public function testCreateXml()
  {
    $plan = new Recurly_Plan();
    $plan->plan_code = 'platinum';
    $plan->name = 'Platinum Plan';
    $plan->unit_amount_in_cents->addCurrency('USD', 1500);
    $plan->unit_amount_in_cents->addCurrency('EUR', 1200);
    $plan->setup_fee_in_cents->addCurrency('EUR', 500);

    $xml = $plan->xml();
    $this->assertEqual($xml,
      "<?xml version=\"1.0\"?>\n<plan><plan_code>platinum</plan_code><name>Platinum Plan</name><unit_amount_in_cents><USD>1500</USD><EUR>1200</EUR></unit_amount_in_cents><setup_fee_in_cents><EUR>500</EUR></setup_fee_in_cents></plan>\n");
  }

  public function testUpdateXml()
  {
    $responseFixture = loadFixture('./fixtures/plans/show-200.xml');

    $client = new MockRecurly_Client();
    $client->returns('request', $responseFixture, array('GET', '/plans/silver'));

    $plan = Recurly_Plan::get('silver', $client);
    $plan->plan_code = 'platinum';
    $plan->name = 'Platinum Plan';
    $plan->unit_amount_in_cents->addCurrency('USD', 1500);
    $plan->unit_amount_in_cents->addCurrency('EUR', 1200);
    $plan->setup_fee_in_cents->addCurrency('EUR', 500);

    $xml = $plan->xml();
    $this->assertEqual($xml,
      "<?xml version=\"1.0\"?>\n<plan><plan_code>platinum</plan_code><name>Platinum Plan</name><unit_amount_in_cents><USD>1500</USD><EUR>1200</EUR></unit_amount_in_cents><setup_fee_in_cents><USD>500</USD><EUR>500</EUR></setup_fee_in_cents></plan>\n");
  }
}
