<?php

abstract class Recurly_Base
{
  protected $_href;
  protected $_type;
  protected $_client;
  protected $_links;
  protected $_values;
  protected $_errors;
  protected $_headers;

  public function __construct($href = null, $client = null)
  {
    $this->_href = $href;
    $this->_client = is_null($client) ? new Recurly_Client() : $client;
    $this->_links = array();
  }

  /**
   * Request the URI, validate the response and return the object.
   * @param string Resource URI, if not fully qualified, the base URL will be prepended
   * @param string Optional client for the request, useful for mocking the client
   * @return object Recurly_Resource or null
   * @throws Recurly_Error
   */
  public static function _get($uri, $client = null)
  {
    if (is_null($client)) {
      $client = new Recurly_Client();
    }
    $response = $client->request(Recurly_Client::GET, $uri);
    $response->assertValidResponse();
    return Recurly_Base::__parseResponseToNewObject($response, $uri, $client);
  }

  /**
   * Send a HEAD request to the URI, validate the response and return the headers.
   * @param string Resource URI, if not fully qualified, the base URL will be prepended
   * @param string Optional client for the request, useful for mocking the client
   * @throws Recurly_Error
   */
  public static function _head($uri, $client = null)
  {
    if (is_null($client)) {
      $client = new Recurly_Client();
    }
    $response = $client->request(Recurly_Client::HEAD, $uri);
    $response->assertValidResponse();
    return $response->headers;
  }

  /**
   * Post to the URI, validate the response and return the object.
   * @param string Resource URI, if not fully qualified, the base URL will be prepended
   * @param string Data to post to the URI
   * @param string Optional client for the request, useful for mocking the client
   * @return object Recurly_Resource or null
   * @throws Recurly_Error
   */
  protected static function _post($uri, $data = null, $client = null)
  {
    if (is_null($client)) {
      $client = new Recurly_Client();
    }
    $response = $client->request(Recurly_Client::POST, $uri, $data);
    $response->assertValidResponse();
    $object = Recurly_Base::__parseResponseToNewObject($response, $uri, $client);
    $response->assertSuccessResponse($object);
    return $object;
  }

  /**
   * Put to the URI, validate the response and return the object.
   * @param string Resource URI, if not fully qualified, the base URL will be prepended
   * @param string Optional client for the request, useful for mocking the client
   * @return object Recurly_Resource or null
   * @throws Recurly_Error
   */
  protected static function _put($uri, $client = null)
  {
    if (is_null($client)) {
      $client = new Recurly_Client();
    }
    $response = $client->request(Recurly_Client::PUT, $uri);
    $response->assertValidResponse();
    $object = null;
    if ($response->body) {
      $object = Recurly_Base::__parseResponseToNewObject($response, $uri, $client);
    }
    $response->assertSuccessResponse($object);
    return $object;
  }

  /**
   * Delete the URI, validate the response and return the object.
   * @param string Resource URI, if not fully qualified, the base URL will be appended
   * @param string Optional client for the request, useful for mocking the client
   * @return object Recurly_Resource or null
   * @throws Recurly_Error
   */
  protected static function _delete($uri, $client = null)
  {
    if (is_null($client)) {
      $client = new Recurly_Client();
    }
    $response = $client->request(Recurly_Client::DELETE, $uri);
    $response->assertValidResponse();
    if ($response->body) {
      return Recurly_Base::__parseResponseToNewObject($response, $uri, $client);
    }
    return null;
  }

  protected static function _uriWithParams($uri, $params = null) {
    if (is_null($params) || !is_array($params)) {
      return $uri;
    }

    $vals = array();
    foreach ($params as $k => $v) {
      $vals[] = $k . '=' . urlencode($v);
    }

    return $uri . '?' . implode('&', $vals);
  }

  /**
   * Pretty string version of the object
   */
  public function __toString()
  {
    $href = $this->getHref();

    if (empty($href))
      $href = '[new]';
    else
      $href = '[href=' . $href . ']';

    $class = get_class($this);
    $values = $this->__valuesString();
    return "<$class$href $values>";
  }

