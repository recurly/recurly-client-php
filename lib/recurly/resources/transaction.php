<?php
/**
 * This file is automatically created by Recurly's OpenAPI generation process
 * and thus any edits you make by hand will be lost. If you wish to make a
 * change to this file, please create a Github issue explaining the changes you
 * need and we will usher them to the appropriate places.
 */
namespace Recurly\Resources;

use Recurly\RecurlyResource;

// phpcs:disable
class Transaction extends RecurlyResource
{
        private $_account;
        private $_amount;
        private $_avs_check;
        private $_billing_address;
        private $_collected_at;
        private $_collection_method;
        private $_created_at;
        private $_currency;
        private $_customer_message;
        private $_customer_message_locale;
        private $_cvv_check;
        private $_gateway_approval_code;
        private $_gateway_message;
        private $_gateway_reference;
        private $_gateway_response_code;
        private $_gateway_response_time;
        private $_gateway_response_values;
        private $_id;
        private $_invoice;
        private $_ip_address_country;
        private $_ip_address_v4;
        private $_object;
        private $_origin;
        private $_original_transaction_id;
        private $_payment_gateway;
        private $_payment_method;
        private $_refunded;
        private $_status;
        private $_status_code;
        private $_status_message;
        private $_subscription_ids;
        private $_success;
        private $_type;
        private $_uuid;
        private $_voided_at;
        private $_voided_by_invoice;
    
    
    /**
    * Getter method for the account attribute.
    *
    * @return \Recurly\Resources\AccountMini Account mini details
    */
    public function getAccount(): \Recurly\Resources\AccountMini
    {
        return $this->_account;
    }

    /**
    * Setter method for the account attribute.
    *
    * @param \Recurly\Resources\AccountMini $account
    *
    * @return void
    */
    public function setAccount(\Recurly\Resources\AccountMini $value): void
    {
        $this->_account = $value;
    }

    /**
    * Getter method for the amount attribute.
    *
    * @return float Total transaction amount sent to the payment gateway.
    */
    public function getAmount(): float
    {
        return $this->_amount;
    }

    /**
    * Setter method for the amount attribute.
    *
    * @param float $amount
    *
    * @return void
    */
    public function setAmount(float $value): void
    {
        $this->_amount = $value;
    }

    /**
    * Getter method for the avs_check attribute.
    *
    * @return string When processed, result from checking the overall AVS on the transaction.
    */
    public function getAvsCheck(): string
    {
        return $this->_avs_check;
    }

    /**
    * Setter method for the avs_check attribute.
    *
    * @param string $avs_check
    *
    * @return void
    */
    public function setAvsCheck(string $value): void
    {
        $this->_avs_check = $value;
    }

    /**
    * Getter method for the billing_address attribute.
    *
    * @return \Recurly\Resources\Address 
    */
    public function getBillingAddress(): \Recurly\Resources\Address
    {
        return $this->_billing_address;
    }

    /**
    * Setter method for the billing_address attribute.
    *
    * @param \Recurly\Resources\Address $billing_address
    *
    * @return void
    */
    public function setBillingAddress(\Recurly\Resources\Address $value): void
    {
        $this->_billing_address = $value;
    }

    /**
    * Getter method for the collected_at attribute.
    *
    * @return string Collected at, or if not collected yet, the time the transaction was created.
    */
    public function getCollectedAt(): string
    {
        return $this->_collected_at;
    }

    /**
    * Setter method for the collected_at attribute.
    *
    * @param string $collected_at
    *
    * @return void
    */
    public function setCollectedAt(string $value): void
    {
        $this->_collected_at = $value;
    }

    /**
    * Getter method for the collection_method attribute.
    *
    * @return string The method by which the payment was collected.
    */
    public function getCollectionMethod(): string
    {
        return $this->_collection_method;
    }

    /**
    * Setter method for the collection_method attribute.
    *
    * @param string $collection_method
    *
    * @return void
    */
    public function setCollectionMethod(string $value): void
    {
        $this->_collection_method = $value;
    }

    /**
    * Getter method for the created_at attribute.
    *
    * @return string Created at
    */
    public function getCreatedAt(): string
    {
        return $this->_created_at;
    }

    /**
    * Setter method for the created_at attribute.
    *
    * @param string $created_at
    *
    * @return void
    */
    public function setCreatedAt(string $value): void
    {
        $this->_created_at = $value;
    }

    /**
    * Getter method for the currency attribute.
    *
    * @return string 3-letter ISO 4217 currency code.
    */
    public function getCurrency(): string
    {
        return $this->_currency;
    }

