<?php

namespace Recurly\Tests\Recurly;

use Recurly\Tests\TestCase;
use Recurly\Addon;

class AddonTest extends TestCase
{
    public function defaultResponses()
    {
        return array(
            array('GET', '/plans/gold/add_ons/ipaddresses', 'addons/show-200.xml'),
        );
    }

    public function testDelete()
    {
        $this->client->addResponse(
            'DELETE',
            'https://api.recurly.com/v2/plans/gold/add_ons/ipaddresses',
            'addons/destroy-204.xml'
        );

        $addon = Addon::get('gold', 'ipaddresses', $this->client);
        $this->assertInstanceOf('Recurly\Addon', $addon);
        $addon->delete();
    }
}