  protected function __valuesString() {
    $values = array();
    ksort($this->_values);

    foreach($this->_values as $key => $value) {
      if (is_null($value)) {
        $values[] = "$key=null";
      } else if (is_int($value)) {
        $values[] = "$key=$value";
      } else if (is_bool($value)) {
        $values[] = "$key=" . ($value ? 'true' : 'false');
      } else if ($value instanceof Recurly_Stub) {
        $values[] = "$key=$value";
      } else if (is_array($value)) {
        $innerValues = array();
        foreach ($value as $innerValue)
          $innerValues[] = strval($innerValue);
        $innerValues = implode(', ', $innerValues);
        $values[] = "$key=[$innerValues]";
      } else if ($value instanceof DateTime) {
        $values[] = "$key=\"" . $value->format('Y-m-d H:i:s P') . '"';
      } else {
        $values[] = "$key=\"$value\"";
      }
    }

    return implode(', ', $values);
  }

  public function getHref() {
    return $this->_href;
  }
  protected function setHref($href) {
    $this->_href = $href;
  }


  /**
   * @param array $headers
   */
  private function setHeaders($headers){
        $this->_headers = $headers;
  }

  /**
   * @return array|null
   */
  public function getHeaders(){
      return $this->_headers;
  }

  /** Refers to the `type` root xml attribute **/
  public function getType() {
    return $this->_type;
  }

  private function addLink($name, $href, $method){
    $this->_links[$name] = new Recurly_Link($name, $href, $method);
  }

  public function getLinks() {
    return $this->_links;
  }

  /* ******************************************************
     ** XML Parser
     ****************************************************** */
  /**
   * Mapping of XML node to PHP object name
   */
  static $class_map = array(
    'account' => 'Recurly_Account',
    'account_acquisition' => 'Recurly_AccountAcquisition',
    'accounts' => 'Recurly_AccountList',
    'account_balance' => 'Recurly_AccountBalance',
    'address' => 'Recurly_Address',
    'add_on' => 'Recurly_Addon',
    'add_ons' => 'Recurly_AddonList',
    'adjustment' => 'Recurly_Adjustment',
    'adjustments' => 'Recurly_AdjustmentList',
    'balance_in_cents' => 'Recurly_CurrencyList',
    'billing_info' => 'Recurly_BillingInfo',
    'coupon' => 'Recurly_Coupon',
    'unique_coupon_codes' => 'Recurly_UniqueCouponCodeList',
    'charge_invoice' => 'Recurly_Invoice',
    'credit_invoice' => 'Recurly_Invoice',
    'currency' => 'Recurly_Currency',
    'custom_fields' => 'Recurly_CustomFieldList',
    'custom_field' => 'Recurly_CustomField',
    'credit_invoices' => 'array',
    'credit_payment' => 'Recurly_CreditPayment',
    'credit_payments' => 'Recurly_CreditPaymentList',
    'details' => 'array',
    'discount_in_cents' => 'Recurly_CurrencyList',
    'delivery' => 'Recurly_Delivery',
    'error' => 'Recurly_FieldError',
    'errors' => 'Recurly_ErrorList',
    'export_date' => 'Recurly_ExportDate',
    'export_dates' => 'Recurly_ExportDateList',
    'export_file' => 'Recurly_ExportFile',
    'export_files' => 'Recurly_ExportFileList',
    'fraud' => 'Recurly_FraudInfo',
    'gift_card' => 'Recurly_GiftCard',
    'gift_cards' => 'Recurly_GiftCardList',
    'gifter_account' => 'Recurly_Account',
    'invoice' => 'Recurly_Invoice',
    'invoices' => 'Recurly_InvoiceList',
    'invoice_collection' => 'Recurly_InvoiceCollection',
    'item' => 'Recurly_Item',
    'items' => 'Recurly_ItemList',
    'line_items' => 'array',
    'measured_unit' => 'Recurly_MeasuredUnit',
    'measured_units' => 'Recurly_MeasuredUnitList',
    'note' => 'Recurly_Note',
    'notes' => 'Recurly_NoteList',
    'plan' => 'Recurly_Plan',
    'plans' => 'Recurly_PlanList',
    'plan_code' => 'string',
    'plan_codes' => 'array',
    'pending_subscription' => 'Recurly_Subscription',
    'redemption' => 'Recurly_CouponRedemption',
    'redemptions' => 'Recurly_CouponRedemptionList',
    'setup_fee_in_cents' => 'Recurly_CurrencyList',
    'shipping_address' => 'Recurly_ShippingAddress',
    'shipping_addresses' => 'Recurly_ShippingAddressList',
    'shipping_fee' => 'Recurly_ShippingFee',
    'shipping_method' => 'Recurly_ShippingMethod',
    'shipping_methods' => 'Recurly_ShippingMethodList',
    'subscription' => 'Recurly_Subscription',
    'subscriptions' => 'Recurly_SubscriptionList',
    'subscription_add_ons' => 'array',
    'subscription_add_on' => 'Recurly_SubscriptionAddOn',
    'tax_detail' => 'Recurly_Tax_Detail',
    'tax_details' => 'array',
    'transaction' => 'Recurly_Transaction',
    'transactions' => 'Recurly_TransactionList',
    'transaction_error' => 'Recurly_TransactionError',
    'unit_amount_in_cents' => 'Recurly_CurrencyList',
    'usage' => 'Recurly_Usage',
    'usages' => 'Recurly_UsageList'
  );

