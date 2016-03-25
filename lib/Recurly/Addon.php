<?php

namespace Recurly;

class Addon extends Resource
{
    protected static $_writeableAttributes;

    public function __construct()
    {
        parent::__construct();
        $this->unit_amount_in_cents = new CurrencyList('unit_amount_in_cents');
    }

    public static function init()
    {
        self::$_writeableAttributes = array(
            'add_on_code',
            'name',
            'display_quantity',
            'default_quantity',
            'unit_amount_in_cents',
            'accounting_code',
            'tax_code',
        );
    }

    /**
     * @param $planCode
     * @param $addonCode
     * @param null $client
     *
     * @return Addon
     */
    public static function get($planCode, $addonCode, $client = null)
    {
        return Base::_get(self::uriForAddOn($planCode, $addonCode), $client);
    }

    public function create()
    {
        $this->_save(Client::POST, Client::PATH_PLANS.'/'.rawurlencode($this->plan_code).Client::PATH_ADDONS);
    }

    public function update()
    {
        return $this->_save(Client::PUT, $this->uri());
    }

    public function delete()
    {
        return Base::_delete($this->uri(), $this->_client);
    }

    protected function uri()
    {
        if (!empty($this->_href)) {
            return $this->getHref();
        } else {
            return self::uriForAddOn($this->plan_code, $this->add_on_code);
        }
    }

    protected static function uriForAddOn($planCode, $addonCode)
    {
        return Client::PATH_PLANS.'/'.rawurlencode($planCode).
            Client::PATH_ADDONS.'/'.rawurlencode($addonCode);
    }

    protected function getNodeName()
    {
        return 'add_on';
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

Addon::init();
