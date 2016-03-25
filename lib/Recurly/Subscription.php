<?php

namespace Recurly;

use Recurly\Errors\Error;

class Subscription extends Resource
{
    protected static $_writeableAttributes;

    public static function init()
    {
        self::$_writeableAttributes = array(
            'account',
            'plan_code',
            'coupon_code',
            'coupon_codes',
            'unit_amount_in_cents',
            'quantity',
            'currency',
            'starts_at',
            'trial_ends_at',
            'total_billing_cycles',
            'first_renewal_date',
            'timeframe',
            'subscription_add_ons',
            'net_terms',
            'po_number',
            'collection_method',
            'cost_in_cents',
            'remaining_billing_cycles',
            'bulk',
            'terms_and_conditions',
            'customer_notes',
            'vat_reverse_charge_notes',
            'bank_account_authorized_at',
        );
    }

    public function __construct($href = null, $client = null)
    {
        parent::__construct($href, $client);
        $this->subscription_add_ons = array();
    }

    /**
     * @param $uuid
     * @param null $client
     *
     * @return Subscription
     */
    public static function get($uuid, $client = null)
    {
        return Base::_get(self::uriForSubscription($uuid), $client);
    }

    public function create()
    {
        $this->_save(Client::POST, Client::PATH_SUBSCRIPTIONS);
    }

    public function preview()
    {
        if ($this->uuid) {
            $this->_save(Client::POST, $this->uri().'/preview');
        } else {
            $this->_save(Client::POST, Client::PATH_SUBSCRIPTIONS.'/preview');
        }
    }

    /**
     * Cancel the subscription; it will remain active until it renews.
     */
    public function cancel()
    {
        $this->_save(Client::PUT, $this->uri().'/cancel');
    }

    /**
     * Reactivate a canceled subscription. The subscription will return back to the active,
     * auto renewing state.
     */
    public function reactivate()
    {
        $this->_save(Client::PUT, $this->uri().'/reactivate');
    }

    /**
     * Make an update that takes effect immediately.
     */
    public function updateImmediately()
    {
        $this->timeframe = 'now';
        $this->_save(Client::PUT, $this->uri());
    }

    /**
     * Make an update that applies when the subscription renews.
     */
    public function updateAtRenewal()
    {
        $this->timeframe = 'renewal';
        $this->_save(Client::PUT, $this->uri());
    }

    /**
     * Terminate the subscription immediately and issue a full refund of the last renewal.
     */
    public function terminateAndRefund()
    {
        $this->terminate('full');
    }

    /**
     * Terminate the subscription immediately and issue a prorated/partial refund of the last renewal.
     */
    public function terminateAndPartialRefund()
    {
        $this->terminate('partial');
    }

    /**
     * Terminate the subscription immediately without a refund.
     */
    public function terminateWithoutRefund()
    {
        $this->terminate('none');
    }

    private function terminate($refundType)
    {
        $this->_save(Client::PUT, $this->uri().'/terminate?refund='.$refundType);
    }

    /**
     * Postpone a subscription's renewal date.
     *
     * @param string ISO8601 DateTime String, postpone the subscription to this date
     * @param bool bulk is for making bulk updates, setting to true bypasses api check for accidental duplicate subscriptions.
     **/
    public function postpone($nextRenewalDate, $bulk = false)
    {
        $this->_save(Client::PUT,
            $this->uri().'/postpone?next_renewal_date='.$nextRenewalDate.'&bulk='.((bool) $bulk));
    }

    /**
     * Updates the notes fields of the subscription without generating a SubscriptionChange.
     *
     * @param array of notes, allowed keys: (customer_notes, terms_and_conditions, vat_reverse_charge_notes)
     **/
    public function updateNotes($notes)
    {
        $this->setValues($notes)->_save(Client::PUT, $this->uri().'/notes');
    }

    protected function uri()
    {
        if (!empty($this->_href)) {
            return $this->getHref();
        } else {
            if (!empty($this->uuid)) {
                return self::uriForSubscription($this->uuid);
            } else {
                throw new Error('Subscription UUID not specified');
            }
        }
    }

    protected static function uriForSubscription($uuid)
    {
        return Client::PATH_SUBSCRIPTIONS.'/'.rawurlencode($uuid);
    }

    protected function getNodeName()
    {
        return 'subscription';
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

Subscription::init();