    /**
    * Setter method for the currency attribute.
    *
    * @param string $currency
    *
    * @return void
    */
    public function setCurrency(string $value): void
    {
        $this->_currency = $value;
    }

    /**
    * Getter method for the customer_message attribute.
    *
    * @return string For declined (`success=false`) transactions, the message displayed to the customer.
    */
    public function getCustomerMessage(): string
    {
        return $this->_customer_message;
    }

    /**
    * Setter method for the customer_message attribute.
    *
    * @param string $customer_message
    *
    * @return void
    */
    public function setCustomerMessage(string $value): void
    {
        $this->_customer_message = $value;
    }

    /**
    * Getter method for the customer_message_locale attribute.
    *
    * @return string Language code for the message
    */
    public function getCustomerMessageLocale(): string
    {
        return $this->_customer_message_locale;
    }

    /**
    * Setter method for the customer_message_locale attribute.
    *
    * @param string $customer_message_locale
    *
    * @return void
    */
    public function setCustomerMessageLocale(string $value): void
    {
        $this->_customer_message_locale = $value;
    }

    /**
    * Getter method for the cvv_check attribute.
    *
    * @return string When processed, result from checking the CVV/CVC value on the transaction.
    */
    public function getCvvCheck(): string
    {
        return $this->_cvv_check;
    }

    /**
    * Setter method for the cvv_check attribute.
    *
    * @param string $cvv_check
    *
    * @return void
    */
    public function setCvvCheck(string $value): void
    {
        $this->_cvv_check = $value;
    }

    /**
    * Getter method for the gateway_approval_code attribute.
    *
    * @return string Transaction approval code from the payment gateway.
    */
    public function getGatewayApprovalCode(): string
    {
        return $this->_gateway_approval_code;
    }

    /**
    * Setter method for the gateway_approval_code attribute.
    *
    * @param string $gateway_approval_code
    *
    * @return void
    */
    public function setGatewayApprovalCode(string $value): void
    {
        $this->_gateway_approval_code = $value;
    }

    /**
    * Getter method for the gateway_message attribute.
    *
    * @return string Transaction message from the payment gateway.
    */
    public function getGatewayMessage(): string
    {
        return $this->_gateway_message;
    }

    /**
    * Setter method for the gateway_message attribute.
    *
    * @param string $gateway_message
    *
    * @return void
    */
    public function setGatewayMessage(string $value): void
    {
        $this->_gateway_message = $value;
    }

    /**
    * Getter method for the gateway_reference attribute.
    *
    * @return string Transaction reference number from the payment gateway.
    */
    public function getGatewayReference(): string
    {
        return $this->_gateway_reference;
    }

    /**
    * Setter method for the gateway_reference attribute.
    *
    * @param string $gateway_reference
    *
    * @return void
    */
    public function setGatewayReference(string $value): void
    {
        $this->_gateway_reference = $value;
    }

    /**
    * Getter method for the gateway_response_code attribute.
    *
    * @return string For declined transactions (`success=false`), this field lists the gateway error code.
    */
    public function getGatewayResponseCode(): string
    {
        return $this->_gateway_response_code;
    }

    /**
    * Setter method for the gateway_response_code attribute.
    *
    * @param string $gateway_response_code
    *
    * @return void
    */
    public function setGatewayResponseCode(string $value): void
    {
        $this->_gateway_response_code = $value;
    }

    /**
    * Getter method for the gateway_response_time attribute.
    *
    * @return float Time, in seconds, for gateway to process the transaction.
    */
    public function getGatewayResponseTime(): float
    {
        return $this->_gateway_response_time;
    }

    /**
    * Setter method for the gateway_response_time attribute.
    *
    * @param float $gateway_response_time
    *
    * @return void
    */
    public function setGatewayResponseTime(float $value): void
    {
        $this->_gateway_response_time = $value;
    }

    /**
    * Getter method for the gateway_response_values attribute.
    *
    * @return Map The values in this field will vary from gateway to gateway.
    */
    public function getGatewayResponseValues(): Map
    {
        return $this->_gateway_response_values;
    }

    /**
    * Setter method for the gateway_response_values attribute.
    *
    * @param Map $gateway_response_values
    *
    * @return void
    */
    public function setGatewayResponseValues(Map $value): void
    {
        $this->_gateway_response_values = $value;
    }

    /**
    * Getter method for the id attribute.
    *
    * @return string Transaction ID
    */
    public function getId(): string
    {
        return $this->_id;
    }

