<?php

/**
 * Class Recurly_InvoiceTemplate
 * @property Recurly_Stub accounts The URL of accounts for the specified Invoice Template.
 * @property string $uuid The uuid of the Invoice Template.
 * @property string $name The name of the Invoice Template.
 * @property string $code The unique invoice template identifier code.
 * @property string $description An internal description to identify an invoice template.
 * @property DateTime $created_at When the Invoice Template was created.
 * @property DateTime $updated_at When the Invoice Template was last updated.
 */
class Recurly_InvoiceTemplate extends Recurly_Resource
{
  public static function get($id, $client = null) {
    return Recurly_Base::_get(Recurly_InvoiceTemplate::uriForInvoiceTemplate($id), $client);
  }

  protected static function uriForInvoiceTemplate($id) {
    return self::_safeUri(Recurly_Client::PATH_INVOICE_TEMPLATES, $id);
  }

  protected function uri() {
    if (!empty($this->_href))
      return $this->getHref();
    else
      return Recurly_InvoiceTemplate::uriForInvoiceTemplate($this->id);
  }

  protected function getNodeName() {
    return 'invoice_template';
  }

  protected function getWriteableAttributes() {
    return array();
  }
}
