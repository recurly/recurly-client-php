<?php

/**
 * Class Recurly_CustomFieldDefinition

 * @property string $id Custom field definition ID
 * @property string $related_type Related Recurly object type
 * @property string $name Used by the API to identify the field or reading and writing. The name can only be used once per Recurly object type.
 * @property string $user_access The access control applied inside Recurly's admin UI
 * @property string $display_name Used to label the field when viewing and editing the field in Recurly's admin UI.
 * @property string $tooltip Displayed as a tooltip when editing the field in the Recurly admin UI.
 * @property DateTime $created_at Created at
 * @property DateTime $updated_at Last updated at
 */
class Recurly_CustomFieldDefinition extends Recurly_Resource
{
  public static function get($customFieldDefinitionId, $client = null) {
    return Recurly_Base::_get(
      Recurly_CustomFieldDefinition::uriForCustomFieldDefinition($customFieldDefinitionId),
      $client
    );
  }

  protected function uri() {
    if (!empty($this->_href))
      return $this->getHref();
    else
      return Recurly_CustomFieldDefinition::uriForCustomFieldDefinition($this->id);
  }

  protected static function uriForCustomFieldDefinition($customFieldDefinitionId) {
    return self::_safeUri(Recurly_Client::PATH_CUSTOM_FIELD_DEFINITIONS, $customFieldDefinitionId);
  }

  protected function getNodeName() {
    return 'custom_field_definition';
  }

  protected function getWriteableAttributes() {
    return array(
      'id',
      'related_type',
      'name',
      'user_access',
      'display_name',
      'tooltip',
      'created_at',
      'updated_at',
    );
  }
}