    /**
    * Setter method for the id attribute.
    *
    * @param string $id
    *
    * @return void
    */
    public function setId(string $value): void
    {
        $this->_id = $value;
    }

    /**
    * Getter method for the invoice attribute.
    *
    * @return \Recurly\Resources\InvoiceMini Invoice mini details
    */
    public function getInvoice(): \Recurly\Resources\InvoiceMini
    {
        return $this->_invoice;
    }

    /**
    * Setter method for the invoice attribute.
    *
    * @param \Recurly\Resources\InvoiceMini $invoice
    *
    * @return void
    */
    public function setInvoice(\Recurly\Resources\InvoiceMini $value): void
    {
        $this->_invoice = $value;
    }

    /**
    * Getter method for the ip_address_country attribute.
    *
    * @return string IP address's country
    */
    public function getIpAddressCountry(): string
    {
        return $this->_ip_address_country;
    }

    /**
    * Setter method for the ip_address_country attribute.
    *
    * @param string $ip_address_country
    *
    * @return void
    */
    public function setIpAddressCountry(string $value): void
    {
        $this->_ip_address_country = $value;
    }

    /**
    * Getter method for the ip_address_v4 attribute.
    *
    * @return string IP address provided when the billing information was collected:

- When the customer enters billing information into the Recurly.js or Hosted Payment Pages, Recurly records the IP address.
- When the merchant enters billing information using the API, the merchant may provide an IP address.
- When the merchant enters billing information using the UI, no IP address is recorded.

    */
    public function getIpAddressV4(): string
    {
        return $this->_ip_address_v4;
    }

    /**
    * Setter method for the ip_address_v4 attribute.
    *
    * @param string $ip_address_v4
    *
    * @return void
    */
    public function setIpAddressV4(string $value): void
    {
        $this->_ip_address_v4 = $value;
    }

    /**
    * Getter method for the object attribute.
    *
    * @return string Object type
    */
    public function getObject(): string
    {
        return $this->_object;
    }

    /**
    * Setter method for the object attribute.
    *
    * @param string $object
    *
    * @return void
    */
    public function setObject(string $value): void
    {
        $this->_object = $value;
    }

    /**
    * Getter method for the origin attribute.
    *
    * @return string Describes how the transaction was triggered.
    */
    public function getOrigin(): string
    {
        return $this->_origin;
    }

    /**
    * Setter method for the origin attribute.
    *
    * @param string $origin
    *
    * @return void
    */
    public function setOrigin(string $value): void
    {
        $this->_origin = $value;
    }

    /**
    * Getter method for the original_transaction_id attribute.
    *
    * @return string If this transaction is a refund (`type=refund`), this will be the ID of the original transaction on the invoice being refunded.
    */
    public function getOriginalTransactionId(): string
    {
        return $this->_original_transaction_id;
    }

    /**
    * Setter method for the original_transaction_id attribute.
    *
    * @param string $original_transaction_id
    *
    * @return void
    */
    public function setOriginalTransactionId(string $value): void
    {
        $this->_original_transaction_id = $value;
    }

    /**
    * Getter method for the payment_gateway attribute.
    *
    * @return \Recurly\Resources\TransactionPaymentGateway 
    */
    public function getPaymentGateway(): \Recurly\Resources\TransactionPaymentGateway
    {
        return $this->_payment_gateway;
    }

    /**
    * Setter method for the payment_gateway attribute.
    *
    * @param \Recurly\Resources\TransactionPaymentGateway $payment_gateway
    *
    * @return void
    */
    public function setPaymentGateway(\Recurly\Resources\TransactionPaymentGateway $value): void
    {
        $this->_payment_gateway = $value;
    }

    /**
    * Getter method for the payment_method attribute.
    *
    * @return \Recurly\Resources\PaymentMethod 
    */
    public function getPaymentMethod(): \Recurly\Resources\PaymentMethod
    {
        return $this->_payment_method;
    }

    /**
    * Setter method for the payment_method attribute.
    *
    * @param \Recurly\Resources\PaymentMethod $payment_method
    *
    * @return void
    */
    public function setPaymentMethod(\Recurly\Resources\PaymentMethod $value): void
    {
        $this->_payment_method = $value;
    }

    /**
    * Getter method for the refunded attribute.
    *
    * @return bool Indicates if part or all of this transaction was refunded.
    */
    public function getRefunded(): bool
    {
        return $this->_refunded;
    }

    /**
    * Setter method for the refunded attribute.
    *
    * @param bool $refunded
    *
    * @return void
    */
    public function setRefunded(bool $value): void
    {
        $this->_refunded = $value;
    }

