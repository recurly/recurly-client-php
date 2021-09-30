<?php

class Recurly_DunningCampaignList extends Recurly_Pager
{
  public static function get($params = null, $client = null) {
    $uri = self::_uriWithParams(Recurly_Client::PATH_DUNNING_CAMPAIGNS, $params);
    return new self($uri, $client);
  }

  protected function getNodeName() {
    return 'dunning_campaigns';
  }
}
