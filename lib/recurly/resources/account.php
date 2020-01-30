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
    
    
    /**
    * Getter method for the address attribute.
    *
    * @return \Recurly\Resources\Address 
    */
    public function getAddress(): \Recurly\Resources\Address
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
    public function setAddress(\Recurly\Resources\Address $value): void
    {
        $this->_address = $value;
    }

    /**
    * Getter method for the bill_to attribute.
    *
    * @return string An enumerable describing the billing behavior of the account, specifically whether the account is self-paying or will rely on the parent account to pay.
    */
    public function getBillTo(): string
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
    public function setBillTo(string $value): void
    {
        $this->_bill_to = $value;
    }

    /**
    * Getter method for the billing_info attribute.
    *
    * @return \Recurly\Resources\BillingInfo 
    */
    public function getBillingInfo(): \Recurly\Resources\BillingInfo
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
    public function setBillingInfo(\Recurly\Resources\BillingInfo $value): void
    {
        $this->_billing_info = $value;
    }

    /**
    * Getter method for the cc_emails attribute.
    *
    * @return string Additional email address that should receive account correspondence. These should be separated only by commas. These CC emails will receive all emails that the `email` field also receives.
    */
    public function getCcEmails(): string
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
    public function setCcEmails(string $value): void
    {
        $this->_cc_emails = $value;
    }

    /**
    * Getter method for the code attribute.
    *
    * @return string The unique identifier of the account. This cannot be changed once the account is created.
    */
    public function getCode(): string
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
    public function setCode(string $value): void
    {
        $this->_code = $value;
    }

    /**
    * Getter method for the company attribute.
    *
    * @return string 
    */
    public function getCompany(): string
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
    public function setCompany(string $value): void
    {
        $this->_company = $value;
    }

    /**
    * Getter method for the created_at attribute.
    *
    * @return string When the account was created.
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
    * Getter method for the custom_fields attribute.
    *
    * @return array The custom fields will only be altered when they are included in a request. Sending an empty array will not remove any existing values. To remove a field send the name with a null or empty value.
    */
    public function getCustomFields(): array
    {
        return $this->_custom_fields;
    }

    /**
    * Setter method for the custom_fields attribute.
    *
    * @param array $custom_fields
    *
    * @return void
    */
    public function setCustomFields(array $value): void
    {
        $this->_custom_fields = $value;
    }

    /**
    * Getter method for the deleted_at attribute.
    *
    * @return string If present, when the account was last marked inactive.
    */
    public function getDeletedAt(): string
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
    public function setDeletedAt(string $value): void
    {
        $this->_deleted_at = $value;
    }

    /**
    * Getter method for the email attribute.
    *
    * @return string The email address used for communicating with this customer. The customer will also use this email address to log into your hosted account management pages. This value does not need to be unique.
    */
    public function getEmail(): string
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
    public function setEmail(string $value): void
    {
        $this->_email = $value;
    }

    /**
    * Getter method for the exemption_certificate attribute.
    *
    * @return string The tax exemption certificate number for the account. If the merchant has an integration for the Vertex tax provider, this optional value will be sent in any tax calculation requests for the account.
    */
    public function getExemptionCertificate(): string
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
    public function setExemptionCertificate(string $value): void
    {
        $this->_exemption_certificate = $value;
    }

    /**
    * Getter method for the first_name attribute.
    *
    * @return string 
    */
    public function getFirstName(): string
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
    public function setFirstName(string $value): void
    {
        $this->_first_name = $value;
    }

    /**
    * Getter method for the has_active_subscription attribute.
    *
    * @return bool Indicates if the account has an active subscription.
    */
    public function getHasActiveSubscription(): bool
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
    public function setHasActiveSubscription(bool $value): void
    {
        $this->_has_active_subscription = $value;
    }

    /**
    * Getter method for the has_canceled_subscription attribute.
    *
    * @return bool Indicates if the account has a canceled subscription.
    */
    public function getHasCanceledSubscription(): bool
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
    public function setHasCanceledSubscription(bool $value): void
    {
        $this->_has_canceled_subscription = $value;
    }

    /**
    * Getter method for the has_future_subscription attribute.
    *
    * @return bool Indicates if the account has a future subscription.
    */
    public function getHasFutureSubscription(): bool
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
    public function setHasFutureSubscription(bool $value): void
    {
        $this->_has_future_subscription = $value;
    }

    /**
    * Getter method for the has_live_subscription attribute.
    *
    * @return bool Indicates if the account has a subscription that is either active, canceled, future, or paused.
    */
    public function getHasLiveSubscription(): bool
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
    public function setHasLiveSubscription(bool $value): void
    {
        $this->_has_live_subscription = $value;
    }

    /**
    * Getter method for the has_past_due_invoice attribute.
    *
    * @return bool Indicates if the account has a past due invoice.
    */
    public function getHasPastDueInvoice(): bool
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
    public function setHasPastDueInvoice(bool $value): void
    {
        $this->_has_past_due_invoice = $value;
    }

    /**
    * Getter method for the has_paused_subscription attribute.
    *
    * @return bool Indicates if the account has a paused subscription.
    */
    public function getHasPausedSubscription(): bool
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
    public function setHasPausedSubscription(bool $value): void
    {
        $this->_has_paused_subscription = $value;
    }

    /**
    * Getter method for the hosted_login_token attribute.
    *
    * @return string The unique token for automatically logging the account in to the hosted management pages. You may automatically log the user into their hosted management pages by directing the user to: `https://{subdomain}.recurly.com/account/{hosted_login_token}`.
    */
    public function getHostedLoginToken(): string
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
    public function setHostedLoginToken(string $value): void
    {
        $this->_hosted_login_token = $value;
    }

    /**
    * Getter method for the id attribute.
    *
    * @return string 
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
    * Getter method for the last_name attribute.
    *
    * @return string 
    */
    public function getLastName(): string
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
    public function setLastName(string $value): void
    {
        $this->_last_name = $value;
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
    * Getter method for the parent_account_id attribute.
    *
    * @return string The UUID of the parent account associated with this account.
    */
    public function getParentAccountId(): string
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
    public function setParentAccountId(string $value): void
    {
        $this->_parent_account_id = $value;
    }

    /**
    * Getter method for the preferred_locale attribute.
    *
    * @return string Used to determine the language and locale of emails sent on behalf of the merchant to the customer.
    */
    public function getPreferredLocale(): string
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
    public function setPreferredLocale(string $value): void
    {
        $this->_preferred_locale = $value;
    }

    /**
    * Getter method for the shipping_addresses attribute.
    *
    * @return array The shipping addresses on the account.
    */
    public function getShippingAddresses(): array
    {
        return $this->_shipping_addresses;
    }

    /**
    * Setter method for the shipping_addresses attribute.
    *
    * @param array $shipping_addresses
    *
    * @return void
    */
    public function setShippingAddresses(array $value): void
    {
        $this->_shipping_addresses = $value;
    }

    /**
    * Getter method for the state attribute.
    *
    * @return string Accounts can be either active or inactive.
    */
    public function getState(): string
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
    public function setState(string $value): void
    {
        $this->_state = $value;
    }

    /**
    * Getter method for the tax_exempt attribute.
    *
    * @return bool The tax status of the account. `true` exempts tax on the account, `false` applies tax on the account.
    */
    public function getTaxExempt(): bool
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
    public function setTaxExempt(bool $value): void
    {
        $this->_tax_exempt = $value;
    }

    /**
    * Getter method for the updated_at attribute.
    *
    * @return string When the account was last changed.
    */
    public function getUpdatedAt(): string
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
    public function setUpdatedAt(string $value): void
    {
        $this->_updated_at = $value;
    }

    /**
    * Getter method for the username attribute.
    *
    * @return string A secondary value for the account.
    */
    public function getUsername(): string
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
    public function setUsername(string $value): void
    {
        $this->_username = $value;
    }

    /**
    * Getter method for the vat_number attribute.
    *
    * @return string The VAT number of the account (to avoid having the VAT applied). This is only used for manually collected invoices.
    */
    public function getVatNumber(): string
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
    public function setVatNumber(string $value): void
    {
        $this->_vat_number = $value;
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
            'setCustomFields' => '\Recurly\Resources\CustomField',
            'setShippingAddresses' => '\Recurly\Resources\ShippingAddress',
        );
        return $array_hints[$key];
    }

}