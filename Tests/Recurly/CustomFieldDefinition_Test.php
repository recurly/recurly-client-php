<?php

class Recurly_CustomFieldDefinitionTest extends Recurly_TestCase
{
  public function testGetCustomFieldDefinition() {
    $this->client->addResponse(
      'GET',
      '/custom_field_definitions/3722298505492673710',
      'custom_field_definitions/show-200.xml'
    );

    $custom_field_definition = Recurly_CustomFieldDefinition::get('3722298505492673710', $this->client);
    $this->assertInstanceOf('Recurly_CustomFieldDefinition', $custom_field_definition);
    $this->assertEquals($custom_field_definition->id, '3722298505492673710');
    $this->assertEquals($custom_field_definition->related_type, 'plan');
    $this->assertEquals($custom_field_definition->name, 'package');
    $this->assertEquals($custom_field_definition->user_access, 'writable');
    $this->assertEquals($custom_field_definition->display_name, 'Package');
    $this->assertEquals($custom_field_definition->tooltip, 'Value can be \'Basic\' or \'Premium\'');
    $this->assertEquals($custom_field_definition->created_at, new DateTime('2023-01-23T19:02:40Z'));
    $this->assertEquals($custom_field_definition->updated_at, new DateTime('2023-01-23T19:02:47Z'));
  }
}