  // Use a valid Recurly_Response to populate a new object.
  protected static function __parseResponseToNewObject($response, $uri, $client) {
    $dom = new DOMDocument();

    Recurly_Client::disableXmlEntityLoading();

    if (empty($response->body) || !$dom->loadXML($response->body, LIBXML_NOBLANKS)) {
      return null;
    }

    $rootNode = $dom->documentElement;

    $obj = Recurly_Resource::__createNodeObject($rootNode, $client);
    Recurly_Resource::__parseXmlToObject($rootNode->firstChild, $obj, $client);
    if ($obj instanceof self) {
      $obj->_afterParseResponse($response, $uri);
      $obj->setHeaders($response->headers);
    }
    return $obj;
  }

  // Optional method to allow objects access to the full response with headers.
  protected function _afterParseResponse($response, $uri) { }

  // Use the XML to update $this object.
  protected function __parseXmlToUpdateObject($xml)
  {
    $dom = new DOMDocument();

    Recurly_Client::disableXmlEntityLoading();

    if (empty($xml) || !$dom->loadXML($xml, LIBXML_NOBLANKS)) return null;

    $rootNode = $dom->documentElement;

    if ($rootNode->nodeName == $this->getNodeName()) {
      // update the current object
      Recurly_Resource::__parseXmlToObject($rootNode->firstChild, $this, $this->_client);
    } else if ($rootNode->nodeName == 'errors') {
      // add element to existing object
      Recurly_Resource::__parseXmlToObject($rootNode->firstChild, $this->_errors, $this->_client);
    }
    $this->updateErrorAttributes();
  }

