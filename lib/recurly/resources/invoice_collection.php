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
class InvoiceCollection extends RecurlyResource
{
    private $_charge_invoice;
    private $_credit_invoices;
    private $_object;

    protected static $array_hints = array(
        'setCreditInvoices' => '\Recurly\Resources\Invoice',
    );

    
    /**
    * Getter method for the charge_invoice attribute.
    * 
    *
    * @return ?\Recurly\Resources\Invoice
    */
    public function getChargeInvoice(): ?\Recurly\Resources\Invoice
    {
        return $this->_charge_invoice;
    }

    /**
    * Setter method for the charge_invoice attribute.
    *
    * @param \Recurly\Resources\Invoice $charge_invoice
    *
    * @return void
    */
    public function setChargeInvoice(\Recurly\Resources\Invoice $charge_invoice): void
    {
        $this->_charge_invoice = $charge_invoice;
    }

    /**
    * Getter method for the credit_invoices attribute.
    * Credit invoices
    *
    * @return array
    */
    public function getCreditInvoices(): array
    {
        return $this->_credit_invoices ?? [] ;
    }

    /**
    * Setter method for the credit_invoices attribute.
    *
    * @param array $credit_invoices
    *
    * @return void
    */
    public function setCreditInvoices(array $credit_invoices): void
    {
        $this->_credit_invoices = $credit_invoices;
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
}