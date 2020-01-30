<?php

use Recurly\Page;
use Recurly\Resources\TestResource;

final class PageTest extends RecurlyTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->resource_one = new \Recurly\Resources\TestResource();
        $this->page_one = new Page();
        $this->page_one->setData([
            $this->resource_one
        ]);
        $this->page_one->setHasMore(false);
    }

    public function testHasMore(): void
    {
        $page = new Page();
        $page->setHasMore(false);
        $this->assertFalse($page->getHasMore());
        $page->setHasMore(true);
        $this->assertTrue($page->getHasMore());
    }

    public function testNext(): void
    {
        $next = 'accounts/?cursor=12345&limit=20';
        $page = new Page();
        $page->setNext($next);
        $this->assertEquals(
            $next,
            $page->getNext()
        );
    }

    public function testValidWithEmptyData(): void
    {
        $page = new Page();
        $page->setData([]);
        $this->assertFalse($page->valid());
    }

    public function testCurrent(): void
    {
        $this->assertEquals(
            $this->resource_one,
            $this->page_one->current()
        );
    }

    public function testCursorUpdate(): void
    {
        $this->assertInstanceOf(\Recurly\Resources\TestResource::class, $this->page_one->current());
        $this->assertFalse($this->page_one->valid());
    }
}