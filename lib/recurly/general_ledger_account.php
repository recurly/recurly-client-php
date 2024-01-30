<?php

/**
 * Class Recurly GeneralLedgerAccount
 * @property string $id
 * @property string $code The account code.
 * @property string $account_type The type of account.
 * @property string $description The description of the account.
 * @property DateTime $created_at The date and time the gla was created in Recurly.
 * @property DateTime $updated_at The date and time the gla was last updated.
 */

class Recurly_GeneralLedgerAccount extends Recurly_Resource
{
  public function create() {
    $this->_save(Recurly_Client::POST, Recurly_Client::PATH_GENERAL_LEDGER_ACCOUNTS);
  }

  /**
   * @param $id
   * @param Recurly_Client $client Optional client for the request, useful for mocking the client
   * @return object
   * @throws Recurly_Error
   */
  public static function get($id, $client = null) {
    return Recurly_Base::_get(Recurly_GeneralLedgerAccount::uriForGeneralLedgerAccount($id), $client);
  }

  public function update() {
    return $this->_save(Recurly_Client::PUT, $this->uri());
  }

  protected function uri() {
    if (!empty($this->_href))
      return $this->getHref();
    else
      return Recurly_GeneralLedgerAccount::uriForGeneralLedgerAccount($this->id);
  }

  protected static function uriForGeneralLedgerAccount($id) {
    return self::_safeUri(Recurly_Client::PATH_GENERAL_LEDGER_ACCOUNTS, $id);
  }

  protected function getNodeName() {
    return 'general_ledger_account';
  }

  protected function getWriteableAttributes() {
    return array(
      'code', 'account_type', 'description', 'created_at', 'updated_at'
    );
  }
}
