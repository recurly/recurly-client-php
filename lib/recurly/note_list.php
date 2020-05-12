<?php

class Recurly_NoteList extends Recurly_Pager
{
  public static function get($accountCode, $params = null, $client = null) {
    $accountPath = self::_uriForResource(Recurly_Client::PATH_ACCOUNTS, rawurlencode($accountCode));
    $uri = self::_uriWithParams($accountPath . Recurly_Client::PATH_NOTES, $params);
    return new self($uri, $client);
  }

  protected function getNodeName() {
    return 'notes';
  }
}
