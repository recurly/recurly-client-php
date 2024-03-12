<?php

class Recurly_GeneralLedgerAccountTest extends Recurly_TestCase
{
  function defaultResponses() {
    return array(
      array('GET', '/general_ledger_accounts/u90r5deeaxix', 'general_ledger_accounts/show-200.xml'),
    );
  }

  public function testGetGeneralLedgerAccount() {
    $gla = Recurly_GeneralLedgerAccount::get('u90r5deeaxix', $this->client);

    $this->assertInstanceOf('Recurly_GeneralLedgerAccount', $gla);
    $this->assertEquals('code1', $gla->code);
    $this->assertEquals('revenue', $gla->account_type);
    $this->assertEquals('string', $gla->description);
    $this->assertEquals('u90r5deeaxix', $gla->id);
  }

  public function testCreate() {
    $this->client->addResponse('POST', '/general_ledger_accounts', 'general_ledger_accounts/create-201.xml');

    $gla = new Recurly_GeneralLedgerAccount(null, $this->client);
    $gla->code = 'little_llama';
    $gla->account_type = 'revenue';
    $gla->description = 'A description about llamas';

    $gla->create();

    $this->assertInstanceOf('Recurly_GeneralLedgerAccount', $gla);
  }

  public function testCreateXml() {
    $gla = new Recurly_GeneralLedgerAccount();
    $gla->code = 'little_llama';
    $gla->account_type = 'revenue';
    $gla->description = 'A description about llamas';

    $this->assertXmlStringEqualsXmlString(
      "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
       <general_ledger_account>
         <code>little_llama</code>
         <account_type>revenue</account_type>
         <description>A description about llamas</description>
       </general_ledger_account>",
       $gla->xml()
    );
  }

  public function testUpdateXml() {
    $gla = Recurly_GeneralLedgerAccount::get('u90r5deeaxix', $this->client);
    $gla->code = 'little_llama';
    $gla->account_type = 'revenue';
    $gla->description = 'A new description about llamas';

    $this->assertXmlStringEqualsXmlString(
      "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
       <general_ledger_account>
         <code>little_llama</code>
         <account_type>revenue</account_type>
         <description>A new description about llamas</description>
       </general_ledger_account>",
       $gla->xml()
    );
  }
}
