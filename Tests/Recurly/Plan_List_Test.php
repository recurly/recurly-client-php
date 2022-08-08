<?php


class Recurly_PlanListTest extends Recurly_TestCase
{

  public function testGetPlans() {
    $this->client->addResponse('GET', '/plans', 'plans/index-200.xml');

    $plans = Recurly_PlanList::get(null, $this->client);
    $this->assertInstanceOf('Recurly_PlanList', $plans);

    // Fixed Plan
    $plan = $plans->current();

    $this->assertInstanceOf('Recurly_Plan', $plan);
    $this->assertEquals('fixed-plan', $plan->plan_code);
    $this->assertEquals('fixed', $plan->pricing_model);

    // Ramp Plan
    $plans->next();
    $plan = $plans->current();

    $this->assertInstanceOf('Recurly_Plan', $plan);
    $this->assertEquals('ramp-plan', $plan->plan_code);
    $this->assertEquals('ramp', $plan->pricing_model);
    $this->assertEquals(null, $plan->unit_amount_in_cents);
    $this->assertIsArray($plan->ramp_intervals);
    $this->assertEquals(sizeof($plan->ramp_intervals), 3);

    $this->assertEquals(1, $plan->ramp_intervals[0]->starting_billing_cycle);
    $this->assertEquals(3, $plan->ramp_intervals[1]->starting_billing_cycle);
    $this->assertEquals(6, $plan->ramp_intervals[2]->starting_billing_cycle);

    $this->assertEquals(500, $plan->ramp_intervals[0]->unit_amount_in_cents['USD']->amount_in_cents);
    $this->assertEquals(700, $plan->ramp_intervals[1]->unit_amount_in_cents['USD']->amount_in_cents);
    $this->assertEquals(1000, $plan->ramp_intervals[2]->unit_amount_in_cents['USD']->amount_in_cents);
  }

}
