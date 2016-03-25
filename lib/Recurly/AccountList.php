<?php

namespace Recurly;

class AccountList extends Pager
{
    public static function getActive($params = null, $client = null)
    {
        return self::get(Pager::_setState($params, 'active'), $client);
    }

    public static function getClosed($params = null, $client = null)
    {
        return self::get(Pager::_setState($params, 'closed'), $client);
    }

    public static function getPastDue($params = null, $client = null)
    {
        return self::get(Pager::_setState($params, 'past_due'), $client);
    }

    public static function get($params = null, $client = null)
    {
        $uri = self::_uriWithParams(Client::PATH_ACCOUNTS, $params);

        return new self($uri, $client);
    }

    protected function getNodeName()
    {
        return 'accounts';
    }
}
