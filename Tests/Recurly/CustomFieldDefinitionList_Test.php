<?php

class Recurly_CustomFieldDefinitionListTest extends Recurly_TestCase
{
  public function testGetCustomFieldDefinitionListAll() {
    $this->client->addResponse(
      'GET',
      '/custom_field_definitions',
      'custom_field_definitions/list-200.xml'
    );

    $custom_field_definitions = Recurly_CustomFieldDefinitionList::get(null, $this->client);
    $this->assertInstanceOf('Recurly_CustomFieldDefinitionList', $custom_field_definitions);

    $custom_field_definition = $custom_field_definitions->current();
    $this->assertInstanceOf('Recurly_CustomFieldDefinition', $custom_field_definition);

    $this->assertEquals(iterator_count($custom_field_definitions), 3);
  }

  public function testGetCustomFieldDefinitionListFiltered() {
    $this->client->addResponse(
      'GET',
      '/custom_field_definitions?related_type=plan',
      'custom_field_definitions/list_filtered-200.xml'
    );

    $custom_field_definitions = Recurly_CustomFieldDefinitionList::getByRelatedType('plan', $this->client);
    $this->assertInstanceOf('Recurly_CustomFieldDefinitionList', $custom_field_definitions);

    $custom_field_definition = $custom_field_definitions->current();
    $this->assertInstanceOf('Recurly_CustomFieldDefinition', $custom_field_definition);

    $this->assertEquals(iterator_count($custom_field_definitions), 2);
  }
}
