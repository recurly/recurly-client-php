<?php

namespace Recurly;

class CouponList extends Pager
{
    public static function get($params = null, $client = null)
    {
        $uri = self::_uriWithParams(Client::PATH_COUPONS, $params);

        return new self($uri, $client);
    }

    protected function getNodeName()
    {
        return 'coupons';
    }
}
