<?php

namespace Recurly\Tests\Recurly;

use Recurly\Tests\TestCase;
use Recurly\Tests\MockResource;

class ResourceTest extends TestCase
{
    public function testXml()
    {
        $resource = new MockResource();
        $resource->date = new \DateTime('@1384202874');
        $resource->bool = true;
        $resource->number = 34;
        $resource->array = array(
            'int' => 1,
            'string' => 'foo',
        );
        $resource->nil = null;
        $resource->string = 'Foo & Bar';
        $this->assertEquals(
            "<?xml version=\"1.0\"?>\n<mock><date>2013-11-11T20:47:54+00:00</date><bool>true</bool><number>34</number><array><int>1</int><string>foo</string></array><nil nil=\"nil\"></nil><string>Foo &amp; Bar</string></mock>\n",
            $resource->xml()
        );
    }
}
