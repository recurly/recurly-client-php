<?php

namespace Recurly;

class TaxDetail extends Resource
{
    protected function getNodeName()
    {
        return 'tax_detail';
    }

    protected function getWriteableAttributes()
    {
        return array();
    }

    protected function getRequiredAttributes()
    {
        return array();
    }
}
