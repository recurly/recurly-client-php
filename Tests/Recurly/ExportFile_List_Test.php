<?php

class Recurly_ExportFileList_Test extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/export_dates/2016-08-01/export_files', 'export_files/index-200.xml'),
    );
  }

  public function testGet() {
    $files = Recurly_ExportFileList::get('2016-08-01', null, $this->client);
    $this->assertInstanceOf('Recurly_ExportFileList', $files);
    $this->assertEquals('/export_dates/2016-08-01/export_files', $files->getHref());

    $file = $files->current();
    $this->assertInstanceOf('Recurly_ExportFile', $file);
    $this->assertEquals('https://api.recurly.com/v2/export_dates/2016-08-01/export_files/revenue_schedules_full.csv', $file->getHref());
    $this->assertEquals('9aa55980167ae522b27410edcd5303b0', $file->md5sum);
  }
}
