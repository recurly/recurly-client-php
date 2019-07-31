<?php
/**
 * class Recurly_CreditPayment
 * @property string $uuid The uuid of the credit payment.
 * @property string $currency The currency of the amount_in_cents.
 * @property int $amount_in_cents The amount of the credit payment.
 * @property DateTime $created_at
 * @property DateTime $updated_at
 * @property DateTime $voided_at
 * @property string $action The action the credit payment was created for
 * @property Recurly_Stub $original_invoice The original invoice for the credit payment
 * @property Recurly_Stub $applied_to_invoice The invoice on which this payment was applied
 * @property Recurly_Stub $original_credit_payment The reference of the original credit payment being refunded. Only shown if action = 'refund'
 * @property Recurly_Stub $refund_transaction The reference of the refund transaction that matches the refund credit payment. Only shown if action = 'refund'
 */
class Recurly_CreditPayment extends Recurly_Resource
{
  protected function getNodeName() {
    return 'credit_payment';
  }

  protected function getWriteableAttributes() {
   return array();
  }
}
