<?php
/**
 * class Recurly_ExternalAccount
 * @property string $id
 * @property string $external_account_code
 * @property string $external_connection_type
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Recurly_ExternalAccount extends Recurly_Resource
{
/**
 * @param $accountCode
 * @param $uuid
 * @param Recurly_Client $client Optional client for the request, useful for mocking the client
 * @return Recurly_ExternalAccount|null
 * @throws Recurly_Error
 */

 public function update() {
   $this->_save(Recurly_Client::PUT, $this->uri());
 }

 public function delete() {
   return Recurly_Base::_delete($this->uri(), $this->_client);
 }

 /**
  * @throws Recurly_Error
  */
 protected function uri() {
   if (!empty($this->_href))
     return $this->getHref();
   else if (!empty($this->account_code))
     return Recurly_ExternalAccount::uriForExternalAccount($this->account_code);
   else
     throw new Recurly_Error("'account_code' not specified.");
 }

 protected static function uriForExternalAccount($account_code) {
   return self::_safeUri(Recurly_Client::PATH_ACCOUNTS, $account_code, Recurly_Client::PATH_EXTERNAL_ACCOUNTS);
 }

  protected function getNodeName() {
    return 'external_account';
  }

  public function populateXmlDoc(&$doc, &$node, &$obj, $nested = false) {
    if ($this->isEmbedded($node, 'external_accounts')) {
      $tierNode = $node->appendChild($doc->createElement($this->getNodeName()));
      parent::populateXmlDoc($doc, $tierNode, $obj, $nested);
    } else {
      parent::populateXmlDoc($doc, $node, $obj, $nested);
    }
  }

  protected function getWriteableAttributes() {
   return array('external_account_code', 'external_connection_type');
  }
}
