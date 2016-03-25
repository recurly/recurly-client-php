<?php

namespace Recurly\Tests;

use Recurly\Js;

class JsMock extends Js
{
    // Overload time so we can mock
    public function utc_timestamp()
    {
        return 1330452000;
    }

    public function get_nonce()
    {
        return '1234567890ABC';
    }
}
