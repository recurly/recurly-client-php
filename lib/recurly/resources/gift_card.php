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
class GiftCard extends RecurlyResource
{
    private $_balance;
    private $_canceled_at;
    private $_created_at;
    private $_currency;
    private $_delivered_at;
    private $_delivery;
    private $_gifter_account_id;
    private $_id;
    private $_object;
    private $_product_code;
    private $_purchase_invoice_id;
    private $_recipient_account_id;
    private $_redeemed_at;
    private $_redemption_code;
    private $_redemption_invoice_id;
    private $_unit_amount;
    private $_updated_at;

    protected static $array_hints = [
    ];

    
    /**
    * Getter method for the balance attribute.
    * The remaining credit on the recipient account associated with this gift card. Only has a value once the gift card has been redeemed. Can be used to create gift card balance displays for your customers.
    *
    * @return ?float
    */
    public function getBalance(): ?float
    {
        return $this->_balance;
    }

    /**
    * Setter method for the balance attribute.
    *
    * @param float $balance
    *
    * @return void
    */
    public function setBalance(float $balance): void
    {
        $this->_balance = $balance;
    }

    /**
    * Getter method for the canceled_at attribute.
    * When the gift card was canceled.
    *
    * @return ?string
    */
    public function getCanceledAt(): ?string
    {
        return $this->_canceled_at;
    }

    /**
    * Setter method for the canceled_at attribute.
    *
    * @param string $canceled_at
    *
    * @return void
    */
    public function setCanceledAt(string $canceled_at): void
    {
        $this->_canceled_at = $canceled_at;
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
    * Getter method for the delivered_at attribute.
    * When the gift card was sent to the recipient by Recurly via email, if method was email and the "Gift Card Delivery" email template was enabled. This will be empty for post delivery or email delivery where the email template was disabled.
    *
    * @return ?string
    */
    public function getDeliveredAt(): ?string
    {
        return $this->_delivered_at;
    }

    /**
    * Setter method for the delivered_at attribute.
    *
    * @param string $delivered_at
    *
    * @return void
    */
    public function setDeliveredAt(string $delivered_at): void
    {
        $this->_delivered_at = $delivered_at;
    }

    /**
    * Getter method for the delivery attribute.
    * The delivery details for the gift card.
    *
    * @return ?\Recurly\Resources\GiftCardDelivery
    */
    public function getDelivery(): ?\Recurly\Resources\GiftCardDelivery
    {
        return $this->_delivery;
    }

    /**
    * Setter method for the delivery attribute.
    *
    * @param \Recurly\Resources\GiftCardDelivery $delivery
    *
    * @return void
    */
    public function setDelivery(\Recurly\Resources\GiftCardDelivery $delivery): void
    {
        $this->_delivery = $delivery;
    }

    /**
    * Getter method for the gifter_account_id attribute.
    * The ID of the account that purchased the gift card.
    *
    * @return ?string
    */
    public function getGifterAccountId(): ?string
    {
        return $this->_gifter_account_id;
    }

    /**
    * Setter method for the gifter_account_id attribute.
    *
    * @param string $gifter_account_id
    *
    * @return void
    */
    public function setGifterAccountId(string $gifter_account_id): void
    {
        $this->_gifter_account_id = $gifter_account_id;
    }

    /**
    * Getter method for the id attribute.
    * Gift card ID
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
    * Getter method for the product_code attribute.
    * The product code or SKU of the gift card product.
    *
    * @return ?string
    */
    public function getProductCode(): ?string
    {
        return $this->_product_code;
    }

    /**
    * Setter method for the product_code attribute.
    *
    * @param string $product_code
    *
    * @return void
    */
    public function setProductCode(string $product_code): void
    {
        $this->_product_code = $product_code;
    }

    /**
    * Getter method for the purchase_invoice_id attribute.
    * The ID of the invoice for the gift card purchase made by the gifter.
    *
    * @return ?string
    */
    public function getPurchaseInvoiceId(): ?string
    {
        return $this->_purchase_invoice_id;
    }

    /**
    * Setter method for the purchase_invoice_id attribute.
    *
    * @param string $purchase_invoice_id
    *
    * @return void
    */
    public function setPurchaseInvoiceId(string $purchase_invoice_id): void
    {
        $this->_purchase_invoice_id = $purchase_invoice_id;
    }

    /**
    * Getter method for the recipient_account_id attribute.
    * The ID of the account that redeemed the gift card redemption code.  Does not have a value until gift card is redeemed.
    *
    * @return ?string
    */
    public function getRecipientAccountId(): ?string
    {
        return $this->_recipient_account_id;
    }

    /**
    * Setter method for the recipient_account_id attribute.
    *
    * @param string $recipient_account_id
    *
    * @return void
    */
    public function setRecipientAccountId(string $recipient_account_id): void
    {
        $this->_recipient_account_id = $recipient_account_id;
    }

    /**
    * Getter method for the redeemed_at attribute.
    * When the gift card was redeemed by the recipient.
    *
    * @return ?string
    */
    public function getRedeemedAt(): ?string
    {
        return $this->_redeemed_at;
    }

    /**
    * Setter method for the redeemed_at attribute.
    *
    * @param string $redeemed_at
    *
    * @return void
    */
    public function setRedeemedAt(string $redeemed_at): void
    {
        $this->_redeemed_at = $redeemed_at;
    }

    /**
    * Getter method for the redemption_code attribute.
    * The unique redemption code for the gift card, generated by Recurly. Will be 16 characters, alphanumeric, displayed uppercase, but accepted in any case at redemption. Used by the recipient account to create a credit in the amount of the `unit_amount` on their account.
    *
    * @return ?string
    */
    public function getRedemptionCode(): ?string
    {
        return $this->_redemption_code;
    }

    /**
    * Setter method for the redemption_code attribute.
    *
    * @param string $redemption_code
    *
    * @return void
    */
    public function setRedemptionCode(string $redemption_code): void
    {
        $this->_redemption_code = $redemption_code;
    }

    /**
    * Getter method for the redemption_invoice_id attribute.
    * The ID of the invoice for the gift card redemption made by the recipient.  Does not have a value until gift card is redeemed.
    *
    * @return ?string
    */
    public function getRedemptionInvoiceId(): ?string
    {
        return $this->_redemption_invoice_id;
    }

    /**
    * Setter method for the redemption_invoice_id attribute.
    *
    * @param string $redemption_invoice_id
    *
    * @return void
    */
    public function setRedemptionInvoiceId(string $redemption_invoice_id): void
    {
        $this->_redemption_invoice_id = $redemption_invoice_id;
    }

    /**
    * Getter method for the unit_amount attribute.
    * The amount of the gift card, which is the amount of the charge to the gifter account and the amount of credit that is applied to the recipient account upon successful redemption.
    *
    * @return ?float
    */
    public function getUnitAmount(): ?float
    {
        return $this->_unit_amount;
    }

    /**
    * Setter method for the unit_amount attribute.
    *
    * @param float $unit_amount
    *
    * @return void
    */
    public function setUnitAmount(float $unit_amount): void
    {
        $this->_unit_amount = $unit_amount;
    }

    /**
    * Getter method for the updated_at attribute.
    * Last updated at
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
}