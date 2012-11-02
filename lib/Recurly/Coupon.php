<?php

namespace Recurly;

use Recurly\Errors\Error;

class Coupon extends Resource
{
    protected static $_writeableAttributes;
    protected static $_updatableAttributes;
    protected $_redeemUrl;

    public function __construct($href = null, $client = null)
    {
        parent::__construct($href, $client);
        $this->discount_in_cents = new CurrencyList('discount_in_cents');
    }

    public static function init()
    {
        self::$_writeableAttributes = array(
            'coupon_code',
            'name',
            'discount_type',
            'redeem_by_date',
            'single_use',
            'applies_for_months',
            'duration',
            'temporal_unit',
            'temporal_amount',
            'max_redemptions',
            'applies_to_all_plans',
            'discount_percent',
            'discount_in_cents',
            'plan_codes',
            'hosted_description',
            'invoice_description',
            'applies_to_non_plan_charges',
            'redemption_resource',
            'max_redemptions_per_account',
            'coupon_type',
            'unique_code_template',
            'unique_coupon_codes',
        );
        self::$_updatableAttributes = array(
            'name',
            'max_redemptions',
            'max_redemptions_per_account',
            'hosted_description',
            'invoice_description',
            'redeem_by_date',
        );
    }

    public static function get($couponCode, $client = null)
    {
        return Base::_get(self::uriForCoupon($couponCode), $client);
    }

    public function create()
    {
        $this->_save(Client::POST, Client::PATH_COUPONS);
    }

    public function redeemCoupon($accountCode, $currency, $subscriptionUUID = null)
    {
        if ($this->state != 'redeemable') {
            throw new Error('Coupon is not redeemable.');
        }

        $redemption = new CouponRedemption(null, $this->_client);
        $redemption->account_code = $accountCode;
        $redemption->currency = $currency;
        $redemption->subscription_uuid = $subscriptionUUID;

        foreach ($this->_links as $link) {
            if ($link->name == 'redeem') {
                $redemption->_save(strtoupper($link->method), $link->href);

                return $redemption;
            }
        }
    }

    public function update()
    {
        $this->_save(Client::PUT, $this->uri(), $this->createUpdateXML());
    }

    public function restore()
    {
        $this->_save(Client::PUT, $this->uri().'/restore', $this->createUpdateXML());
    }

    public function delete()
    {
        return Base::_delete($this->uri(), $this->_client);
    }

    public static function deleteCoupon($couponCode, $client = null)
    {
        return Base::_delete(self::uriForCoupon($couponCode), $client);
    }

    // generates the xml needed for a coupon update
    // only uses the updateable attributes
    public function createUpdateXML()
    {
        $doc = $this->createDocument();

        $root = $doc->appendChild($doc->createElement($this->getNodeName()));

        foreach ($this->getUpdatableAttributes() as $attr) {
            $val = $this->$attr;

            if ($val instanceof \DateTime) {
                $val = $val->format('c');
            }

            $root->appendChild($doc->createElement($attr, $val));
        }

        return $this->renderXML($doc);
    }

    public function generate($number)
    {
        $doc = $this->createDocument();

        $root = $doc->appendChild($doc->createElement($this->getNodeName()));
        $root->appendChild($doc->createElement('number_of_unique_codes', $number));

        $response = $this->_client->request(Client::POST, $this->uri().'/generate', $this->renderXML($doc));
        $response->assertValidResponse();

        $coupons = array();
        foreach (new UniqueCouponCodeList($response->headers['Location'], $this->_client) as $coupon) {
            $coupons[] = $coupon;
            if (count($coupons) == $number) {
                break;
            }
        }

        return $coupons;
    }

    protected function uri()
    {
        if (!empty($this->_href)) {
            return $this->getHref();
        } else {
            return self::uriForCoupon($this->coupon_code);
        }
    }

    protected static function uriForCoupon($couponCode)
    {
        return Client::PATH_COUPONS.'/'.rawurlencode($couponCode);
    }

    protected function getNodeName()
    {
        return 'coupon';
    }

    protected function getWriteableAttributes()
    {
        return self::$_writeableAttributes;
    }

    protected function getUpdatableAttributes()
    {
        return self::$_updatableAttributes;
    }

    protected function getRequiredAttributes()
    {
        return array();
    }
}

Coupon::init();
