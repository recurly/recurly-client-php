<?php

namespace Recurly;

class AddonList extends Pager
{
    public static function get($planCode, $client = null)
    {
        $uri = Client::PATH_PLANS.'/'.rawurlencode($planCode).Client::PATH_ADDONS;

        return new self($uri, $client);
    }

    protected function getNodeName()
    {
        return 'add_ons';
    }
}
