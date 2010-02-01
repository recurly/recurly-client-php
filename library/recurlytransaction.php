<?php

/**
 * @category   Recurly
 * @package    Recurly_Client_PHP
 * @copyright  Copyright (c) 2010 {@link http://recurly.com Recurly, Inc.}
 */
class RecurlyTransaction
{
  var $id;
  var $amount_in_cents;
  var $date;
  var $message;
  var $success;
  var $voidable;
  var $refundable;
}