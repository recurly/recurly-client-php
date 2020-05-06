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
class Account extends RecurlyResource
{
    private $_address;
    private $_bill_to;
    private $_billing_info;
    private $_cc_emails;
    private $_code;
    private $_company;
    private $_created_at;
    private $_custom_fields;
    private $_deleted_at;
    private $_email;
    private $_exemption_certificate;
    private $_first_name;
    private $_has_active_subscription;
    private $_has_canceled_subscription;
    private $_has_future_subscription;
    private $_has_live_subscription;
    private $_has_past_due_invoice;
    private $_has_paused_subscription;
    private $_hosted_login_token;
    private $_id;
    private $_last_name;
    private $_object;
    private $_parent_account_id;
    private $_preferred_locale;
    private $_shipping_addresses;
    private $_state;
    private $_tax_exempt;
    private $_updated_at;
    private $_username;
    private $_vat_number;

    protected static $array_hints = array(
        'setCustomFields' => '\Recurly\Resources\CustomField',
        'setShippingAddresses' => '\Recurly\Resources\ShippingAddress',
    );

    
    /**
    * Getter method for the address attribute.
    * 
    *
    * @return ?\Recurly\Resources\Address
    */
    public function getAddress(): ?\Recurly\Resources\Address
    {
        return $this->_address;
    }

    /**
    * Setter method for the address attribute.
    *
    * @param \Recurly\Resources\Address $address
    *
    * @return void
    */
    public function setAddress(\Recurly\Resources\Address $address): void
    {
        $this->_address = $address;
    }

    /**
    * Getter method for the bill_to attribute.
    * An enumerable describing the billing behavior of the account, specifically whether the account is self-paying or will rely on the parent account to pay.
    *
    * @return ?string
    */
    public function getBillTo(): ?string
    {
        return $this->_bill_to;
    }

    /**
    * Setter method for the bill_to attribute.
    *
    * @param string $bill_to
    *
    * @return void
    */
    public function setBillTo(string $bill_to): void
    {
        $this->_bill_to = $bill_to;
    }

    /**
    * Getter method for the billing_info attribute.
    * 
    *
    * @return ?\Recurly\Resources\BillingInfo
    */
    public function getBillingInfo(): ?\Recurly\Resources\BillingInfo
    {
        return $this->_billing_info;
    }

    /**
    * Setter method for the billing_info attribute.
    *
    * @param \Recurly\Resources\BillingInfo $billing_info
    *
    * @return void
    */
    public function setBillingInfo(\Recurly\Resources\BillingInfo $billing_info): void
    {
        $this->_billing_info = $billing_info;
    }

    /**
    * Getter method for the cc_emails attribute.
    * Additional email address that should receive account correspondence. These should be separated only by commas. These CC emails will receive all emails that the `email` field also receives.
    *
    * @return ?string
    */
    public function getCcEmails(): ?string
    {
        return $this->_cc_emails;
    }

    /**
    * Setter method for the cc_emails attribute.
    *
    * @param string $cc_emails
    *
    * @return void
    */
    public function setCcEmails(string $cc_emails): void
    {
        $this->_cc_emails = $cc_emails;
    }

    /**
    * Getter method for the code attribute.
    * The unique identifier of the account. This cannot be changed once the account is created.
    *
    * @return ?string
    */
    public function getCode(): ?string
    {
        return $this->_code;
    }

    /**
    * Setter method for the code attribute.
    *
    * @param string $code
    *
    * @return void
    */
    public function setCode(string $code): void
    {
        $this->_code = $code;
    }

    /**
    * Getter method for the company attribute.
    * 
    *
    * @return ?string
    */
    public function getCompany(): ?string
    {
        return $this->_company;
    }

    /**
    * Setter method for the company attribute.
    *
    * @param string $company
    *
    * @return void
    */
    public function setCompany(string $company): void
    {
        $this->_company = $company;
    }

    /**
    * Getter method for the created_at attribute.
    * When the account was created.
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
    * Getter method for the custom_fields attribute.
    * The custom fields will only be altered when they are included in a request. Sending an empty array will not remove any existing values. To remove a field send the name with a null or empty value.
    *
    * @return array
    */
    public function getCustomFields(): array
    {
        return $this->_custom_fields ?? [] ;
    }

    /**
    * Setter method for the custom_fields attribute.
    *
    * @param array $custom_fields
    *
    * @return void
    */
    public function setCustomFields(array $custom_fields): void
    {
        $this->_custom_fields = $custom_fields;
    }

    /**
    * Getter method for the deleted_at attribute.
    * If present, when the account was last marked inactive.
    *
    * @return ?string
    */
    public function getDeletedAt(): ?string
    {
        return $this->_deleted_at;
    }

