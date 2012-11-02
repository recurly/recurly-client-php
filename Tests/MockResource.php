<?php

namespace Recurly\Tests;

use Recurly\Resource;

class MockResource extends Resource
{
    protected function getNodeName()
    {
        return 'mock';
    }

    protected function getWriteableAttributes()
    {
        return array('date', 'bool', 'number', 'array', 'nil', 'string');
    }

    protected function getRequiredAttributes()
    {
        return array('required');
    }
}
