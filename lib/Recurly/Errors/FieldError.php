<?php

namespace Recurly\Errors;

/**
 * Exception class used by the Recurly PHP Client.
 *
 * @category   Recurly
 *
 * @copyright  Copyright (c) 2011 {@link http://recurly.com Recurly, Inc.}
 */
class FieldError extends Error
{
    public $field;
    public $symbol;
    public $description;

    public function __toString()
    {
        if (!empty($this->field) && ($this->__readableField() != 'base')) {
            return $this->__readableField().' '.$this->description;
        } else {
            return $this->description;
        }
    }

    private function __readableField()
    {
        if (empty($this->field)) {
            return;
        }

        $pos = strrpos($this->field, '.');
        if ($pos === false) {
            return str_replace('_', ' ', $this->field);
        } else {
            return str_replace('_', ' ', substr($this->field, $pos + 1));
        }
    }
}
