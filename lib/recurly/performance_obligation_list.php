<?php

class Recurly_PerformanceObligationList extends Recurly_Pager
{
  public static function get($params = null, $client = null) {
    $uri = self::_uriWithParams(Recurly_Client::PATH_PERFORMANCE_OBLIGATIONS, $params);
    return new self($uri, $client);
  }

  protected function getNodeName() {
    return 'performance_obligations';
  }
}
