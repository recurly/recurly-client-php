<?php

namespace Recurly;

class NoteList extends Pager
{
    public static function get($accountCode, $client = null)
    {
        return Base::_get(self::uriForNotes($accountCode), $client);
    }

    protected static function uriForNotes($accountCode)
    {
        return Client::PATH_ACCOUNTS.'/'.rawurlencode($accountCode).Client::PATH_NOTES;
    }

    protected function getNodeName()
    {
        return 'note';
    }
}
