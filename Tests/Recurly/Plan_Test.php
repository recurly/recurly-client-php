<?php


class Recurly_PlanTest extends Recurly_TestCase
{
  function defaultResponses(): array {
    return array(
      array('GET', '/plans/silver', 'plans/show-200.xml'),
      array('GET', '/plans/ramp-priced-plan', 'plans/show-ramps-200.xml'),
    );
  }

  public function testConstructor() {
    $client = new Recurly_Client;
    $plan = new Recurly_Plan(null, $client);

    $prop = new ReflectionProperty($plan, '_client');
    $prop->setAccessible(true);

    $this->assertSame($client, $prop->getValue($plan));
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
    $this->assertEquals("Setup Fee AC", $plan->setup_fee_accounting_code);
    $this->assertEquals(false, $plan->trial_requires_billing_info);

    $this->assertInstanceOf('Recurly_CurrencyList', $plan->unit_amount_in_cents);
    $this->assertEquals(1000, $plan->unit_amount_in_cents['USD']->amount_in_cents);
    $this->assertEquals(800, $plan->unit_amount_in_cents['EUR']->amount_in_cents);

    $this->assertInstanceOf('Recurly_CurrencyList', $plan->setup_fee_in_cents);
    $this->assertEquals(500, $plan->setup_fee_in_cents['USD']->amount_in_cents);
    $this->assertEquals(400, $plan->setup_fee_in_cents['EUR']->amount_in_cents);
    $this->assertTrue($plan->tax_exempt);
    $this->assertEquals('1234abcd', $plan->dunning_campaign_id);
    $this->assertEquals('fixed', $plan->pricing_model);
    $this->assertEquals('twrbsq39zvo5', $plan->liability_gl_account_id);
    $this->assertEquals('bwrks63lznoi', $plan->revenue_gl_account_id);
    $this->assertEquals('rkslzn', $plan->performance_obligation_id);
    $this->assertEquals('twrisqjjzvo5', $plan->setup_fee_liability_gl_account_id);
    $this->assertEquals('dlrk123lzabc', $plan->setup_fee_revenue_gl_account_id);
    $this->assertEquals('bks6noi', $plan->setup_fee_performance_obligation_id);
  }

  public function testGetPlanWithRamps() {
    $plan = Recurly_Plan::get('ramp-priced-plan', $this->client);

    $this->assertEquals('ramp', $plan->pricing_model);
    $this->assertEquals(null, $plan->unit_amount_in_cents);

    // ramp intervals
    $this->assertIsArray($plan->ramp_intervals);
    $this->assertEquals(sizeof($plan->ramp_intervals), 3);

    $this->assertEquals(1, $plan->ramp_intervals[0]->starting_billing_cycle);
    $this->assertEquals(3, $plan->ramp_intervals[1]->starting_billing_cycle);
    $this->assertEquals(6, $plan->ramp_intervals[2]->starting_billing_cycle);

    $this->assertEquals(500, $plan->ramp_intervals[0]->unit_amount_in_cents['USD']->amount_in_cents);
    $this->assertEquals(700, $plan->ramp_intervals[1]->unit_amount_in_cents['USD']->amount_in_cents);
    $this->assertEquals(1000, $plan->ramp_intervals[2]->unit_amount_in_cents['USD']->amount_in_cents);
  }

  public function testDeletePlan() {
    $this->client->addResponse('DELETE', '/plans/platinum', 'plans/destroy-204.xml');

    Recurly_Plan::deletePlan('platinum', $this->client);
  }

  public function testCreateXml() {
    $plan = new Recurly_Plan();
    $plan->plan_code = 'platinum';
    $plan->name = 'Platinum & Gold Plan';
    $plan->unit_amount_in_cents->addCurrency('USD', 1500);
    $plan->unit_amount_in_cents->addCurrency('EUR', 1200);
    $plan->setup_fee_in_cents->addCurrency('EUR', 500);
    $plan->trial_requires_billing_info = false;
    $plan->total_billing_cycles = 6;
    $plan->auto_renew = false;
    $plan->dunning_campaign_id = '1234abcd';

    $this->assertEquals(
      "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<plan><auto_renew>false</auto_renew><dunning_campaign_id>1234abcd</dunning_campaign_id><name>Platinum &amp; Gold Plan</name><plan_code>platinum</plan_code><pricing_model>fixed</pricing_model><setup_fee_in_cents><EUR>500</EUR></setup_fee_in_cents><total_billing_cycles>6</total_billing_cycles><trial_requires_billing_info>false</trial_requires_billing_info><unit_amount_in_cents><USD>1500</USD><EUR>1200</EUR></unit_amount_in_cents></plan>\n",
      $plan->xml()
    );
  }

