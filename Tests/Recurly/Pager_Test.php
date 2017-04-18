<?php


class Mock_Pager extends Recurly_Pager {
  protected function getNodeName() {
    return 'mocks';
  }

  // Overridden to make it public.
  public function _loadFrom($uri) {
    parent::_loadFrom($uri);
  }
}
Recurly_Resource::$class_map['mocks'] = 'Mock_Pager';

class Mock_Item extends Recurly_Resource {
  protected function getNodeName()            { return 'mock'; }
  protected function getWriteableAttributes() { return array(); }
}
Recurly_Resource::$class_map['mock'] = 'Mock_Item';


class Recurly_PagerTest extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/mocks', 'pager/index-1-200.xml'),
      array('GET', 'https://example.com/mocks?cursor=1', 'pager/index-1-200.xml'),
      array('GET', 'https://example.com/mocks?cursor=2', 'pager/index-2-200.xml'),
      array('GET', 'https://example.com/mocks?cursor=3', 'pager/index-3-200.xml'),
    );
  }

  private function assertIteratesCorrectly($pager, $count) {
    // Initialization and enumeration
    $pager->rewind();
    $this->assertTrue($pager->valid());
    $this->assertEquals(0, $pager->key());
    $first = $pager->current();
    $this->assertInstanceOf('Mock_Item', $first, 'Item 0 has correct type');
    $this->assertEquals(1, $first->value, 'Item 0 has correct value');

    for ($i = 1; $i < $count; $i++) {
      $pager->next();
      $this->assertTrue($pager->valid(), "Iterartor should still be valid");
      // FIXME: This is the pattern keys follow for paged results, which creates
      // duplicate values. I consider that a bug.
      //   $this->assertEquals((1 - $i % $page_size) + 1, $pager->key());
      // The nested results follow a much sainer:
      //   $this->assertEquals($i, $pager->key());
      $item = $pager->current();
      $this->assertInstanceOf('Mock_Item', $item, "Item $i has correct type");
      $this->assertEquals($i + 1, $item->value, "Item $i has correct value");
    }

    // End of the list
    $pager->next();
    $this->assertFalse($pager->valid(), "Iterator should now be invalid");

    // Resets correctly
    $pager->rewind();
    $this->assertTrue($pager->valid());
    $this->assertEquals(0, $pager->key());
  }

  public function testFromHref() {
    $url = '/mocks';
    $pager = new Mock_Pager($url, $this->client);
    $pager->_loadFrom($url);

    $this->assertEquals($url, $pager->getHref());
    $this->assertEquals(6, $pager->count(), 'Returns correct count');
    $this->assertEquals(6, count($pager), 'Returns correct count');
    $this->assertIteratesCorrectly($pager, 6);
  }

  public function testFromStub() {
    $url = '/mocks';
    $stub = new Recurly_Stub('mocks', $url, $this->client);
    $pager = $stub->get();
    $this->assertInstanceOf('Mock_Pager', $pager);

    $this->assertEquals($url, $pager->getHref());
    $this->assertEquals($pager->count(), 6, 'Returns correct count');
    $this->assertEquals(count($pager), 6, 'Returns correct count');
    $this->assertIteratesCorrectly($pager, 6);
  }

  public function testFromNested() {
    $this->client->addResponse('GET', '/a-mock', 'pager/show-200.xml');
    $account = Recurly_Base::_get('/a-mock', $this->client);
    $this->assertInstanceOf('Recurly_Account', $account);

    $pager = $account->mocks;
    $this->assertInstanceOf('Mock_Pager', $pager);

    $this->assertNull($pager->getHref(), "Nested records shouldn't have a URL");
    $this->assertEquals(4, $pager->count(), 'Returns correct count');
    $this->assertEquals(4, count($pager), 'Returns correct count');
    $this->assertIteratesCorrectly($pager, 4);
  }
}