    /**
    * Getter method for the status attribute.
    *
    * @return string The current transaction status. Note that the status may change, e.g. a `pending` transaction may become `declined` or `success` may later become `void`.
    */
    public function getStatus(): string
    {
        return $this->_status;
    }

    /**
    * Setter method for the status attribute.
    *
    * @param string $status
    *
    * @return void
    */
    public function setStatus(string $value): void
    {
        $this->_status = $value;
    }

    /**
    * Getter method for the status_code attribute.
    *
    * @return string Status code
    */
    public function getStatusCode(): string
    {
        return $this->_status_code;
    }

    /**
    * Setter method for the status_code attribute.
    *
    * @param string $status_code
    *
    * @return void
    */
    public function setStatusCode(string $value): void
    {
        $this->_status_code = $value;
    }

    /**
    * Getter method for the status_message attribute.
    *
    * @return string For declined (`success=false`) transactions, the message displayed to the merchant.
    */
    public function getStatusMessage(): string
    {
        return $this->_status_message;
    }

    /**
    * Setter method for the status_message attribute.
    *
    * @param string $status_message
    *
    * @return void
    */
    public function setStatusMessage(string $value): void
    {
        $this->_status_message = $value;
    }

    /**
    * Getter method for the subscription_ids attribute.
    *
    * @return array If the transaction is charging or refunding for one or more subscriptions, these are their IDs.
    */
    public function getSubscriptionIds(): array
    {
        return $this->_subscription_ids;
    }

    /**
    * Setter method for the subscription_ids attribute.
    *
    * @param array $subscription_ids
    *
    * @return void
    */
    public function setSubscriptionIds(array $value): void
    {
        $this->_subscription_ids = $value;
    }

    /**
    * Getter method for the success attribute.
    *
    * @return bool Did this transaction complete successfully?
    */
    public function getSuccess(): bool
    {
        return $this->_success;
    }

    /**
    * Setter method for the success attribute.
    *
    * @param bool $success
    *
    * @return void
    */
    public function setSuccess(bool $value): void
    {
        $this->_success = $value;
    }

    /**
    * Getter method for the type attribute.
    *
    * @return string - `authorization` – verifies billing information and places a hold on money in the customer's account.
- `capture` – captures funds held by an authorization and completes a purchase.
- `purchase` – combines the authorization and capture in one transaction.
- `refund` – returns all or a portion of the money collected in a previous transaction to the customer.
- `verify` – a $0 or $1 transaction used to verify billing information which is immediately voided.

    */
    public function getType(): string
    {
        return $this->_type;
    }

    /**
    * Setter method for the type attribute.
    *
    * @param string $type
    *
    * @return void
    */
    public function setType(string $value): void
    {
        $this->_type = $value;
    }

    /**
    * Getter method for the uuid attribute.
    *
    * @return string The UUID is useful for matching data with the CSV exports and building URLs into Recurly's UI.
    */
    public function getUuid(): string
    {
        return $this->_uuid;
    }

    /**
    * Setter method for the uuid attribute.
    *
    * @param string $uuid
    *
    * @return void
    */
    public function setUuid(string $value): void
    {
        $this->_uuid = $value;
    }

    /**
    * Getter method for the voided_at attribute.
    *
    * @return string Voided at
    */
    public function getVoidedAt(): string
    {
        return $this->_voided_at;
    }

    /**
    * Setter method for the voided_at attribute.
    *
    * @param string $voided_at
    *
    * @return void
    */
    public function setVoidedAt(string $value): void
    {
        $this->_voided_at = $value;
    }

    /**
    * Getter method for the voided_by_invoice attribute.
    *
    * @return \Recurly\Resources\InvoiceMini Invoice mini details
    */
    public function getVoidedByInvoice(): \Recurly\Resources\InvoiceMini
    {
        return $this->_voided_by_invoice;
    }

    /**
    * Setter method for the voided_by_invoice attribute.
    *
    * @param \Recurly\Resources\InvoiceMini $voided_by_invoice
    *
    * @return void
    */
    public function setVoidedByInvoice(\Recurly\Resources\InvoiceMini $value): void
    {
        $this->_voided_by_invoice = $value;
    }

    /**
     * The hintArrayType method will provide type hinting for setter methods that
     * have array parameters.
     * 
     * @param string $key The property to get teh type hint for.
     * 
     * @return string The class name of the expected array type.
     */
    public static function hintArrayType($key): string
    {
        $array_hints = array(
            'setSubscriptionIds' => 'string',
        );
        return $array_hints[$key];
    }

}