    /**
    * Setter method for the deleted_at attribute.
    *
    * @param string $deleted_at
    *
    * @return void
    */
    public function setDeletedAt(string $deleted_at): void
    {
        $this->_deleted_at = $deleted_at;
    }

    /**
    * Getter method for the email attribute.
    * The email address used for communicating with this customer. The customer will also use this email address to log into your hosted account management pages. This value does not need to be unique.
    *
    * @return ?string
    */
    public function getEmail(): ?string
    {
        return $this->_email;
    }

    /**
    * Setter method for the email attribute.
    *
    * @param string $email
    *
    * @return void
    */
    public function setEmail(string $email): void
    {
        $this->_email = $email;
    }

    /**
    * Getter method for the exemption_certificate attribute.
    * The tax exemption certificate number for the account. If the merchant has an integration for the Vertex tax provider, this optional value will be sent in any tax calculation requests for the account.
    *
    * @return ?string
    */
    public function getExemptionCertificate(): ?string
    {
        return $this->_exemption_certificate;
    }

    /**
    * Setter method for the exemption_certificate attribute.
    *
    * @param string $exemption_certificate
    *
    * @return void
    */
    public function setExemptionCertificate(string $exemption_certificate): void
    {
        $this->_exemption_certificate = $exemption_certificate;
    }

    /**
    * Getter method for the first_name attribute.
    * 
    *
    * @return ?string
    */
    public function getFirstName(): ?string
    {
        return $this->_first_name;
    }

    /**
    * Setter method for the first_name attribute.
    *
    * @param string $first_name
    *
    * @return void
    */
    public function setFirstName(string $first_name): void
    {
        $this->_first_name = $first_name;
    }

    /**
    * Getter method for the has_active_subscription attribute.
    * Indicates if the account has an active subscription.
    *
    * @return ?bool
    */
    public function getHasActiveSubscription(): ?bool
    {
        return $this->_has_active_subscription;
    }

    /**
    * Setter method for the has_active_subscription attribute.
    *
    * @param bool $has_active_subscription
    *
    * @return void
    */
    public function setHasActiveSubscription(bool $has_active_subscription): void
    {
        $this->_has_active_subscription = $has_active_subscription;
    }

    /**
    * Getter method for the has_canceled_subscription attribute.
    * Indicates if the account has a canceled subscription.
    *
    * @return ?bool
    */
    public function getHasCanceledSubscription(): ?bool
    {
        return $this->_has_canceled_subscription;
    }

    /**
    * Setter method for the has_canceled_subscription attribute.
    *
    * @param bool $has_canceled_subscription
    *
    * @return void
    */
    public function setHasCanceledSubscription(bool $has_canceled_subscription): void
    {
        $this->_has_canceled_subscription = $has_canceled_subscription;
    }

    /**
    * Getter method for the has_future_subscription attribute.
    * Indicates if the account has a future subscription.
    *
    * @return ?bool
    */
    public function getHasFutureSubscription(): ?bool
    {
        return $this->_has_future_subscription;
    }

    /**
    * Setter method for the has_future_subscription attribute.
    *
    * @param bool $has_future_subscription
    *
    * @return void
    */
    public function setHasFutureSubscription(bool $has_future_subscription): void
    {
        $this->_has_future_subscription = $has_future_subscription;
    }

    /**
    * Getter method for the has_live_subscription attribute.
    * Indicates if the account has a subscription that is either active, canceled, future, or paused.
    *
    * @return ?bool
    */
    public function getHasLiveSubscription(): ?bool
    {
        return $this->_has_live_subscription;
    }

    /**
    * Setter method for the has_live_subscription attribute.
    *
    * @param bool $has_live_subscription
    *
    * @return void
    */
    public function setHasLiveSubscription(bool $has_live_subscription): void
    {
        $this->_has_live_subscription = $has_live_subscription;
    }

    /**
    * Getter method for the has_past_due_invoice attribute.
    * Indicates if the account has a past due invoice.
    *
    * @return ?bool
    */
    public function getHasPastDueInvoice(): ?bool
    {
        return $this->_has_past_due_invoice;
    }

    /**
    * Setter method for the has_past_due_invoice attribute.
    *
    * @param bool $has_past_due_invoice
    *
    * @return void
    */
    public function setHasPastDueInvoice(bool $has_past_due_invoice): void
    {
        $this->_has_past_due_invoice = $has_past_due_invoice;
    }

    /**
    * Getter method for the has_paused_subscription attribute.
    * Indicates if the account has a paused subscription.
    *
    * @return ?bool
    */
    public function getHasPausedSubscription(): ?bool
    {
        return $this->_has_paused_subscription;
    }

