<?php

class Recurly_ExportDateList_Test extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/export_dates', 'export_dates/index-200.xml'),
    );
  }

  public function testGet() {
    $dates = Recurly_ExportDateList::get(null, $this->client);
    $this->assertInstanceOf('Recurly_ExportDateList', $dates);
    $this->assertEquals('/export_dates', $dates->getHref());

    $date = $dates->current();
    $this->assertInstanceOf('Recurly_ExportDate', $date);
    $this->assertEquals('2016-08-01', $date->date);
    $this->assertInstanceOf('Recurly_Stub', $date->export_files);
    $this->assertEquals($date->export_files->getHref(), 'https://api.recurly.com/v2/export_dates/2016-08-01/export_files');
  }
}
