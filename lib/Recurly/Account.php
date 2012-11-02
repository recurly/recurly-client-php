<?php

namespace Recurly;

class Account extends Resource
{
    protected static $_writeableAttributes;
    protected static $_requiredAttributes;

    public function __construct($accountCode = null, $client = null)
    {
        parent::__construct(null, $client);
        if (!is_null($accountCode)) {
            $this->account_code = $accountCode;
        }
        $this->address = new Address();
    }

    public static function init()
    {
        self::$_writeableAttributes = array(
            'account_code',
            'username',
            'first_name',
            'last_name',
            'vat_number',
            'email',
            'company_name',
            'accept_language',
            'billing_info',
            'address',
            'tax_exempt',
            'entity_use_code',
            'cc_emails',
        );
        self::$_requiredAttributes = array(
            'account_code',
        );
    }

    public function &__get($key)
    {
        if ($key == 'redemption' && parent::__isset('redemptions')) {
            return new Stub('redemption', $this->_href.'/redemption', $this->_client);
        } else {
            return parent::__get($key);
        }
    }

    /**
     * @param $accountCode
     * @param null $client
     *
     * @return Account
     */
    public static function get($accountCode, $client = null)
    {
        return Base::_get(self::uriForAccount($accountCode), $client);
    }

    public function create()
    {
        $this->_save(Client::POST, Client::PATH_ACCOUNTS);
    }

    public function update()
    {
        $this->_save(Client::PUT, $this->uri());
    }

    public function close()
    {
        Base::_delete($this->uri(), $this->_client);
        $this->state = 'closed';
    }

    public static function closeAccount($accountCode, $client = null)
    {
        return Base::_delete(self::uriForAccount($accountCode), $client);
    }

    public function reopen()
    {
        $this->_save(Client::PUT, $this->uri().'/reopen');
    }

    /**
     * @param $accountCode
     * @param null $client
     *
     * @return Account
     */
    public static function reopenAccount($accountCode, $client = null)
    {
        return Base::_put(self::uriForAccount($accountCode).'/reopen', $client);
    }

    protected function uri()
    {
        if (!empty($this->_href)) {
            return $this->getHref();
        } else {
            return self::uriForAccount($this->account_code);
        }
    }

    protected static function uriForAccount($accountCode)
    {
        return Client::PATH_ACCOUNTS.'/'.rawurlencode($accountCode);
    }

    protected function getNodeName()
    {
        return 'account';
    }

    protected function getWriteableAttributes()
    {
        return self::$_writeableAttributes;
    }

    protected function getRequiredAttributes()
    {
        return self::$_requiredAttributes;
    }
}

Account::init();
