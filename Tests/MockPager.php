<?php

namespace Recurly\Tests;

use Recurly\Pager;

class MockPager extends Pager
{
    protected function getNodeName()
    {
        return 'mocks';
    }

    public function _loadFrom($uri, $params = null)
    {
        parent::_loadFrom($uri, $params);
    }
}
