<?php

namespace Recurly\Tests\Recurly;

use Recurly\Js;
use Recurly\Tests\JsMock;

class RecurlyJSTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        Js::$privateKey = '0123456789abcdef0123456789abcdef';
    }

    public function testSignSimple()
    {
        $signature = JsMock::sign(array(
            'account' => array('account_code' => '123'),
        ), "\Recurly\Tests\JsMock");

        $this->assertEquals('e4bbe0671c8154f82b6a96cf2b13307d839e6ad6|'.
            'account%5Baccount_code%5D=123&nonce=1234567890ABC&timestamp=1330452000',
            $signature
        );
    }

    public function testSignComplex()
    {
        $signature = JsMock::sign(array(
            'account' => array('account_code' => '123'),
            'plan_code' => 'gold',
            'add_ons' => array(
                array('add_on_code' => 'extra', 'quantity' => 5),
                array('add_on_code' => 'bonus', 'quantity' => 2),
            ),
            'quantity' => 1,
        ), "\Recurly\Tests\JsMock");

        $this->assertEquals('af31773205811350017ed1d05e5b2f7d303417d8|'.
            'account%5Baccount_code%5D=123&add_ons%5B0%5D%5Badd_on_code%5D=extra&ad'.
            'd_ons%5B0%5D%5Bquantity%5D=5&add_ons%5B1%5D%5Badd_on_code%5D=bonus&add'.
            '_ons%5B1%5D%5Bquantity%5D=2&nonce=1234567890ABC&plan_code=gold&quantit'.
            'y=1&timestamp=1330452000',
            $signature
        );
    }
}
