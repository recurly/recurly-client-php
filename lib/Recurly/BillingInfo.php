<?php

namespace Recurly;

use Recurly\Errors\Error;

class BillingInfo extends Resource
{
    protected static $_writeableAttributes;

    public static function init()
    {
        self::$_writeableAttributes = array(
            'first_name',
            'last_name',
            'name_on_account',
            'ip_address',
            'address1',
            'address2',
            'city',
            'state',
            'country',
            'zip',
            'phone',
            'vat_number',
            'number',
            'month',
            'year',
            'verification_value',
            'start_year',
            'start_month',
            'issue_number',
            'account_number',
            'routing_number',
            'account_type',
            'paypal_billing_agreement_id',
            'amazon_billing_agreement_id',
            'currency',
            'token_id',
        );
    }

    public static function get($accountCode, $client = null)
    {
        return Base::_get(self::uriForBillingInfo($accountCode), $client);
    }

    public function create()
    {
        $this->update();
    }

    public function update()
    {
        $this->_save(Client::PUT, $this->uri());
    }

    public function delete()
    {
        return Base::_delete($this->uri(), $this->_client);
    }

    public static function deleteForAccount($accountCode, $client = null)
    {
        return Base::_delete(self::uriForBillingInfo($accountCode), $client);
    }

    protected function uri()
    {
        if (!empty($this->_href)) {
            return $this->getHref();
        } else {
            if (!empty($this->account_code)) {
                return self::uriForBillingInfo($this->account_code);
            } else {
                throw new Error("'account_code' not specified.");
            }
        }
    }

    protected static function uriForBillingInfo($accountCode)
    {
        return Client::PATH_ACCOUNTS.'/'.rawurlencode($accountCode).Client::PATH_BILLING_INFO;
    }

    protected function getNodeName()
    {
        return 'billing_info';
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

BillingInfo::init();
