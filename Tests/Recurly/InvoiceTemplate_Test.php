<?php

class Recurly_InvoiceTemplateTest extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/invoice_templates/q0tzf7o7fpbl', 'invoice_templates/show-200.xml'),
    );
  }

  public function testGetSingleInvoiceTemplate() {
    $invoice_template = Recurly_InvoiceTemplate::get('q0tzf7o7fpbl', $this->client);

    $this->assertInstanceOf('Recurly_InvoiceTemplate', $invoice_template);
    $this->assertEquals('q0tzf7o7fpbl', $invoice_template->uuid);
    $this->assertEquals('Alternate Invoice Template', $invoice_template->name);
    $this->assertEquals('code1', $invoice_template->code);
    $this->assertEquals('Some Description', $invoice_template->description);
  }
}
