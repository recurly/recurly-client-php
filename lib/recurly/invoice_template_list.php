<?php

class Recurly_InvoiceTemplateList extends Recurly_Pager
{
  public static function get($params = null, $client = null) {
    $uri = self::_uriWithParams(Recurly_Client::PATH_INVOICE_TEMPLATES, $params);
    return new self($uri, $client);
  }

  protected function getNodeName() {
    return 'invoice_templates';
  }
}
