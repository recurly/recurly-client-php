<?php

require_once(__DIR__ . '/../test_helpers.php');

class Recource_Mock_Resource extends Recurly_Resource {
  protected function getNodeName() {
    return 'mock';
  }
  protected function getWriteableAttributes() {
    return array('date', 'bool', 'number', 'array', 'nil');
  }
  protected function getRequiredAttributes() {
    return array('required');
  }
}

class Recurly_ResourceTest extends Recurly_TestCase {

  public function testXml() {
    $resource = new Recource_Mock_Resource();
    $resource->date = new DateTime("@1384202874");
    $resource->bool = true;
    $resource->number = 34;
    $resource->array = array(
      'int' => 1,
      'string' => 'foo',
    );
    $resource->nil = null;
    $this->assertEquals(
      "<?xml version=\"1.0\"?>\n<mock><date>2013-11-11T20:47:54+00:00</date><bool>true</bool><number>34</number><array><int>1</int><string>foo</string></array><nil nil=\"nil\"></nil></mock>\n",
      $resource->xml()
    );
  }
}
