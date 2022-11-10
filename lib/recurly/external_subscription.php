<?php
/**
 * class Recurly_ExternalSubscription
 */
class Recurly_ExternalSubscription extends Recurly_Resource
{
  protected function getNodeName() {
    return 'external_subscription';
  }

  protected function getWriteableAttributes() {
   return array();
  }
}
