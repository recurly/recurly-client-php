<?php

namespace Recurly;

class PlanList extends Pager
{
    public static function get($params = null, $client = null)
    {
        $uri = self::_uriWithParams(Client::PATH_PLANS, $params);

        return new self($uri, $client);
    }

    protected function getNodeName()
    {
        return 'plans';
    }
}
