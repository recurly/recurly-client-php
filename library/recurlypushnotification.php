<?php

/* Usage:

$post_xml = file_get_contents ("php://input");
$notification = new RecurlyPushNotification($post_xml);

*/

/**
 * @category   Recurly
 * @package    Recurly_Client_PHP
 * @copyright  Copyright (c) 2011 {@link http://recurly.com Recurly, Inc.}
 */
class RecurlyPushNotification
{
  /* Notification type:
   *   [new_account updated_account canceled_account 
   *    new_subscription updated_subscription canceled_subscription expired_subscription 
   *    successful_payment failed_payment successful_refund void_payment]
   */
  var $type;
  
  var $account;
  var $subscription;
  var $transaction;
  
  function RecurlyPushNotification($post_xml)
  {
    $this->parseXml($post_xml);
  }
  
  function parseXml($post_xml)
  {
    if (!@simplexml_load_string ($post_xml)) {
      return;
    }
    $xml = new SimpleXMLElement ($post_xml);
    
    $this->type = $xml->getName();
    
    foreach ($xml->children() as $child_node)
    {
      switch ($child_node->getName())
      {
        case 'account':
          $this->account = $child_node;
          break;
        case 'subscription':
          $this->subscription = $child_node;
          break;
        case 'transaction':
          $this->transaction = $child_node;
          break;
      }
    }
  }
}