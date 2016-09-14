<?php

class Recurly_ExportFile_Test extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/export_dates/2016-08-01/export_files/revenue_schedules_full.csv', 'export_files/show-200.xml'),
    );
  }

  public function testGet() {
    $file = Recurly_ExportFile::get('2016-08-01', 'revenue_schedules_full.csv', $this->client);
    $this->assertInstanceOf('Recurly_ExportFile', $file);
    $this->assertEquals('https://api.recurly.com/v2/export_dates/2016-08-01/export_files/revenue_schedules_full.csv', $file->getHref());
    $this->assertEquals('1471631526', $file->expires_at->getTimestamp());
    $this->assertEquals('https://example.com/download/1424738224870632110/dates/2016-08-01/revenue_schedules_full.csv', $file->download_url);
  }
}
