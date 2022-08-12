<?php

/**
 * so far this is doing basic, public operations that revolve around
 * converting a node into an associated object. it maybe be suited
 * for other operations, but maybe those should have their own
 * public::static class? maybe one that instantiates?
 */
class XmlTools
{
  /**
   * Mapping of XML node to PHP object name
   */
  static $CLASS_MAP = array(
    'account' => 'Recurly_Account',
    'account_acquisition' => 'Recurly_AccountAcquisition',
    'accounts' => 'Recurly_AccountList',
    'account_balance' => 'Recurly_AccountBalance',
    'address' => 'Recurly_Address',
    'add_on' => 'Recurly_Addon',
    'add_ons' => 'Recurly_AddonList',
    'adjustment' => 'Recurly_Adjustment',
    'adjustments' => 'Recurly_AdjustmentList',
    'balance_in_cents' => 'Recurly_CurrencyList',
    'billing_info' => 'Recurly_BillingInfo',
    'billing_infos' => 'Recurly_BillingInfoList',
    'coupon' => 'Recurly_Coupon',
    'unique_coupon_codes' => 'Recurly_UniqueCouponCodeList',
    'charge_invoice' => 'Recurly_Invoice',
    'credit_invoice' => 'Recurly_Invoice',
    'currency' => 'Recurly_Currency',
    'custom_fields' => 'Recurly_CustomFieldList',
    'custom_field' => 'Recurly_CustomField',
    'credit_invoices' => 'array',
    'credit_payment' => 'Recurly_CreditPayment',
    'credit_payments' => 'Recurly_CreditPaymentList',
    'details' => 'array',
    'discount_in_cents' => 'Recurly_CurrencyList',
    'delivery' => 'Recurly_Delivery',
    'dunning_campaign' => 'Recurly_DunningCampaign',
    'dunning_campaigns' => 'Recurly_DunningCampaignList',
    'dunning_cycle' => 'Recurly_DunningCycle',
    'dunning_cycles' => 'array',
    'error' => 'Recurly_FieldError',
    'errors' => 'Recurly_ErrorList',
    'export_date' => 'Recurly_ExportDate',
    'export_dates' => 'Recurly_ExportDateList',
    'export_file' => 'Recurly_ExportFile',
    'export_files' => 'Recurly_ExportFileList',
    'fraud' => 'Recurly_FraudInfo',
    'gift_card' => 'Recurly_GiftCard',
    'gift_cards' => 'Recurly_GiftCardList',
    'gifter_account' => 'Recurly_Account',
    'interval' => 'Recurly_DunningInterval',
    'intervals' => 'array',
    'invoice' => 'Recurly_Invoice',
    'invoices' => 'Recurly_InvoiceList',
    'invoice_collection' => 'Recurly_InvoiceCollection',
    'invoice_template' => 'Recurly_InvoiceTemplate',
    'invoice_templates' => 'Recurly_InvoiceTemplateList',
    'item' => 'Recurly_Item',
    'items' => 'Recurly_ItemList',
    'item_code' => 'string',
    'item_codes' => 'array',
    'line_items' => 'array',
    'measured_unit' => 'Recurly_MeasuredUnit',
    'measured_units' => 'Recurly_MeasuredUnitList',
    'note' => 'Recurly_Note',
    'notes' => 'Recurly_NoteList',
    'plan' => 'Recurly_Plan',
    'plans' => 'Recurly_PlanList',
    'plan_code' => 'string',
    'plan_codes' => 'array',
    'ramp_interval' => 'Recurly_RampInterval',
    'ramp_intervals' => 'array',
    'pending_subscription' => 'Recurly_Subscription',
    'processing_prepayment_balance_in_cents' => 'Recurly_CurrencyList',
    'redemption' => 'Recurly_CouponRedemption',
    'redemptions' => 'Recurly_CouponRedemptionList',
    'setup_fee_in_cents' => 'Recurly_CurrencyList',
    'shipping_address' => 'Recurly_ShippingAddress',
    'shipping_addresses' => 'Recurly_ShippingAddressList',
    'shipping_fee' => 'Recurly_ShippingFee',
    'shipping_method' => 'Recurly_ShippingMethod',
    'shipping_methods' => 'Recurly_ShippingMethodList',
    'subscription' => 'Recurly_Subscription',
    'subscriptions' => 'Recurly_SubscriptionList',
    'subscription_add_ons' => 'array',
    'subscription_add_on' => 'Recurly_SubscriptionAddOn',
    'tax_detail' => 'Recurly_Tax_Detail',
    'tax_details' => 'array',
    'tier' => 'Recurly_Tier',
    'tiers' => 'array',
    'percentage_tier' => 'Recurly_PercentageTier',
    'percentage_tiers' => 'array',
    'transaction' => 'Recurly_Transaction',
    'transactions' => 'Recurly_TransactionList',
    'transaction_error' => 'Recurly_TransactionError',
    'unit_amount_in_cents' => 'Recurly_CurrencyList',
    'usage' => 'Recurly_Usage',
    'usages' => 'Recurly_UsageList'
  );


