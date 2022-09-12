<?php

class Recurly_CustomFieldListTest extends Recurly_TestCase
{
  function asXml($list) {
    $doc = new DOMDocument("1.0");
    $doc->encoding = 'utf-8';
    $list->populateXmlDoc($doc, $doc);
    return $doc->saveXML(null, LIBXML_NOEMPTYTAG);
  }

  public function testEmptyListXml() {
    $list = new Recurly_CustomFieldList();
    $this->assertEquals("<?xml version=\"1.0\" encoding=\"utf-8\"?>\n", $this->asXml($list));
  }

  public function testRejectsOtherObjects() {
    $list = new Recurly_CustomFieldList();
    try {
      $list[] = 'foo';
      $this->fail('Should have thrown an exception');
    } catch (Exception $e) {
      $this->assertEquals('value must be an instance of Recurly_CustomField', $e->getMessage());
    }
  }

  public function testRejectsUnmatchedName() {
    $list = new Recurly_CustomFieldList();
    try {
      $list['food'] = new Recurly_CustomField('foo', 'bar');
      $this->fail('Should have thrown an exception');
    } catch (Exception $e) {
      $this->assertEquals("key: 'food' does not match fields's name: 'foo'", $e->getMessage());
    }
  }

  public function testAssignFieldWithStringValue() {
    $list = new Recurly_CustomFieldList();
    $list[] = new Recurly_CustomField('foo', 'bar');

    $this->assertEquals('bar', $list['foo']->value);
    $this->assertTrue($list['foo']->has_changed());
    $this->assertEquals("<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<custom_fields><custom_field><name>foo</name><value>bar</value></custom_field></custom_fields>\n", $this->asXml($list));
  }

  public function testAssignFieldWithEmptyValue() {
    $list = new Recurly_CustomFieldList();
    $list[] = new Recurly_CustomField('empty_value', '');

    $this->assertEquals('', $list['empty_value']->value);
    $this->assertEquals("<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<custom_fields><custom_field><name>empty_value</name><value></value></custom_field></custom_fields>\n", $this->asXml($list));
  }

  public function testAssignFieldWithNilValue() {
    $list = new Recurly_CustomFieldList();
    $list[] = new Recurly_CustomField('nil_value', null);

    $this->assertEquals('', $list['nil_value']->value);
    $this->assertEquals("<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<custom_fields><custom_field><name>nil_value</name><value nil=\"nil\"></value></custom_field></custom_fields>\n", $this->asXml($list));
  }

  public function testUnset() {
    $list = new Recurly_CustomFieldList();
    unset($list['foo']);

    $this->assertTrue(isset($list['foo']));
    $this->assertEquals(null, $list['foo']->value);
    $this->assertEquals("<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<custom_fields><custom_field><name>foo</name><value nil=\"nil\"></value></custom_field></custom_fields>\n", $this->asXml($list));
  }

  public function testSeralizesChanged() {
    $field = new Recurly_CustomField('foo', 'bar');
    $list = new Recurly_CustomFieldList();
    $list[] = $field;

    $this->assertTrue($field->has_changed());
    setProtectedProperty($field, '_unsavedKeys', []);
    $this->assertFalse($field->has_changed());

    $list['foo']->value = 'baz';
    $this->assertEquals('baz', $list['foo']->value);
    $this->assertTrue($list['foo']->has_changed());
    $this->assertEquals("<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<custom_fields><custom_field><name>foo</name><value>baz</value></custom_field></custom_fields>\n", $this->asXml($list));
  }

  public function testIteration() {
    $list = new Recurly_CustomFieldList();
    foreach ($list as $field) {
      $this->fail('Should not have anything to iterate over.');
    }

    $list[] = new Recurly_CustomField('foo', 'something');
    $list[] = new Recurly_CustomField('bar', 0);

    $actual = array();
    foreach ($list as $field) {
      $this->assertInstanceOf('Recurly_CustomField', $field);
      $actual[$field->name] = $field->value;
    }
    $this->assertEquals(array('foo' => 'something', 'bar' => 0), $actual);

    $list[] = new Recurly_CustomField('foo', null);
    $list[] = new Recurly_CustomField('baz', '');

    $actual = array();
    foreach ($list as $field) {
      $this->assertInstanceOf('Recurly_CustomField', $field);
      $actual[$field->name] = $field->value;
    }
    $this->assertEquals(array('foo' => null, 'bar' => 0, 'baz' => ''), $actual);
  }
}
