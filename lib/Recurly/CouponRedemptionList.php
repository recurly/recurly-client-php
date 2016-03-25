<?php

namespace Recurly;

class CouponRedemptionList extends Pager
{
    public static function get($params = null, $client = null)
    {
        $uri = self::_uriWithParams(Client::PATH_COUPON_REDEMPTIONS, $params);

        return new self($uri, $client);
    }

    protected function getNodeName()
    {
        return 'redemptions';
    }
}
