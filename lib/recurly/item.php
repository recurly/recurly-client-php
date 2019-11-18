<?php

/**
 * Class Recurly Item
 * @property string $item_code The unique identifer of the item.
 * @property string $name The name of the item.
 * @property string $description The description of the item.
 * @property string $external_sku Stock keeping unit to link the item to other inventory.
 * @property string $accounting_code Accounting code for invoice line items.
 * @property string $revenue_schedule_type The revenue schedule type for the item.
 * @property string $state The state of the item.
 * @property Recurly_CustomFieldList $custom_fields Optional custom fields for the item.

 */

class Recurly_Item extends Recurly_Resource
{
  public function __construct($href = null, $client = null) {
    parent::__construct($href, $client);
    $this->custom_fields = new Recurly_CustomFieldList();
  }

  /**
   * @param $itemCode The item code
   * @param Recurly_Client $client Optional client for the request, useful for mocking the client
   * @return object 
   * @throws Recurly_Error
   */
  public static function get($itemCode, $client = null) {
    return Recurly_Base::_get(Recurly_item::uriForItem($itemCode), $client);
  }

  public function create() {
    $this->_save(Recurly_Client::POST, Recurly_Client::PATH_ITEMS);
  }

  public function delete() {
    return Recurly_Base::_delete($this->uri(), $this->_client);
  }

  public function reactivate() {
    $this->_save(Recurly_Client::PUT, $this->uri() . '/reactivate');
  }
  
  
  protected function uri() {
    if (!empty($this->_href))
      return $this->getHref();
    else
      return Recurly_Item::uriForItem($this->item_code);
  }

  protected static function uriForItem($itemCode) {
    return Recurly_Client::PATH_ITEMS . '/' . rawurlencode($itemCode);
  }

  protected function getNodeName() {
    return 'item';
  }

  protected function getWriteableAttributes() {
    return array(
      'item_code', 'name', 'description', 'external_sku', 
      'accounting_code', 'revenue', 'state', 'custom_fields'
    );
  }
  

}

