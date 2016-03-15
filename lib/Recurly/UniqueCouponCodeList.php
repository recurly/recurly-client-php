<?php

namespace Recurly;

class UniqueCouponCodeList extends Pager
{
    public static function get($params = null, $client = null)
    {
        $uri = self::_uriWithParams(Client::PATH_UNIQUE_COUPONS, $params);

        return new self($uri, $client);
    }

    protected function getNodeName()
    {
        return 'unique_coupon_codes';
    }
}