    /**
    * Setter method for the has_paused_subscription attribute.
    *
    * @param bool $has_paused_subscription
    *
    * @return void
    */
    public function setHasPausedSubscription(bool $has_paused_subscription): void
    {
        $this->_has_paused_subscription = $has_paused_subscription;
    }

    /**
    * Getter method for the hosted_login_token attribute.
    * The unique token for automatically logging the account in to the hosted management pages. You may automatically log the user into their hosted management pages by directing the user to: `https://{subdomain}.recurly.com/account/{hosted_login_token}`.
    *
    * @return ?string
    */
    public function getHostedLoginToken(): ?string
    {
        return $this->_hosted_login_token;
    }

    /**
    * Setter method for the hosted_login_token attribute.
    *
    * @param string $hosted_login_token
    *
    * @return void
    */
    public function setHostedLoginToken(string $hosted_login_token): void
    {
        $this->_hosted_login_token = $hosted_login_token;
    }

    /**
    * Getter method for the id attribute.
    * 
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
    * Getter method for the last_name attribute.
    * 
    *
    * @return ?string
    */
    public function getLastName(): ?string
    {
        return $this->_last_name;
    }

    /**
    * Setter method for the last_name attribute.
    *
    * @param string $last_name
    *
    * @return void
    */
    public function setLastName(string $last_name): void
    {
        $this->_last_name = $last_name;
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
    * Getter method for the parent_account_id attribute.
    * The UUID of the parent account associated with this account.
    *
    * @return ?string
    */
    public function getParentAccountId(): ?string
    {
        return $this->_parent_account_id;
    }

    /**
    * Setter method for the parent_account_id attribute.
    *
    * @param string $parent_account_id
    *
    * @return void
    */
    public function setParentAccountId(string $parent_account_id): void
    {
        $this->_parent_account_id = $parent_account_id;
    }

    /**
    * Getter method for the preferred_locale attribute.
    * Used to determine the language and locale of emails sent on behalf of the merchant to the customer.
    *
    * @return ?string
    */
    public function getPreferredLocale(): ?string
    {
        return $this->_preferred_locale;
    }

    /**
    * Setter method for the preferred_locale attribute.
    *
    * @param string $preferred_locale
    *
    * @return void
    */
    public function setPreferredLocale(string $preferred_locale): void
    {
        $this->_preferred_locale = $preferred_locale;
    }

    /**
    * Getter method for the shipping_addresses attribute.
    * The shipping addresses on the account.
    *
    * @return array
    */
    public function getShippingAddresses(): array
    {
        return $this->_shipping_addresses ?? [] ;
    }

    /**
    * Setter method for the shipping_addresses attribute.
    *
    * @param array $shipping_addresses
    *
    * @return void
    */
    public function setShippingAddresses(array $shipping_addresses): void
    {
        $this->_shipping_addresses = $shipping_addresses;
    }

    /**
    * Getter method for the state attribute.
    * Accounts can be either active or inactive.
    *
    * @return ?string
    */
    public function getState(): ?string
    {
        return $this->_state;
    }

    /**
    * Setter method for the state attribute.
    *
    * @param string $state
    *
    * @return void
    */
    public function setState(string $state): void
    {
        $this->_state = $state;
    }

    /**
    * Getter method for the tax_exempt attribute.
    * The tax status of the account. `true` exempts tax on the account, `false` applies tax on the account.
    *
    * @return ?bool
    */
    public function getTaxExempt(): ?bool
    {
        return $this->_tax_exempt;
    }

    /**
    * Setter method for the tax_exempt attribute.
    *
    * @param bool $tax_exempt
    *
    * @return void
    */
    public function setTaxExempt(bool $tax_exempt): void
    {
        $this->_tax_exempt = $tax_exempt;
    }

    /**
    * Getter method for the updated_at attribute.
    * When the account was last changed.
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
    * Getter method for the username attribute.
    * A secondary value for the account.
    *
    * @return ?string
    */
    public function getUsername(): ?string
    {
        return $this->_username;
    }

    /**
    * Setter method for the username attribute.
    *
    * @param string $username
    *
    * @return void
    */
    public function setUsername(string $username): void
    {
        $this->_username = $username;
    }

    /**
    * Getter method for the vat_number attribute.
    * The VAT number of the account (to avoid having the VAT applied). This is only used for manually collected invoices.
    *
    * @return ?string
    */
    public function getVatNumber(): ?string
    {
        return $this->_vat_number;
    }

    /**
    * Setter method for the vat_number attribute.
    *
    * @param string $vat_number
    *
    * @return void
    */
    public function setVatNumber(string $vat_number): void
    {
        $this->_vat_number = $vat_number;
    }
}