  public function testCreateWithRampsXml() {
    $plan = new Recurly_Plan();
    $plan->plan_code = 'platinum-ramps';
    $plan->name = 'Platinum Ramp Plan';
    $plan->pricing_model = 'ramp';

    // switching to ramp eliminates normal base fee node
    $this->assertNull($plan->unit_amount_in_cents);
    $this->assertNotNull($plan->ramp_intervals);

    $plan->ramp_intervals = $this->mockRampIntervals();

    $this->assertXmlStringEqualsXmlString(
      "<?xml version=\"1.0\" encoding=\"utf-8\"?>
      <plan>
        <name>Platinum Ramp Plan</name>
        <plan_code>platinum-ramps</plan_code>
        <pricing_model>ramp</pricing_model>
        <ramp_intervals>
          <ramp_interval>
            <starting_billing_cycle>1</starting_billing_cycle>
            <unit_amount_in_cents>
              <USD>400</USD>
            </unit_amount_in_cents>
          </ramp_interval>
          <ramp_interval>
            <starting_billing_cycle>3</starting_billing_cycle>
            <unit_amount_in_cents>
              <USD>200</USD>
            </unit_amount_in_cents>
          </ramp_interval>
        </ramp_intervals>
      </plan>",
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
    $plan->tax_exempt = false;
    $plan->trial_requires_billing_info = false;
    $plan->tax_code = 'fake-tax-code';
    $plan->dunning_campaign_id = '1234abcd';

    $this->assertEquals(
      "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<plan><dunning_campaign_id>1234abcd</dunning_campaign_id><name>Platinum Plan</name><plan_code>platinum</plan_code><setup_fee_in_cents><USD>500</USD><EUR>500</EUR></setup_fee_in_cents><tax_code>fake-tax-code</tax_code><tax_exempt>false</tax_exempt><total_billing_cycles nil=\"nil\"></total_billing_cycles><trial_requires_billing_info>false</trial_requires_billing_info><unit_amount_in_cents><USD>1500</USD><EUR>1200</EUR></unit_amount_in_cents></plan>\n",
      $plan->xml()
    );
  }

  public function createPlanWithCustomField() {
    $plan = new Recurly_Plan();
    $plan->plan_code = 'platinum';
    $plan->name = 'Platinum & Gold Plan';
    $plan->unit_amount_in_cents->addCurrency('USD', 1500);
    $plan->unit_amount_in_cents->addCurrency('EUR', 1200);
    $plan->setup_fee_in_cents->addCurrency('EUR', 500);
    $plan->trial_requires_billing_info = false;
    $plan->total_billing_cycles = 6;
    $plan->auto_renew = false;
    $plan->dunning_campaign_id = '1234abcd';
    $plan->custom_fields[] = new Recurly_CustomField('size', 'small');

    $this->assertEquals(
      "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<plan><dunning_campaign_id>1234abcd</dunning_campaign_id><name>Platinum Plan</name><plan_code>platinum</plan_code><setup_fee_in_cents><USD>500</USD><EUR>500</EUR></setup_fee_in_cents><tax_code>fake-tax-code</tax_code><tax_exempt>false</tax_exempt><total_billing_cycles nil=\"nil\"></total_billing_cycles><trial_requires_billing_info>false</trial_requires_billing_info><unit_amount_in_cents><USD>1500</USD><EUR>1200</EUR></unit_amount_in_cents><custom_fields><custom_field><name>size</name><value>small</value></custom_field></custom_fields></plan>\n",
      $plan->xml()
    );
  }

  public function getPlanWithCustomField() {
    $plan = Recurly_Plan::get('silver', $this->client);

    $this->assertEquals(sizeof($plan->custom_fields), 1);
  }

  protected function mockRampIntervals() {
    $ramp1 = new Recurly_PlanRampInterval(1);
    $ramp1->unit_amount_in_cents->addCurrency('USD', 400);

    $ramp2 = new Recurly_PlanRampInterval(3);
    $ramp2->unit_amount_in_cents->addCurrency('USD', 200);

    return array($ramp1, $ramp2);
  }
}
