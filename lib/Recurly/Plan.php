<?php

namespace Recurly;

class Plan extends Resource
{
    protected static $_writeableAttributes;

    public function __construct()
    {
        parent::__construct();
        $this->setup_fee_in_cents = new CurrencyList('setup_fee_in_cents');
        $this->unit_amount_in_cents = new CurrencyList('unit_amount_in_cents');
    }

    public static function init()
    {
        self::$_writeableAttributes = array(
            'plan_code',
            'name',
            'description',
            'success_url',
            'cancel_url',
            'display_donation_amounts',
            'display_quantity',
            'display_phone_number',
            'bypass_hosted_confirmation',
            'unit_name',
            'payment_page_tos_link',
            'plan_interval_length',
            'plan_interval_unit',
            'trial_interval_length',
            'trial_interval_unit',
            'unit_amount_in_cents',
            'setup_fee_in_cents',
            'total_billing_cycles',
            'accounting_code',
            'setup_fee_accounting_code',
            'tax_exempt',
            'tax_code',
        );
    }

    /**
     * @param $planCode
     * @param null $client
     *
     * @return Plan
     */
    public static function get($planCode, $client = null)
    {
        return Base::_get(self::uriForPlan($planCode), $client);
    }

    public function create()
    {
        $this->_save(Client::POST, Client::PATH_PLANS);
    }

    public function update()
    {
        $this->_save(Client::PUT, $this->uri());
    }

    public function delete()
    {
        return Base::_delete($this->uri(), $this->_client);
    }

    public static function deletePlan($planCode, $client = null)
    {
        return Base::_delete(self::uriForPlan($planCode), $client);
    }

    protected function uri()
    {
        if (!empty($this->_href)) {
            return $this->getHref();
        } else {
            return self::uriForPlan($this->plan_code);
        }
    }

    protected static function uriForPlan($planCode)
    {
        return Client::PATH_PLANS.'/'.rawurlencode($planCode);
    }

    protected function getNodeName()
    {
        return 'plan';
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

Plan::init();