  protected static function __parseXmlToObject($node, &$object, $client)
  {
    while ($node) {
      //print "Node: {$node->nodeType} -- {$node->nodeName}\n";

      if ($node->nodeType == XML_TEXT_NODE) {
        if ($node->wholeText != null) {
          $text = trim($node->wholeText);
          if (!empty($text)) {
            $object->description = $text;
          }
        }
      } else if ($node->nodeType == XML_ELEMENT_NODE) {
        $nodeName = str_replace("-", "_", $node->nodeName);

        if ($object instanceof Recurly_Pager) {
          $new_obj = Recurly_Resource::__createNodeObject($node, $object->_client);
          if (!is_null($new_obj)) {
            Recurly_Resource::__parseXmlToObject($node->firstChild, $new_obj, $object->_client);
            $object->_objects[] = $new_obj;
          }
          $node = $node->nextSibling;
          continue;
        } else if ($object instanceof Recurly_ErrorList) {
          if ($nodeName == 'error') {
            $object[] = Recurly_Resource::parseErrorNode($node);
            $node = $node->nextSibling;
            continue;
          }
        // Would prefer to do `$object instanceof ArrayAccess` but Recurly_CurrencyList
        // implements that and expects to have its children assigned like `$list->USD = 123`.
        } else if (is_array($object) || $object instanceof Recurly_CustomFieldList) {
          if ($nodeName == 'error') {
            $object[] = Recurly_Resource::parseErrorNode($node);
            $node = $node->nextSibling;
            continue;
          }

          $new_obj = Recurly_Resource::__createNodeObject($node, $client);
          if (!is_null($new_obj)) {
            if (is_object($new_obj) || is_array($new_obj)) {
              Recurly_Resource::__parseXmlToObject($node->firstChild, $new_obj, $client);
            }
            $object[] = $new_obj;
          }
          $node = $node->nextSibling;
          continue;
        }

        $numChildren = $node->childNodes->length;
        if ($numChildren == 0) {
          // No children, we might have a link
          $href = $node->getAttribute('href');
          if (!empty($href)) {
            if ($nodeName == 'a') {
              $linkName = $node->getAttribute('name');
              $method = $node->getAttribute('method');
              $object->addLink($linkName, $href, $method);
            } else {
              if (!is_object($object)) {
                $object->$nodeName = new Recurly_Stub($nodeName, $href);
              }
              else {
                $object->$nodeName = new Recurly_Stub($nodeName, $href, $object->_client);
              }
            }
          }
        } else if ($node->firstChild->nodeType == XML_ELEMENT_NODE) {
          // has element children, drop in and continue parsing
          $new_obj = Recurly_Resource::__createNodeObject($node, $object->_client);
          if (!is_null($new_obj)) {
            $object->$nodeName = Recurly_Resource::__parseXmlToObject($node->firstChild, $new_obj, $object->_client);
          }
        } else {
          // we have a single text child
          if ($node->hasAttribute('nil')) {
            $object->$nodeName = null;
          } else {
            switch ($node->getAttribute('type')) {
              case 'boolean':
                $object->$nodeName = ($node->nodeValue == 'true');
                break;
              case 'date':
              case 'datetime':
                $object->$nodeName = new DateTime($node->nodeValue);
                break;
              case 'float':
                $object->$nodeName = (float)$node->nodeValue;
                break;
              case 'integer':
                $object->$nodeName = (int)$node->nodeValue;
                break;
              case 'array':
                $object->$nodeName = array();
                break;
              default:
                $object->$nodeName = $node->nodeValue;
            }
          }
        }
      }

      $node = $node->nextSibling;
    }

    if (isset($object->_unsavedKeys))
      $object->_unsavedKeys = array();

    return $object;
  }

  private static function parseErrorNode($node)
  {
    $error = new Recurly_FieldError();
    $error->field = $node->getAttribute('field');
    $error->symbol = $node->getAttribute('symbol');
    $error->description = $node->firstChild->wholeText;

    return $error;
  }

  private static function __createNodeObject($node, $client)
  {
    $nodeName = str_replace("-", "_", $node->nodeName);

    if (!array_key_exists($nodeName, Recurly_Resource::$class_map)) {
      return null; // Unknown element
    }

    $node_class = Recurly_Resource::$class_map[$nodeName];

    if ($node_class == null)
      return new Recurly_Object();
    else if ($node_class == 'array')
      return array();
    else if ($node_class == 'string')
      return $node->firstChild->wholeText;
    else {
      if ($node_class == 'Recurly_CurrencyList') {
        $new_obj = new $node_class($nodeName);
      } else {
        $new_obj = new $node_class();
      }

      // It may have a type attribute we wish to capture
      $typeAttribute = $node->getAttribute('type');
      if (!empty($typeAttribute)) {
        $new_obj->_type = $typeAttribute;
      }

      $new_obj->_client = $client;
      $href = $node->getAttribute('href');
      if (!empty($href)) {
        $new_obj->setHref($href);
      }

      return $new_obj;
    }
  }
}

// In case node_class is not specified.
class Recurly_Object {}
