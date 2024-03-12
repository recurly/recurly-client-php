<?php

class Recurly_GeneralLedgerAccountListTest extends Recurly_TestCase
{
  public function testGetGeneralLedgerAccountListAll() {
    $this->client->addResponse(
      'GET',
      '/general_ledger_accounts',
      'general_ledger_accounts/list-200.xml'
    );

    $general_ledger_accounts = Recurly_GeneralLedgerAccountList::get(null, $this->client);
    $this->assertInstanceOf('Recurly_GeneralLedgerAccountList', $general_ledger_accounts);

    $general_ledger_account = $general_ledger_accounts->current();
    $this->assertInstanceOf('Recurly_GeneralLedgerAccount', $general_ledger_account);

    $this->assertEquals(iterator_count($general_ledger_accounts), 13);
  }

  public function testGetGeneralLedgerAccountListFilteredByRevenue() {
    $this->client->addResponse(
      'GET',
      '/general_ledger_accounts?account_type=revenue',
      'general_ledger_accounts/list-200-revenue.xml'
    );

    $general_ledger_accounts = Recurly_GeneralLedgerAccountList::getByAccountType('revenue', $this->client);
    $this->assertInstanceOf('Recurly_GeneralLedgerAccountList', $general_ledger_accounts);

    $general_ledger_account = $general_ledger_accounts->current();
    $this->assertInstanceOf('Recurly_GeneralLedgerAccount', $general_ledger_account);

    $this->assertEquals(iterator_count($general_ledger_accounts), 4);
  }

  public function testGetGeneralLedgerAccountListFilteredByLiability() {
    $this->client->addResponse(
      'GET',
      '/general_ledger_accounts?account_type=liability',
      'general_ledger_accounts/list-200-liability.xml'
    );

    $general_ledger_accounts = Recurly_GeneralLedgerAccountList::getByAccountType('liability', $this->client);
    $this->assertInstanceOf('Recurly_GeneralLedgerAccountList', $general_ledger_accounts);

    $general_ledger_account = $general_ledger_accounts->current();
    $this->assertInstanceOf('Recurly_GeneralLedgerAccount', $general_ledger_account);

    $this->assertEquals(iterator_count($general_ledger_accounts), 9);
  }
}
