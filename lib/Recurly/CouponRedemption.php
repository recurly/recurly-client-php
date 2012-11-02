<?php

namespace Recurly;

class CouponRedemption extends Resource
{
    protected static $_writeableAttributes;
    protected static $_redeemUrl;

    public static function init()
    {
        self::$_writeableAttributes = array('account_code', 'currency', 'subscription_uuid');
    }

    public static function get($accountCode, $client = null)
    {
        return Base::_get(self::uriForAccount($accountCode), $client);
    }

    public function delete($accountCode = null)
    {
        return Base::_delete($this->uri($accountCode), $this->_client);
    }

    protected function uri($accountCode = null)
    {
        if (!empty($this->_href)) {
            return $this->getHref();
        } else {
            if (!empty($accountCode)) {
                return self::uriForAccount($accountCode);
            } else {
                return false;
            }
        }
    }

    protected static function uriForAccount($accountCode)
    {
        return Client::PATH_ACCOUNTS.'/'.rawurlencode($accountCode).Client::PATH_COUPON_REDEMPTION;
    }

    protected function getNodeName()
    {
        return 'redemption';
    }

    protected function getWriteableAttributes()
    {
        return self::$_writeableAttributes;
    }

    protected function getRequiredAttributes()
    {
        return array();
    }
}

CouponRedemption::init();
