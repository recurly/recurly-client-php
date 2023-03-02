<?php

class RecurlyDunningCampaignListTest extends Recurly_TestCase
{
  function defaultResponses(): array {
    return array(
      array('GET', '/dunning_campaigns', 'dunning_campaigns/index-200.xml')
    );
  }

  public function testLoad() {
    $dunning_campaigns = Recurly_DunningCampaignList::get(null, $this->client);

    $this->assertInstanceOf('Recurly_DunningCampaignList', $dunning_campaigns);
  }
}
