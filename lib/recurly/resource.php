<?php

abstract class Recurly_Resource extends Recurly_Base
{
  protected $_values;
  protected $_unsavedKeys;
  protected $_errors;

  abstract protected function getNodeName();
  abstract protected function getWriteableAttributes();
  abstract protected function getRequiredAttributes();

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
  public function &__get($key)
  {
    if (isset($this->_values[$key])) {
      return $this->_values[$key];
    //} else if ($this->_attributes->include($key)) {
    //  return null;
    } else if ($key == 'errors') {
      return $this->_errors;
    } else {
      $null_val = null;
      return $null_val;
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
  protected function _delete($uri)
  {
    if (is_null($this->_client))
      $this->_client = new Recurly_Client();

    $response = $this->_client->request(Recurly_Client::DELETE, $uri);
    if($response->body) {
      Recurly_Resource::__parseXmlToUpdateObject($response->body);
    }
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

  protected function populateXmlDoc(&$doc, &$node, &$obj, $nested = false)
  {
    $attributes = $obj->getChangedAttributes($nested);

    foreach ($attributes as $key => $val) {
      if ($val instanceof Recurly_CurrencyList) {
        $val->populateXmlDoc($doc, $node);
      } else if ($val instanceof Recurly_Resource) {
        $attribute_node = $node->appendChild($doc->createElement($key));
        $this->populateXmlDoc($doc, $attribute_node, $val, true);
      } else if (is_array($val)) {
      	$attribute_node = $node->appendChild($doc->createElement($key));
        foreach ($val as $child => $childValue) {
          if (is_null($child) || is_null($childValue)) {
            continue;
          }
          elseif (is_string($child)) {
            // e.g. "<discount_in_cents><USD>1000</USD></discount_in_cents>"
            $attribute_node->appendChild($doc->createElement($child, $childValue));
          }
          elseif (is_int($child)) {
            if (is_object($childValue)) {
              // e.g. "<subscription_add_ons><subscription_add_on>...</subscription_add_on></subscription_add_ons>"
              $childValue->populateXmlDoc($doc, $attribute_node, $childValue);
            }
            elseif (substr($key, -1) == "s") {
              // e.g. "<plan_codes><plan_code>gold</plan_code><plan_code>monthly</plan_code></plan_codes>"
              $attribute_node->appendChild($doc->createElement(substr($key, 0, -1), $childValue));
            }
          }
      	}
      } else {
        if ($val instanceof DateTime) {
          $val = $val->format('c');
        } else if (is_bool($val)) {
          $val = ($val ? 1 : 0);
        }
        $node->appendChild($doc->createElement($key, $val));
      }
    }
  }

  protected function getChangedAttributes($nested = false)
  {
    $attributes = array();
    $writableAttributes = $this->getWriteableAttributes();
    $requiredAttributes = $this->getRequiredAttributes();

    foreach($writableAttributes as $attr) {
      if(!isset($this->_values[$attr])) { continue; }

      if(isset($this->_unsavedKeys[$attr]) ||
         $nested && in_array($attr, $requiredAttributes) ||
         (is_array($this->_values[$attr]) || $this->_values[$attr] instanceof ArrayAccess))
      {
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

        if (isset($error->field)) {
          if (substr($error->field, 0, strlen($this->getNodeName()) + 1) == ($this->getNodeName() . '.'))
            $error->field = substr($error->field, strlen($this->getNodeName()) + 1);
        }

        // TODO: If there are more dots, then apply these to sub elements
      }
    }
  }
}

