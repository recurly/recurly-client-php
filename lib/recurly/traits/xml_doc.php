<?php

/**
 * The purpose of this trait is to move XML rendering into its
 * own module. It enforces implementors to provide a node
 * name that ends up being the root node when the xml is built.
 * It also sets up a way to add children so that a single render
 * of a node will render all its children in a cascaded manner.
 * Essentially, the `$_values` array represents child nodes. Keys
 * represent the node names and the values are either the primitive
 * values themselves or an object that represents another tree
 * of nodes (e.g. $plan->unit_amount_in_cents is a Recurly_CurrencyList).
 */
trait XmlDoc {
  protected $_values = array();
  protected $_unsavedKeys = array();

  abstract protected function getNodeName();
  abstract protected function getWriteableAttributes();


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
    } else {
      $null_val = null;
      return $null_val;
    }
  }


  /**
   * Return all of the values associated with this resource.
   *
   * @return array
   *   The array of values stored with this resource.
   */
  public function getValues()
  {
    return $this->_values;
  }

  /**
   * Does a mass assignment on this resource's values
   *
   * @param array $values The array of values to set on the resource.
   * @return $this
   */
  public function setValues($values)
  {
    foreach($values as $key => $value) {
      $this->_values[$key] = $value;
    }
    return $this;
  }

  protected function getRequiredAttributes()
  {
    return array();
  }

  // goes through $this->_values
  protected function getChangedAttributes($nested = false)
  {
    $attributes = array();
    $writableAttributes = $this->getWriteableAttributes();
    $requiredAttributes = $this->getRequiredAttributes();

    foreach($writableAttributes as $attrName) {
      if (!array_key_exists($attrName, $this->_values)) { continue; }

      $attrValue = $this->_values[$attrName];

      if (isset($this->_unsavedKeys[$attrName]) ||
         $nested && in_array($attrName, $requiredAttributes) ||
         (is_array($attrValue) ||
         $attrValue instanceof ArrayAccess))
      {
        $attributes[$attrName] = $attrValue;
      }

      // Check for nested objects.
      if (is_object($attrValue) && method_exists($attrValue, 'getChangedAttributes')) {
        if ($attrValue->getChangedAttributes()) {
          $attributes[$attrName] = $attrValue;
        }
      }
    }

    return $attributes;
  }

  protected function getValuesString() {
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

  /////////////////
  // XML Operations
  //

  // should be in Recurly_Resource?
  public function xml()
  {
    $doc = XmlTools::createDocument();
    $rootNode = $this->buildNode($doc);
    $doc->appendChild($rootNode);

    return XmlTools::renderXML($doc);
  }


  // buildNode should be in XmlNode (here) but Recurly_Resource builds
  // the doc with the node (xml())

  // creates the "root" node and populates its children bases
  // on the common `populateXmlDoc()` method. this node is added
  // to a freshly-created document.
  //
  // @param DOMDocument $doc
  // @returns {DOMNode} This node with all its children.
  public function buildNode($doc) {
    $rootNode = $doc->createElement($this->getNodeName());
    $this->populateXmlDoc($doc, $rootNode, $this);

    return $rootNode;
  }

  // mutative. $node gets children.
  public function populateXmlDoc(&$doc, &$node, &$obj, $nested = false)
  {
    $attributes = $obj->getChangedAttributes($nested);

    foreach ($attributes as $key => $val) {
      // echo "\n[XmlDoc::populateXmlDoc] processing: $key\n\n";
      // If we get another object that handles its own XML serialization but
      // doesn't extend Recurly_Resource we should add an interface for this.
      if ($val instanceof Recurly_CurrencyList || $val instanceof Recurly_CustomFieldList) {
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
            $keyIsPlural = substr($key, -1) == "s";
            $singularKeyName = substr($key, 0, -1);

            // refactor opportunity: the "plural -> create singular child wrapper"
            // pattern (i.e. $keyIsPlural == true) should be the default and a
            // way to override should be provided (e.g. if populateXmlDoc is defined
            // in the $childValue).
            if (is_object($childValue)) {
              // e.g. "<subscription_add_ons><subscription_add_on>...</subscription_add_on></subscription_add_ons>"
              $childValue->populateXmlDoc($doc, $attribute_node, $childValue);
            } else if ($keyIsPlural) {
              // e.g. "<plan_codes><plan_code>gold</plan_code><plan_code>monthly</plan_code></plan_codes>"
              $attribute_node->appendChild($doc->createElement($singularKeyName, $childValue));
            }
          }
        }
      } else if (is_null($val)) {
        $domAttribute = $doc->createAttribute('nil');
        $domAttribute->value = 'nil';
        $attribute_node = $node->appendChild($doc->createElement($key));
        $attribute_node->appendChild($domAttribute);
      } else {
        if ($val instanceof DateTime) {
          $val = $val->format('c');
        } else if (is_bool($val)) {
          $val = ($val ? 'true' : 'false');
        }
        $attribute_node = $node->appendChild($doc->createElement($key));
        $attribute_node->appendChild($doc->createTextNode($val));
      }
    }
  }
}
