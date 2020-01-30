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
    
    
    /**
    * Getter method for the charge_invoice attribute.
    *
    * @return \Recurly\Resources\Invoice 
    */
    public function getChargeInvoice(): \Recurly\Resources\Invoice
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
    public function setChargeInvoice(\Recurly\Resources\Invoice $value): void
    {
        $this->_charge_invoice = $value;
    }

    /**
    * Getter method for the credit_invoices attribute.
    *
    * @return array Credit invoices
    */
    public function getCreditInvoices(): array
    {
        return $this->_credit_invoices;
    }

    /**
    * Setter method for the credit_invoices attribute.
    *
    * @param array $credit_invoices
    *
    * @return void
    */
    public function setCreditInvoices(array $value): void
    {
        $this->_credit_invoices = $value;
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
            'setCreditInvoices' => '\Recurly\Resources\Invoice',
        );
        return $array_hints[$key];
    }

}