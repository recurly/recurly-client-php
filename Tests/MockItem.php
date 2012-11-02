<?php

namespace Recurly\Tests;

use Recurly\Resource;

class MockItem extends Resource
{
    protected function getNodeName()
    {
        return 'mock';
    }

    protected function getWriteableAttributes()
    {
        return array();
    }

    protected function getRequiredAttributes()
    {
        return array();
    }
}
