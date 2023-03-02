<?php

class Recurly_DunningCampaignTest extends Recurly_TestCase
{
  function defaultResponses(): array {
    return array(
      array('GET', '/dunning_campaigns/1234abcd', 'dunning_campaigns/show-200.xml'),
    );
  }

  public function testGetSingleDunningCampaign() {
    $dunning_campaign = Recurly_DunningCampaign::get('1234abcd', $this->client);

    $this->assertInstanceOf('Recurly_DunningCampaign', $dunning_campaign);
    $this->assertEquals(3, $dunning_campaign->dunning_cycles[0]->intervals[0]->days);
  }

  public function testBulkUpdateSuccess() {
    $this->client->addResponse('PUT', '/dunning_campaigns/1234abcd/bulk_update', 'dunning_campaigns/update-204.xml');

    $dunning_campaign = Recurly_DunningCampaign::get('1234abcd', $this->client);

    $plan_1 = new Recurly_Plan();
    $plan_1->plan_code = 'platinum';
    $plan_1->name = 'Platinum & Gold Plan';
    $plan_1->unit_amount_in_cents->addCurrency('USD', 1500);
    $plan_1->unit_amount_in_cents->addCurrency('EUR', 1200);
    $plan_1->setup_fee_in_cents->addCurrency('EUR', 500);
    $plan_1->trial_requires_billing_info = false;
    $plan_1->total_billing_cycles = 6;
    $plan_1->auto_renew = false;

    $bulk_update_response = $dunning_campaign->bulkUpdate([$plan_1->plan_code]);

    $this->assertNull($bulk_update_response);
  }

  public function testBulkUpdateFailure() {
    $this->client->addResponse('PUT', '/dunning_campaigns/1234abcd/bulk_update', 'dunning_campaigns/update-404.xml');

    $dunning_campaign = Recurly_DunningCampaign::get('1234abcd', $this->client);

    try {
      $bulk_update_response = $dunning_campaign->bulkUpdate(['foo']);
    } catch (Exception $e) {
      $this->assertInstanceOf('Recurly_NotFoundError', $e);
    }
  }
}