  // @returns DOMDocument
  public static function createDocument($version = '1.0')
  {
    return new DOMDocument($version);
  }

  public static function getNodeTextContent($node)
  {
    $content = null;

    if (property_exists($node, 'wholeText')) {
      $content = $node->wholeText;
    } else if (property_exists($node, 'textContent')) {
      $content = $node->textContent;
    }

    return $content;
  }

  public static function getNodeValueFromTypeAttribute($node)
  {
    $nodeValue = null;
    $nodeType = $node->getAttribute('type');

    if (!$node->hasAttribute('nil')) {
      switch ($nodeType) {
        case 'boolean':
          $nodeValue = ($node->nodeValue == 'true');
          break;
        case 'date':
        case 'datetime':
          $nodeValue = new DateTime($node->nodeValue);
          break;
        case 'float':
          $nodeValue = (float)$node->nodeValue;
          break;
        case 'integer':
          $nodeValue = (int)$node->nodeValue;
          break;
        case 'array':
          $nodeValue = array();
          break;
        default:
          $nodeValue = $node->nodeValue;
      }
    }

    return $nodeValue;
  }

  // @returns string  The object, with all children, as a string.
  public static function renderXML($doc)
  {
    // To be able to consistently run tests across different XML libraries,
    // favor `<foo></foo>` over `<foo/>`.
    return $doc->saveXML(null, LIBXML_NOEMPTYTAG);
  }

  public static function parseNodeName($node)
  {
    return str_replace("-", "_", $node->nodeName);
  }

  public static function nodeToObject($node, $client)
  {
    $nodeName = self::parseNodeName($node);

    if (!array_key_exists($nodeName, self::$CLASS_MAP)) {
      return null; // Unknown element
    }

    $nodeClass = self::$CLASS_MAP[$nodeName];

    if ($nodeClass == 'array') {
      $newObj = array();
    } else if ($nodeClass == 'string') {
      $newObj = self::getNodeTextContent($node->firstChild);
    } else {
      $newObj = self::nodeToObjectFromCustomClass($node, $nodeClass, $client);
    }

    return $newObj;
  }


  // @return mixed
  private static function nodeToObjectFromCustomClass($node, $nodeClass, $client)
  {
    $nodeName = XmlTools::parseNodeName($node);
    $reflectionClass = new ReflectionClass($nodeClass);
    $newObj = null;

    if ($nodeClass == 'Recurly_CurrencyList') {
      $newObj = new $nodeClass($nodeName);
    } else if($nodeClass == 'Recurly_Tier') {
      $newObj = XmlTools::nodeToTierObject($node, $nodeClass);
    } else if($nodeClass == 'Recurly_RampInterval') {
      $newObj = Recurly_RampInterval::nodeToObject($node);
    } else if($nodeClass == 'Recurly_FieldError') {
      $newObj = XmlTools::nodeToErrorObject($node);
    } else if ($reflectionClass->isSubclassOf('Recurly_Base')) {
      $newObj = new $nodeClass(null, $client);
    } else {
      $newObj = new $nodeClass();
    }

    return $newObj;
  }

  // @returns Recurly_FieldError
  private static function nodeToErrorObject($node)
  {
    $error = new Recurly_FieldError();
    $error->field = $node->getAttribute('field');
    $error->symbol = $node->getAttribute('symbol');
    $error->description = self::getNodeTextContent($node->firstChild);

    return $error;
  }

  private static function nodeToTierObject($node, $nodeClass)
  {
    $nodeNames = array();

    foreach($node->childNodes as $nodeItem) {
      $nodeNames[] = $nodeItem->tagName;
    }

    if(empty(array_diff($nodeNames, ['ending_amount_in_cents', 'usage_percentage']))) {
      return new Recurly_CurrencyPercentageTier(XmlTools::parseNodeName($node));
    } else {
      return new $nodeClass();
    }
  }
}
