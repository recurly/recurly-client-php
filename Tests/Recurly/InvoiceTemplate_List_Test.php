<?php

class RecurlyInvoiceTemplateListTest extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/invoice_templates', 'invoice_templates/index-200.xml')
    );
  }

  public function testLoad() {
    $invoice_templates = Recurly_InvoiceTemplateList::get(null, $this->client);

    $this->assertInstanceOf('Recurly_InvoiceTemplateList', $invoice_templates);
  }
}
