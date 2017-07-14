<?php
/**
 * Class Recurly_Purchase
 * @property Recurly_Account $account The account for the purchase. Can create an account or use existing.
 * @property Recurly_Adjustment[] $adjustments The array of adjustments for the purchase
 * @property string $collection_method The invoice collection method ('automatic' or 'manual')
 * @property string $currency The currency to use in this invoice
 * @property string $po_number The po number for the invoice
 * @property integer $net_terms The net terms of the invoice
 * @property string[] $coupon_codes An array of coupon codes to apply to the purchase
 * @property Recurly_Subscription[] $subscriptions An array of subscriptions to apply to the purchase
 * @property Recurly_GiftCard $gift_card A gift card to apply to the purchase
 */
class Recurly_Purchase extends Recurly_Resource
{
  /**
   * Send the purchase data to the server and creates an invoice.
   *
   * @param Recurly_Purchase Our purchase data.
   * @param RecurlyClient Optional client for the request, useful for mocking the client
   */
  public static function invoice($purchase, $client = null) {
    return Recurly_Base::_post('/purchases', $purchase->xml(), $client);
  }

  /**
   * Send the purchase data to the server and creates a preview invoice. This runs
   * the validations but not the transactions.
   *
   * @param Recurly_Purchase Our purchase data.
   * @param RecurlyClient Optional client for the request, useful for mocking the client
   */
  public static function preview($purchase, $client = null) {
    return Recurly_Base::_post('/purchases/preview', $purchase->xml(), $client);
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
      'account', 'adjustments', 'collection_method', 'currency', 'po_number',
      'net_terms', 'subscriptions', 'gift_card', 'coupon_codes'
    );
  }
}
