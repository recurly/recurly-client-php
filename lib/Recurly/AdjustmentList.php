<?php

namespace Recurly;

class AdjustmentList extends Pager
{
    public static function get($accountCode, $params = null, $client = null)
    {
        $uri = self::_uriWithParams(Client::PATH_ACCOUNTS.'/'.rawurlencode($accountCode).Client::PATH_ADJUSTMENTS,
            $params);

        return new self($uri, $client);
    }

    protected function getNodeName()
    {
        return 'adjustments';
    }
}
