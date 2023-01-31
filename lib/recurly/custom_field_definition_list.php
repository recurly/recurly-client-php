<?php

class Recurly_CustomFieldDefinitionList extends Recurly_Pager
{
  public static function get($params = null, $client = null) {
    $uri = self::_uriWithParams(Recurly_Client::PATH_CUSTOM_FIELD_DEFINITIONS, $params);
    return new self($uri, $client);
  }

  public static function getByRelatedType($related_type, $client = null) {
    $params['related_type'] = $related_type;
    return self::get($params, $client);
  }

  protected function getNodeName() {
    return 'custom_field_definitions';
  }
}
