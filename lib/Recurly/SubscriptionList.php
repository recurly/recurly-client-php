<?php

namespace Recurly;

class SubscriptionList extends Pager
{
    public static function getActive($params = null, $client = null)
    {
        return self::get(Pager::_setState($params, 'active'), $client);
    }

    public static function getCanceled($params = null, $client = null)
    {
        return self::get(Pager::_setState($params, 'canceled'), $client);
    }

    public static function getExpired($params = null, $client = null)
    {
        return self::get(Pager::_setState($params, 'expired'), $client);
    }

    public static function getFuture($params = null, $client = null)
    {
        return self::get(Pager::_setState($params, 'future'), $client);
    }

    public static function getLive($params = null, $client = null)
    {
        return self::get(Pager::_setState($params, 'live'), $client);
    }

    public static function getPastDue($params = null, $client = null)
    {
        return self::get(Pager::_setState($params, 'past_due'), $client);
    }

    public static function getTrials($params = null, $client = null)
    {
        return self::get(Pager::_setState($params, 'in_trial'), $client);
    }

    public static function get($params = null, $client = null)
    {
        $uri = self::_uriWithParams(Client::PATH_SUBSCRIPTIONS, $params);

        return new self($uri, $client);
    }

    public static function getForAccount($accountCode, $params = null, $client = null)
    {
        $uri = self::_uriWithParams(Client::PATH_ACCOUNTS.'/'.rawurlencode($accountCode).Client::PATH_SUBSCRIPTIONS,
            $params);

        return new self($uri, $client);
    }

    protected function getNodeName()
    {
        return 'subscriptions';
    }
}
