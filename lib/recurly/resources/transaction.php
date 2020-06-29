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
    private $_updated_at;
    private $_uuid;
    private $_voided_at;
    private $_voided_by_invoice;

    protected static $array_hints = array(
        'setSubscriptionIds' => 'string',
    );

    
    /**
    * Getter method for the account attribute.
    * Account mini details
    *
    * @return ?\Recurly\Resources\AccountMini
    */
    public function getAccount(): ?\Recurly\Resources\AccountMini
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
    public function setAccount(\Recurly\Resources\AccountMini $account): void
    {
        $this->_account = $account;
    }

    /**
    * Getter method for the amount attribute.
    * Total transaction amount sent to the payment gateway.
    *
    * @return ?float
    */
    public function getAmount(): ?float
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
    public function setAmount(float $amount): void
    {
        $this->_amount = $amount;
    }

    /**
    * Getter method for the avs_check attribute.
    * When processed, result from checking the overall AVS on the transaction.
    *
    * @return ?string
    */
    public function getAvsCheck(): ?string
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
    public function setAvsCheck(string $avs_check): void
    {
        $this->_avs_check = $avs_check;
    }

    /**
    * Getter method for the billing_address attribute.
    * 
    *
    * @return ?\Recurly\Resources\Address
    */
    public function getBillingAddress(): ?\Recurly\Resources\Address
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
    public function setBillingAddress(\Recurly\Resources\Address $billing_address): void
    {
        $this->_billing_address = $billing_address;
    }

    /**
    * Getter method for the collected_at attribute.
    * Collected at, or if not collected yet, the time the transaction was created.
    *
    * @return ?string
    */
    public function getCollectedAt(): ?string
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
    public function setCollectedAt(string $collected_at): void
    {
        $this->_collected_at = $collected_at;
    }

    /**
    * Getter method for the collection_method attribute.
    * The method by which the payment was collected.
    *
    * @return ?string
    */
    public function getCollectionMethod(): ?string
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
    public function setCollectionMethod(string $collection_method): void
    {
        $this->_collection_method = $collection_method;
    }

    /**
    * Getter method for the created_at attribute.
    * Created at
    *
    * @return ?string
    */
    public function getCreatedAt(): ?string
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
    public function setCreatedAt(string $created_at): void
    {
        $this->_created_at = $created_at;
    }

    /**
    * Getter method for the currency attribute.
    * 3-letter ISO 4217 currency code.
    *
    * @return ?string
    */
    public function getCurrency(): ?string
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
    public function setCurrency(string $currency): void
    {
        $this->_currency = $currency;
    }

    /**
    * Getter method for the customer_message attribute.
    * For declined (`success=false`) transactions, the message displayed to the customer.
    *
    * @return ?string
    */
    public function getCustomerMessage(): ?string
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
    public function setCustomerMessage(string $customer_message): void
    {
        $this->_customer_message = $customer_message;
    }

    /**
    * Getter method for the customer_message_locale attribute.
    * Language code for the message
    *
    * @return ?string
    */
    public function getCustomerMessageLocale(): ?string
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
    public function setCustomerMessageLocale(string $customer_message_locale): void
    {
        $this->_customer_message_locale = $customer_message_locale;
    }

    /**
    * Getter method for the cvv_check attribute.
    * When processed, result from checking the CVV/CVC value on the transaction.
    *
    * @return ?string
    */
    public function getCvvCheck(): ?string
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
    public function setCvvCheck(string $cvv_check): void
    {
        $this->_cvv_check = $cvv_check;
    }

    /**
    * Getter method for the gateway_approval_code attribute.
    * Transaction approval code from the payment gateway.
    *
    * @return ?string
    */
    public function getGatewayApprovalCode(): ?string
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
    public function setGatewayApprovalCode(string $gateway_approval_code): void
    {
        $this->_gateway_approval_code = $gateway_approval_code;
    }

    /**
    * Getter method for the gateway_message attribute.
    * Transaction message from the payment gateway.
    *
    * @return ?string
    */
    public function getGatewayMessage(): ?string
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
    public function setGatewayMessage(string $gateway_message): void
    {
        $this->_gateway_message = $gateway_message;
    }

    /**
    * Getter method for the gateway_reference attribute.
    * Transaction reference number from the payment gateway.
    *
    * @return ?string
    */
    public function getGatewayReference(): ?string
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
    public function setGatewayReference(string $gateway_reference): void
    {
        $this->_gateway_reference = $gateway_reference;
    }

    /**
    * Getter method for the gateway_response_code attribute.
    * For declined transactions (`success=false`), this field lists the gateway error code.
    *
    * @return ?string
    */
    public function getGatewayResponseCode(): ?string
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
    public function setGatewayResponseCode(string $gateway_response_code): void
    {
        $this->_gateway_response_code = $gateway_response_code;
    }

    /**
    * Getter method for the gateway_response_time attribute.
    * Time, in seconds, for gateway to process the transaction.
    *
    * @return ?float
    */
    public function getGatewayResponseTime(): ?float
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
    public function setGatewayResponseTime(float $gateway_response_time): void
    {
        $this->_gateway_response_time = $gateway_response_time;
    }

    /**
    * Getter method for the gateway_response_values attribute.
    * The values in this field will vary from gateway to gateway.
    *
    * @return ?object
    */
    public function getGatewayResponseValues(): ?object
    {
        return $this->_gateway_response_values;
    }

    /**
    * Setter method for the gateway_response_values attribute.
    *
    * @param object $gateway_response_values
    *
    * @return void
    */
    public function setGatewayResponseValues(object $gateway_response_values): void
    {
        $this->_gateway_response_values = $gateway_response_values;
    }

    /**
    * Getter method for the id attribute.
    * Transaction ID
    *
    * @return ?string
    */
    public function getId(): ?string
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
    public function setId(string $id): void
    {
        $this->_id = $id;
    }

    /**
    * Getter method for the invoice attribute.
    * Invoice mini details
    *
    * @return ?\Recurly\Resources\InvoiceMini
    */
    public function getInvoice(): ?\Recurly\Resources\InvoiceMini
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
    public function setInvoice(\Recurly\Resources\InvoiceMini $invoice): void
    {
        $this->_invoice = $invoice;
    }

    /**
    * Getter method for the ip_address_country attribute.
    * IP address's country
    *
    * @return ?string
    */
    public function getIpAddressCountry(): ?string
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
    public function setIpAddressCountry(string $ip_address_country): void
    {
        $this->_ip_address_country = $ip_address_country;
    }

    /**
    * Getter method for the ip_address_v4 attribute.
    * IP address provided when the billing information was collected:

- When the customer enters billing information into the Recurly.js or Hosted Payment Pages, Recurly records the IP address.
- When the merchant enters billing information using the API, the merchant may provide an IP address.
- When the merchant enters billing information using the UI, no IP address is recorded.

    *
    * @return ?string
    */
    public function getIpAddressV4(): ?string
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
    public function setIpAddressV4(string $ip_address_v4): void
    {
        $this->_ip_address_v4 = $ip_address_v4;
    }

    /**
    * Getter method for the object attribute.
    * Object type
    *
    * @return ?string
    */
    public function getObject(): ?string
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
    public function setObject(string $object): void
    {
        $this->_object = $object;
    }

    /**
    * Getter method for the origin attribute.
    * Describes how the transaction was triggered.
    *
    * @return ?string
    */
    public function getOrigin(): ?string
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
    public function setOrigin(string $origin): void
    {
        $this->_origin = $origin;
    }

    /**
    * Getter method for the original_transaction_id attribute.
    * If this transaction is a refund (`type=refund`), this will be the ID of the original transaction on the invoice being refunded.
    *
    * @return ?string
    */
    public function getOriginalTransactionId(): ?string
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
    public function setOriginalTransactionId(string $original_transaction_id): void
    {
        $this->_original_transaction_id = $original_transaction_id;
    }

    /**
    * Getter method for the payment_gateway attribute.
    * 
    *
    * @return ?\Recurly\Resources\TransactionPaymentGateway
    */
    public function getPaymentGateway(): ?\Recurly\Resources\TransactionPaymentGateway
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
    public function setPaymentGateway(\Recurly\Resources\TransactionPaymentGateway $payment_gateway): void
    {
        $this->_payment_gateway = $payment_gateway;
    }

    /**
    * Getter method for the payment_method attribute.
    * 
    *
    * @return ?\Recurly\Resources\PaymentMethod
    */
    public function getPaymentMethod(): ?\Recurly\Resources\PaymentMethod
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
    public function setPaymentMethod(\Recurly\Resources\PaymentMethod $payment_method): void
    {
        $this->_payment_method = $payment_method;
    }

    /**
    * Getter method for the refunded attribute.
    * Indicates if part or all of this transaction was refunded.
    *
    * @return ?bool
    */
    public function getRefunded(): ?bool
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
    public function setRefunded(bool $refunded): void
    {
        $this->_refunded = $refunded;
    }

    /**
    * Getter method for the status attribute.
    * The current transaction status. Note that the status may change, e.g. a `pending` transaction may become `declined` or `success` may later become `void`.
    *
    * @return ?string
    */
    public function getStatus(): ?string
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
    public function setStatus(string $status): void
    {
        $this->_status = $status;
    }

    /**
    * Getter method for the status_code attribute.
    * Status code
    *
    * @return ?string
    */
    public function getStatusCode(): ?string
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
    public function setStatusCode(string $status_code): void
    {
        $this->_status_code = $status_code;
    }

    /**
    * Getter method for the status_message attribute.
    * For declined (`success=false`) transactions, the message displayed to the merchant.
    *
    * @return ?string
    */
    public function getStatusMessage(): ?string
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
    public function setStatusMessage(string $status_message): void
    {
        $this->_status_message = $status_message;
    }

    /**
    * Getter method for the subscription_ids attribute.
    * If the transaction is charging or refunding for one or more subscriptions, these are their IDs.
    *
    * @return array
    */
    public function getSubscriptionIds(): array
    {
        return $this->_subscription_ids ?? [] ;
    }

    /**
    * Setter method for the subscription_ids attribute.
    *
    * @param array $subscription_ids
    *
    * @return void
    */
    public function setSubscriptionIds(array $subscription_ids): void
    {
        $this->_subscription_ids = $subscription_ids;
    }

    /**
    * Getter method for the success attribute.
    * Did this transaction complete successfully?
    *
    * @return ?bool
    */
    public function getSuccess(): ?bool
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
    public function setSuccess(bool $success): void
    {
        $this->_success = $success;
    }

    /**
    * Getter method for the type attribute.
    * - `authorization` – verifies billing information and places a hold on money in the customer's account.
- `capture` – captures funds held by an authorization and completes a purchase.
- `purchase` – combines the authorization and capture in one transaction.
- `refund` – returns all or a portion of the money collected in a previous transaction to the customer.
- `verify` – a $0 or $1 transaction used to verify billing information which is immediately voided.

    *
    * @return ?string
    */
    public function getType(): ?string
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
    public function setType(string $type): void
    {
        $this->_type = $type;
    }

    /**
    * Getter method for the updated_at attribute.
    * Updated at
    *
    * @return ?string
    */
    public function getUpdatedAt(): ?string
    {
        return $this->_updated_at;
    }

    /**
    * Setter method for the updated_at attribute.
    *
    * @param string $updated_at
    *
    * @return void
    */
    public function setUpdatedAt(string $updated_at): void
    {
        $this->_updated_at = $updated_at;
    }

    /**
    * Getter method for the uuid attribute.
    * The UUID is useful for matching data with the CSV exports and building URLs into Recurly's UI.
    *
    * @return ?string
    */
    public function getUuid(): ?string
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
    public function setUuid(string $uuid): void
    {
        $this->_uuid = $uuid;
    }

    /**
    * Getter method for the voided_at attribute.
    * Voided at
    *
    * @return ?string
    */
    public function getVoidedAt(): ?string
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
    public function setVoidedAt(string $voided_at): void
    {
        $this->_voided_at = $voided_at;
    }

    /**
    * Getter method for the voided_by_invoice attribute.
    * Invoice mini details
    *
    * @return ?\Recurly\Resources\InvoiceMini
    */
    public function getVoidedByInvoice(): ?\Recurly\Resources\InvoiceMini
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
    public function setVoidedByInvoice(\Recurly\Resources\InvoiceMini $voided_by_invoice): void
    {
        $this->_voided_by_invoice = $voided_by_invoice;
    }
}