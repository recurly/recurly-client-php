<?php

abstract class Recurly_Resource extends Recurly_Base
{
  protected $_values;
  protected $_unsavedKeys;
  protected $_errors;

  abstract protected function getNodeName();
  abstract protected function getWriteableAttributes();

  public function __construct($href = null, $client = null)
  {
    parent::__construct($href, $client);
    $this->_values = array();
    $this->_unsavedKeys = array();
    $this->_errors = new Recurly_ErrorList();
  }


  public function __set($k, $v)
  {
    $this->_values[$k] = $v;
    $this->_unsavedKeys[$k] = true;
  }
  public function __isset($k)
  {
    return isset($this->_values[$k]);
  }
  public function __unset($k)
  {
    unset($this->_values[$k]);
  }
  public function __get($key)
  {
    if (isset($this->_values[$key])) {
      return $this->_values[$key];
    //} else if ($this->_attributes->include($key)) {
    //  return null;
    } else if ($key == 'errors') {
      return $this->_errors;
    } else {
      return null;
    }
  }

  public function getErrors() {
    return $this->_errors;
  }



  protected function _save($method, $uri)
  {
    $this->_errors = array(); // reset errors

    if (is_null($this->_client))
      $this->_client = new Recurly_Client();

    $response = $this->_client->request($method, $uri, $this->xml());
    Recurly_Resource::__parseXmlToUpdateObject($response->body);
    $response->assertSuccessResponse($this);
  }

  /**
   * Delete the object at the given URI.
   * @param string URI of the object to delete
   * @param array Additional parameters for the delete
   */
  protected function _delete($uri, $params = null)
  {
    if (is_null($this->_client))
      $this->_client = new Recurly_Client();

    $response = $this->_client->request(Recurly_Client::DELETE, $uri);
    $response->assertSuccessResponse($this);
    return true;
  }


  public function xml()
  {
    $doc = new DOMDocument("1.0");
    $root = $doc->appendChild($doc->createElement($this->getNodeName()));
    $this->populateXmlDoc($doc, $root, $this);
    return $doc->saveXML();
  }

  protected function populateXmlDoc(&$doc, &$node, &$obj)
  {
    $attributes = $obj->getChangedAttributes();

    foreach ($attributes as $key => $val) {
      if ($val instanceof Recurly_CurrencyList) {
        $val->populateXmlDoc($doc, $node);
      } else if ($val instanceof Recurly_Resource) {
        $attribute_node = $node->appendChild($doc->createElement($key));
        $this->populateXmlDoc($doc, $attribute_node, $val);
      } else if (is_array($val)) {
      	$attribute_node = $node->appendChild($doc->createElement($key));
      	foreach ($val as $child) {
      		$child->populateXmlDoc($doc, $attribute_node, $child);
      	}
      } else {
        $node->appendChild($doc->createElement($key, $val));
      }
    }
  }

  protected function getChangedAttributes()
  {
    $attributes = array();
    foreach($this->getWriteableAttributes() as $attr) {
      if (isset($this->_unsavedKeys[$attr])) {
        $attributes[$attr] = $this->$attr;
      }
    }
    return $attributes;
  }

  protected function updateErrorAttributes()
  {
    if (sizeof($this->_errors) > 0) {
      for ($i = sizeof($this->_errors) - 1; $i >= 0; $i--) {
        $error = $this->_errors[$i];

        if (substr($error->field, 0, strlen($this->getNodeName()) + 1) == ($this->getNodeName() . '.'))
          $error->field = substr($error->field, strlen($this->getNodeName()) + 1);

        // TODO: If there are more dots, then apply these to sub elements
      }
    }
  }
}

