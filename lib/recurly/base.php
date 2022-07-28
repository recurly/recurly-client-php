<?php

abstract class Recurly_Base
{
  protected $_href;
  protected $_type;
  protected $_client;
  protected $_links;
  protected $_errors;
  protected $_headers;

  public function __construct($href = null, $client = null)
  {
    $this->_href = $href;
    $this->_client = is_null($client) ? new Recurly_Client() : $client;
    $this->_links = array();
    $this->resetErrors();
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

  /**
   * Returns URI for resource, throwing error if resource code is an empty string
   * @param string Resource codes and paths
   * @return string URI
   * @throws Recurly_Error
   */
  public static function _safeUri(...$params) {
    $uri = '';
    foreach($params as $param) {
      // throws error if param is an empty string
      if (empty(trim($param))) {
        throw new Recurly_Error("Resource code cannot be an empty value");
      }
      $path = '/' . rawurlencode($param);
      $uri .= $path;
    }
    return $uri;
  }

  protected static function _uriWithParams($uri, $params = null) {
    if ($uri[0] !== '/' && strpos($uri, "https") === false){
      $uri = '/' . $uri;
    }
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
    $values = $this->getValuesString(); // should be in resource?
    return "<$class$href $values>";
  }


  public function getHref() {
    return $this->_href;
  }
  public function setHref($href) {
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

  public function getErrors()
  {
    return $this->_errors;
  }

  public function resetErrors()
  {
    $this->_errors = array();
  }

  // depends on $this->getNodeName()
  protected function updateErrorAttributes()
  {
    if (sizeof($this->_errors) > 0) {
      for ($i = sizeof($this->_errors) - 1; $i >= 0; $i--) {
        $error = $this->_errors[$i];

        if (isset($error->field)) {
          if (substr($error->field, 0, strlen($this->getNodeName()) + 1) == ($this->getNodeName() . '.'))
            $error->field = substr($error->field, strlen($this->getNodeName()) + 1);
        }

        // TODO: If there are more dots, then apply these to sub elements
      }
    }
  }


  /* ******************************************************
     ** XML Parser
     ****************************************************** */

  // Use a valid Recurly_Response to populate a new object.
  protected static function __parseResponseToNewObject($response, $uri, $client) {
    $dom = new DOMDocument();

    Recurly_Client::disableXmlEntityLoading();

    if (empty($response->body) || !$dom->loadXML($response->body, LIBXML_NOBLANKS)) {
      return null;
    }

    $rootNode = $dom->documentElement;

    $obj = self::__createNodeObject($rootNode, $client);

    self::__parseXmlToObject($rootNode->firstChild, $obj, $client);

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
      self::__parseXmlToObject($rootNode->firstChild, $this, $this->_client);
    } else if ($rootNode->nodeName == 'errors') {
      // update object as errors
      self::__parseXmlToObject($rootNode->firstChild, $this->_errors, $this->_client);
    }

    $this->updateErrorAttributes();
  }

  /**
   * @param DOMElement $node    The node to parse.
   * @param mixed $parentObject An instantiation of some class, usually a Recurly_* class.
   *                            This class represents the "parent" of the current node
   *                            being parsed.
   * @param Recurly_Client $client The api client instance.
   *
   * @return mixed The instantiated object representing the `$node`.
   */
  protected static function __parseXmlToObject($node, &$parentObject, $client)
  {
    while ($node) {
      //print "Node: {$node->nodeType} -- {$node->nodeName}\n";

      if ($node->nodeType == XML_TEXT_NODE) {
        if ($node->wholeText != null) {
          $text = trim($node->wholeText);
          if (!empty($text)) {
            $parentObject->description = $text;
          }
        }
      } else if ($node->nodeType == XML_ELEMENT_NODE) {
        $nodeName = XmlTools::parseNodeName($node);

        if ($parentObject instanceof Recurly_Pager) {
          $new_obj = self::__createNodeObject($node, $parentObject->_client);
          if (!is_null($new_obj)) {
            self::__parseXmlToObject($node->firstChild, $new_obj, $parentObject->_client);
            $parentObject->_objects[] = $new_obj;
          }
          $node = $node->nextSibling;
          continue;
        } else if ($parentObject instanceof Recurly_ErrorList) {
          if ($nodeName == 'error') {
            $parentObject[] = self::__createNodeObject($node, $client);
            $node = $node->nextSibling;
            continue;
          }
        // Would prefer to do `$parentObject instanceof ArrayAccess` but Recurly_CurrencyList
        // implements that and expects to have its children assigned like `$list->USD = 123`.
        } else if (is_array($parentObject) || $parentObject instanceof Recurly_CustomFieldList) {
          if ($nodeName == 'error') {
            $parentObject[] = self::__createNodeObject($node, $client);
            $node = $node->nextSibling;
            continue;
          }

          $newObj = self::__createNodeObject($node, $client);

          if (!is_null($newObj)) {
            if (is_object($newObj) || is_array($newObj)) {
              self::__parseXmlToObject($node->firstChild, $newObj, $client);
            }
            $parentObject[] = $newObj;
          }

          $node = $node->nextSibling;
          continue;
        }

        $numChildren = $node->childNodes->length;

        if ($numChildren == 0) {
          // No children, we might have a link
          self::__processLink($node, $parentObject);
        } else if ($node->firstChild->nodeType == XML_ELEMENT_NODE) {
          // has element children, drop in and continue parsing
          $parentObjClient = property_exists($parentObject, '_client') ? $parentObject->_client : null;
          $newObj = self::__createNodeObject($node, $parentObjClient);

          if (!is_null($newObj)) {
            // sets ramp intervals to plan
            $parentObject->$nodeName = self::__parseXmlToObject($node->firstChild, $newObj, $parentObjClient);
          }
        } else {
          // we have a single text child
          $parentObject->$nodeName = XmlTools::getNodeValueFromTypeAttribute($node);
        }
      }

      $node = $node->nextSibling;
    }

    // needs to be addressed since this property lives in a trait
    // applied to a Recurly_Resourse.
    if (isset($parentObject->_unsavedKeys))
      $parentObject->_unsavedKeys = array();

    return $parentObject;
  }

  private static function __createNodeObject($node, $client)
  {
    $newObj = XmlTools::nodeToObject($node, $client);

    if ($newObj instanceof self) {
      // Recurly_Base is set up to accept a href as first arg on
      // instantiation, but some custom classes implement their own
      // construction args.
      $href = $node->getAttribute('href');
      if (!empty($href)) {
        $newObj->setHref($href);
      }

      // It may have a type attribute we wish to capture
      $typeAttribute = $node->getAttribute('type');
      if (!empty($typeAttribute)) {
        $newObj->_type = $typeAttribute;
      }
    }

    return $newObj;
  }

  private static function __processLink($node, &$object)
  {
    $href = $node->getAttribute('href');

    if (!empty($href)) {
      $nodeName = XmlTools::parseNodeName($node);

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
  }
}
