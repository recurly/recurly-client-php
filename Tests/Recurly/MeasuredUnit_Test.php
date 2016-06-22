<?php


class Recurly_MeasuredUnitTest extends Recurly_TestCase
{
  public function testGetMeasuredUnit() {
    $this->client->addResponse('GET', '/measured_units/123456', 'measured_units/show-200.xml');

    $measured_unit = Recurly_MeasuredUnit::get(123456, $this->client);

    $this->assertInstanceOf('Recurly_MeasuredUnit', $measured_unit);
    $this->assertEquals(123456, $measured_unit->id);
    $this->assertEquals('Marketing Emails', $measured_unit->name);
    $this->assertEquals('Email', $measured_unit->display_name);
    $this->assertEquals('A Marketing Email', $measured_unit->description);
  }

  public function testCreateMeasuredUnit() {
    $this->client->addResponse('POST', '/measured_units', 'measured_units/create-201.xml');

    $measured_unit = new Recurly_MeasuredUnit(null, $this->client);

    $measured_unit->name = 'Marketing Emails';
    $measured_unit->display_name = 'Emails';
    $measured_unit->description = 'A Marketing Email';

    $measured_unit->create();

    $this->assertInstanceOf('Recurly_MeasuredUnit', $measured_unit);
    $this->assertEquals(123456, $measured_unit->id);
  }
}
