<?php

abstract class Recurly_Base
{
  protected $_href;
  protected $_client;
  protected $_links;

  public function __construct($href = null, $client = null)
  {
    $this->_href = $href;
    $this->_client = $client;
    $this->_links = array();
  }

  public function getHref() {
    return $this->_href;
  }
  public function setHref($href) {
    $this->_href = $href;
  }



  /**
   * Request the URI, validate the response and return the object.
   * @param string Resource URI, if not fully qualified, the base URL will be appended
   * @param string Optional client for the request, useful for mocking the client
   */
  public static function _get($uri, $client = null)
  {
    if (is_null($client))
      $client = new Recurly_Client();
    $response = $client->request(Recurly_Client::GET, $uri);
    $response->assertValidResponse();
    return Recurly_Base::__parseXmlToNewObject($response->body, $client);
  }

  /**
   * Post to the URI, validate the response and return the object.
   * @param string Resource URI, if not fully qualified, the base URL will be appended
   * @param string Data to post to the URI
   * @param string Optional client for the request, useful for mocking the client
   */
  protected static function _post($uri, $data = null, $client = null)
  {
    if (is_null($client))
      $client = new Recurly_Client();
    $response = $client->request(Recurly_Client::POST, $uri, $data);
    $response->assertValidResponse();
    $object = Recurly_Base::__parseXmlToNewObject($response->body, $client);
    $response->assertSuccessResponse($object);
    return $object;
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
        $innerValues = implode($innerValues, ', ');
        $values[] = "$key=[$innerValues]";
      } else if ($value instanceof DateTime) {
        $values[] = "$key=\"" . $value->format('Y-m-d H:i:s P') . '"';
      } else {
        $values[] = "$key=\"$value\"";
      }
    }

    return implode($values, ', ');
  }

  private function addLink($name, $href, $method){
    $this->_links[$name] = new Recurly_Link($name, $href, $method);
  }

  /* ******************************************************
     ** XML Parser
     ****************************************************** */
  /**
   * Mapping of XML node to PHP object name
   */
  static $class_map = array(
    'account' => 'Recurly_Account',
    'accounts' => 'Recurly_AccountList',
    'add_on' => 'Recurly_AddOn',
    'add_ons' => 'Recurly_AddOnList',
    'billing_info' => 'Recurly_BillingInfo',
    'adjustment' => 'Recurly_Adjustment',
    'adjustments' => 'Recurly_AdjustmentList',
    'coupon' => 'Recurly_Coupon',
    'currency' => 'Recurly_Currency',
    'details' => 'array',
    'discount_in_cents' => 'Recurly_CurrencyList',
    'error' => 'Recurly_FieldError',
    'errors' => 'Recurly_ErrorList',
    'invoice' => 'Recurly_Invoice',
    'invoices' => 'Recurly_InvoiceList',
    'line_items' => 'array',
    'plan' => 'Recurly_Plan',
    'plans' => 'Recurly_PlanList',
    'plan_code' => 'string',
    'plan_codes' => 'array',
    'pending_subscription' => 'Recurly_Subscription',
    'redemption' => 'Recurly_CouponRedemption',
    'setup_fee_in_cents' => 'Recurly_CurrencyList',
    'subscription' => 'Recurly_Subscription',
    'subscriptions' => 'Recurly_SubscriptionList',
    'subscription_add_ons' => 'array',
    'subscription_add_on' => 'Recurly_SubscriptionAddOn',
    'transaction' => 'Recurly_Transaction',
    'transactions' => 'Recurly_TransactionList',
    'transaction_error' => 'Recurly_TransactionError',
    'unit_amount_in_cents' => 'Recurly_CurrencyList'
  );

  protected static function __parseXmlToNewObject($xml, $client=null) {
		$dom = new DOMDocument();
    if (!$dom->loadXML($xml, LIBXML_NOBLANKS)) return null;

    $rootNode = $dom->documentElement;

    $obj = Recurly_Resource::__createNodeObject($rootNode);
    Recurly_Resource::__parseXmlToObject($rootNode->firstChild, $obj);
    $obj->_client = $client;
    return $obj;
  }


  protected function __parseXmlToUpdateObject($xml)
  {
		$dom = new DOMDocument();
		if (!$dom->loadXML($xml, LIBXML_NOBLANKS)) return null;

    $rootNode = $dom->documentElement;

    if ($rootNode->nodeName == $this->getNodeName()) {
      // update the current object
      Recurly_Resource::__parseXmlToObject($rootNode->firstChild, $this);
    } else if ($rootNode->nodeName == 'errors') {
      // add element to existing object
      Recurly_Resource::__parseXmlToObject($rootNode->firstChild, $this->_errors);
    }
    $this->updateErrorAttributes();
  }

  protected static function __parseXmlToObject($node, &$object)
  {
    while ($node) {
      //print "Node: {$node->nodeType} -- {$node->nodeName}\n";

      if ($node->nodeType == XML_TEXT_NODE) {
        if ($node->wholeText != null) {
          $text = trim($node->wholeText);
          if (!empty($text))
            $object->description = $text;
        }
      } else if ($node->nodeType == XML_ELEMENT_NODE) {
        $nodeName = str_replace("-", "_", $node->nodeName);

        if ($object instanceof Recurly_Pager) {
          $new_obj = Recurly_Resource::__createNodeObject($node);
          if (!is_null($new_obj)) {
            Recurly_Resource::__parseXmlToObject($node->firstChild, $new_obj);
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
        } else if (is_array($object)) {
          if ($nodeName == 'error') {
            $object[] = Recurly_Resource::parseErrorNode($node);
            $node = $node->nextSibling;
            continue;
          }

          $new_obj = Recurly_Resource::__createNodeObject($node);
          if (!is_null($new_obj)) {
            if (is_object($new_obj) || is_array($new_obj))
              Recurly_Resource::__parseXmlToObject($node->firstChild, $new_obj);
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
              if (!is_object($object))
                $object->$nodeName = new Recurly_Stub($nodeName, $href);
              else
                $object->$nodeName = new Recurly_Stub($nodeName, $href, $object->_client);
            }
          }

        } else if ($node->firstChild->nodeType == XML_ELEMENT_NODE) {
          // has element children, drop in and continue parsing
          $new_obj = Recurly_Resource::__createNodeObject($node);
          if (!is_null($new_obj))
            $object->$nodeName = Recurly_Resource::__parseXmlToObject($node->firstChild, $new_obj);

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

  private static function __createNodeObject($node)
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
      } else
        $new_obj = new $node_class();

      $href = $node->getAttribute('href');
      if (!empty($href))
        $new_obj->setHref($href);
      else if ($new_obj instanceof Recurly_Pager) {
        $new_obj->_count = $node->childNodes->length;
      }

      return $new_obj;
    }
  }
}

// In case node_class is not specified.
class Recurly_Object {}
