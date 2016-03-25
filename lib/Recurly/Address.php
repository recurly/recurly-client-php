<?php

namespace Recurly;

class Address extends Resource
{
    protected static $_writeableAttributes;

    public static function init()
    {
        self::$_writeableAttributes = array(
            'address1',
            'address2',
            'city',
            'state',
            'zip',
            'country',
            'phone',
        );
    }

    protected function getNodeName()
    {
        return 'address';
    }

    protected function getWriteableAttributes()
    {
        return self::$_writeableAttributes;
    }

    protected function getRequiredAttributes()
    {
        return array();
    }
}

Address::init();
