<?php

namespace Recurly\Errors;

/**
 * Exception class used by the Recurly PHP Client.
 *
 * @category   Recurly
 *
 * @copyright  Copyright (c) 2011 {@link http://recurly.com Recurly, Inc.}
 */
class ValidationError extends Error
{
    public $object;
    public $errors;

    public function __construct($message, $object, $errors)
    {
        $this->object = $object;
        $this->errors = $errors;

        // Create a better error message
        $errs = array();
        foreach ($errors as $err) {
            if ($err instanceof TransactionError) {
                # Return just the customer message from the transaction error
                parent::__construct($err->customer_message);

                return;
            } else {
                $errs[] = strval($err);
            }
        }
        $message = ucfirst(implode($errs, ', '));
        if (substr($message, -1) != '.') {
            $message .= '.';
        }
        parent::__construct($message);
    }
}
