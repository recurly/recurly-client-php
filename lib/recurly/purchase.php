<?php
/**
 * Class Recurly_Purchase
 * @property Recurly_Account $account The account for the purchase. Can create an account or use existing.
 * @property Recurly_Adjustment[] $adjustments The array of adjustments for the purchase.
 * @property string $collection_method The invoice collection method ('automatic' or 'manual').
 * @property string $billing_info_uuid The uuid to indicate which billing info to use from wallet.
 * @property string $currency The currency to use in this invoice.
 * @property string $po_number The po number for the invoice.
 * @property integer $net_terms The net terms of the invoice.
 * @property string $net_terms_type The net terms type of the invoice. accepted_values: "net", "eom".
 * @property string[] $coupon_codes An array of coupon codes to apply to the purchase.
 * @property Recurly_Subscription[] $subscriptions An array of subscriptions to apply to the purchase.
 * @property Recurly_GiftCard $gift_card A gift card to apply to the purchase.
 * @property string $customer_notes Optional notes field. This will default to the Customer Notes text specified on the Invoice Settings page in your Recurly admin. Custom notes made on an invoice for a one time charge will not carry over to subsequent invoices.
 * @property string $terms_and_conditions Optional Terms and Conditions field. This will default to the Terms and Conditions text specified on the Invoice Settings page in your Recurly admin. Custom notes will stay with a subscription on all renewals.
 * @property string $vat_reverse_charge_notes Optional VAT Reverse Charge Notes only appear if you have EU VAT enabled or are using your own Avalara AvaTax account and the customer is in the EU, has a VAT number, and is in a different country than your own. This will default to the VAT Reverse Charge Notes text specified on the Tax Settings page in your Recurly admin, unless custom notes were created with the original subscription. Custom notes will stay with a subscription on all renewals.
 * @property Recurly_ShippingAddress $shipping_address Optional Shipping Address field
 * @property integer $shipping_address_id Optional id of an existing ShippingAddress to be applied to all subscriptions and adjustments in purchase.
 * @property string $gateway_code Optional base36 encoded id for the gateway you wish to use for this transaction.
 * @property Recurly_ShippingFee[] $shipping_fees Optional array of shipping fees to apply to the purchase.
 * @property string $transaction_type Indicates type of resulting transaction. accepted_values: "moto".
 */
class Recurly_Purchase extends Recurly_Resource
{
  /**
   * Send the purchase data to the server and creates an invoice.
   *
   * @param $purchase Recurly_Purchase Our purchase data.
   * @param Recurly_Client $client Optional client for the request, useful for mocking the client
   * @return object Recurly_InvoiceCollection
   * @throws Recurly_Error
   */
  public static function invoice($purchase, $client = null) {
    return Recurly_Base::_post('/purchases', $purchase->xml(), $client);
  }

  /**
   * Send the purchase data to the server and create a preview invoice. This runs
   * the validations but not the transactions.
   *
   * @param $purchase Recurly_Purchase Our purchase data.
   * @param Recurly_Client $client Optional client for the request, useful for mocking the client
   * @return object Recurly_InvoiceCollection
   * @throws Recurly_Error
   */
  public static function preview($purchase, $client = null) {
    return Recurly_Base::_post('/purchases/preview', $purchase->xml(), $client);
  }

  /**
   * Send the purchase data to the server and create an authorized purchase. This runs
   * the validations but not the transactions. This endpoint will create a
   * pending purchase that can be activated at a later time once payment
   * has been completed on an external source (e.g. Adyen's Hosted
   * Payment Pages).
   *
   * @param $purchase Recurly_Purchase Our purchase data.
   * @param Recurly_Client $client Optional client for the request, useful for mocking the client
   * @return object Recurly_InvoiceCollection
   * @throws Recurly_Error
   *
   * Note: To use this endpoint, you may have to contact Recurly support to have it enabled on your subdomain.
   */
  public static function authorize($purchase, $client = null) {
    return Recurly_Base::_post('/purchases/authorize', $purchase->xml(), $client);
  }

  /**
   * Capture an open Authorization request
   *
   * @param $transactionUUID string To get this uuid, do something like: $invoiceCollection->charge_invoice->transactions->current()->uuid;.
   * @param Recurly_Client $client Optional client for the request, useful for mocking the client
   * @return object Recurly_InvoiceCollection
   * @throws Recurly_Error
   *
   * Note: To use this endpoint, you may have to contact Recurly support to have it enabled on your subdomain.
   */
  public static function capture($transactionUUID, $client = null) {
    return Recurly_Base::_post('/purchases/transaction-uuid-' . rawurlencode($transactionUUID) . '/capture', null, $client);
  }

  /**
   * Cancel an open Authorization request
   *
   * @param $transactionUUID string To get this uuid, do something like: $invoiceCollection->charge_invoice->transactions->current()->uuid;.
   * @param Recurly_Client $client Optional client for the request, useful for mocking the client
   * @return object Recurly_InvoiceCollection
   * @throws Recurly_Error
   *
   * Note: To use this endpoint, you may have to contact Recurly support to have it enabled on your subdomain.
   */
  public static function cancel($transactionUUID, $client = null) {
    return Recurly_Base::_post('/purchases/transaction-uuid-' . rawurlencode($transactionUUID) . '/cancel', null, $client);
  }

  /**
   * Use for Adyen HPP transaction requests. This runs
   * the validations but not the transactions.
   *
   * @param $purchase Recurly_Purchase Our purchase data.
   * @param Recurly_Client $client Optional client for the request, useful for mocking the client
   * @return object Recurly_InvoiceCollection
   * @throws Recurly_Error
   */
  public static function pending($purchase, $client = null) {
    return Recurly_Base::_post('/purchases/pending', $purchase->xml(), $client);
  }

  public function __construct($href = null, $client = null) {
    parent::__construct($href, $client);
    $this->adjustments = array();
  }

  protected function getNodeName() {
    return 'purchase';
  }
  protected function getWriteableAttributes() {
    return array(
      'account', 'adjustments', 'billing_info_uuid', 'collection_method', 'currency', 'po_number',
      'net_terms', 'net_terms_type', 'subscriptions', 'gift_card', 'coupon_codes', 'customer_notes',
      'terms_and_conditions', 'vat_reverse_charge_notes', 'shipping_address', 'shipping_address_id',
      'gateway_code', 'shipping_fees', 'transaction_type'
    );
  }
}
