<?php

/**
 * Class Recurly PerformanceObligation
 * @property string $id
 * @property string $name The name of the POB.
 * @property DateTime $created_at The date and time the gla was created in Recurly.
 * @property DateTime $updated_at The date and time the gla was last updated.
 */

class Recurly_PerformanceObligation extends Recurly_Resource
{
  /**
   * @param string $id
   * @param Recurly_Client $client
   * @return Recurly_PerformanceObligation
   * @throws Recurly_Error
   */
  public static function get($id, $client = null) {
      return Recurly_Base::_get(Recurly_PerformanceObligation::uriForPerformanceObligation($id), $client);
  }

  protected static function uriForPerformanceObligation($id) {
    return self::_safeUri(Recurly_Client::PATH_PERFORMANCE_OBLIGATIONS, $id);
  }

  protected function getNodeName() {
    return 'performance_obligation';
  }

  protected function getWriteableAttributes() {
    return array();
  }
}
