<?php

namespace Recurly;

class Note extends Resource
{
    protected function getNodeName()
    {
        return 'note';
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
