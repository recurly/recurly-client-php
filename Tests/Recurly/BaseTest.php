<?php

namespace Recurly\Tests\Recurly;

use Recurly\Tests\TestCase;
use Recurly\Adjustment;
use Recurly\Base;

class BaseTest extends TestCase
{
    public function testParsingEmptyXML()
    {
        $this->client->addResponse('GET', 'abcdef1234567890', 'accounts/empty.xml');

        $account = Base::_get('abcdef1234567890', $this->client);
        $this->assertNull($account);
    }

    public function testPassingClientToStub()
    {
        $this->client->addResponse('GET', 'abcdef1234567890', 'adjustments/show-200.xml');

        /** @var Adjustment $adjustment */
        $adjustment = Base::_get('abcdef1234567890', $this->client);
        $this->assertInstanceOf('Recurly\Adjustment', $adjustment);
        $this->assertInstanceOf('Recurly\Stub', $adjustment->invoice);

        // The client is protected so we do a little song and dance to access it:
        $reflection = new \ReflectionClass($adjustment->invoice);
        $property = $reflection->getProperty('_client');
        $property->setAccessible(true);
        $this->assertEquals($property->getValue($adjustment->invoice), $this->client);
    }
}
