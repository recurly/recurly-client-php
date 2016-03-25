<?php

namespace Recurly;

use Recurly\Errors\FieldError;

abstract class Base
{
    protected $_href;
    protected $_client;
    protected $_links;

    public function __construct($href = null, $client = null)
    {
        $this->_href = $href;
        $this->_client = is_null($client) ? new Client() : $client;
        $this->_links = array();
    }

    /**
     * Request the URI, validate the response and return the object.
     *
     * @param string $uri,   if not fully qualified, the base URL will be appended
     * @param string $client for the request, useful for mocking the client
     *
     * @return mixed
     *
     * @throws Errors\ApiLimitError
     * @throws Errors\ConnectionError
     * @throws Errors\Error
     * @throws Errors\NotFoundError
     * @throws Errors\RequestError
     * @throws Errors\ServerError
     * @throws Errors\UnauthorizedError
     */
    public static function _get($uri, $client = null)
    {
        if (is_null($client)) {
            $client = new Client();
        }
        $response = $client->request(Client::GET, $uri);
        $response->assertValidResponse();

        return self::__parseResponseToNewObject($response, $uri, $client);
    }

    /**
     * Post to the URI, validate the response and return the object.
     *
     * @param string Resource URI, if not fully qualified, the base URL will be appended
     * @param string Data to post to the URI
     * @param string Optional client for the request, useful for mocking the client
     */
    protected static function _post($uri, $data = null, $client = null)
    {
        if (is_null($client)) {
            $client = new Client();
        }
        $response = $client->request(Client::POST, $uri, $data);
        $response->assertValidResponse();
        $object = self::__parseResponseToNewObject($response, $uri, $client);
        $response->assertSuccessResponse($object);

        return $object;
    }

    /**
     * Put to the URI, validate the response and return the object.
     *
     * @param string Resource URI, if not fully qualified, the base URL will be appended
     * @param string Optional client for the request, useful for mocking the client
     */
    protected static function _put($uri, $client = null)
    {
        if (is_null($client)) {
            $client = new Client();
        }
        $response = $client->request(Client::PUT, $uri);
        $response->assertValidResponse();
        if ($response->body) {
            $object = self::__parseResponseToNewObject($response, $uri, $client);
        }
        $response->assertSuccessResponse($object);

        return $object;
    }

    /**
     * Delete the URI, validate the response and return the object.
     *
     * @param string Resource URI, if not fully qualified, the base URL will be appended
     * @param string Optional client for the request, useful for mocking the client
     */
    protected static function _delete($uri, $client = null)
    {
        if (is_null($client)) {
            $client = new Client();
        }
        $response = $client->request(Client::DELETE, $uri);
        $response->assertValidResponse();
        if ($response->body) {
            return self::__parseResponseToNewObject($response, $uri, $client);
        }

        return;
    }

    protected static function _uriWithParams($uri, $params = null)
    {
        if (is_null($params) || !is_array($params)) {
            return $uri;
        }

        $vals = array();
        foreach ($params as $k => $v) {
            $vals[] = $k.'='.urlencode($v);
        }

        return $uri.'?'.implode($vals, '&');
    }

    /**
     * Pretty string version of the object.
     */
    public function __toString()
    {
        $href = $this->getHref();

        if (empty($href)) {
            $href = '[new]';
        } else {
            $href = '[href='.$href.']';
        }

        $class = get_class($this);
        $values = $this->__valuesString();

        return "<$class$href $values>";
    }

    protected function __valuesString()
    {
        $values = array();
        ksort($this->_values);

        foreach ($this->_values as $key => $value) {
            if (is_null($value)) {
                $values[] = "$key=null";
            } else {
                if (is_int($value)) {
                    $values[] = "$key=$value";
                } else {
                    if (is_bool($value)) {
                        $values[] = "$key=".($value ? 'true' : 'false');
                    } else {
                        if ($value instanceof Stub) {
                            $values[] = "$key=$value";
                        } else {
                            if (is_array($value)) {
                                $innerValues = array();
                                foreach ($value as $innerValue) {
                                    $innerValues[] = strval($innerValue);
                                }
                                $innerValues = implode($innerValues, ', ');
                                $values[] = "$key=[$innerValues]";
                            } else {
                                if ($value instanceof \DateTime) {
                                    $values[] = "$key=\"".$value->format('Y-m-d H:i:s P').'"';
                                } else {
                                    $values[] = "$key=\"$value\"";
                                }
                            }
                        }
                    }
                }
            }
        }

        return implode($values, ', ');
    }

    public function getHref()
    {
        return $this->_href;
    }

    public function setHref($href)
    {
        $this->_href = $href;
    }

    private function addLink($name, $href, $method)
    {
        $this->_links[$name] = new Link($name, $href, $method);
    }

    public function getLinks()
    {
        return $this->_links;
    }

    /* ******************************************************
       ** XML Parser
       ****************************************************** */
    /**
     * Mapping of XML node to PHP object name.
     */
    public static $class_map = array(
        'account' => 'Account',
        'accounts' => 'AccountList',
        'address' => 'Address',
        'add_on' => 'Addon',
        'add_ons' => 'AddonList',
        'billing_info' => 'BillingInfo',
        'adjustment' => 'Adjustment',
        'adjustments' => 'AdjustmentList',
        'coupon' => 'Coupon',
        'unique_coupon_codes' => 'UniqueCouponCodeList',
        'currency' => 'Currency',
        'details' => 'array',
        'discount_in_cents' => 'CurrencyList',
        'error' => 'Errors\FieldError',
        'errors' => 'Errors\ErrorList',
        'invoice' => 'Invoice',
        'invoices' => 'InvoiceList',
        'line_items' => 'array',
        'note' => 'Note',
        'notes' => 'NoteList',
        'plan' => 'Plan',
        'plans' => 'PlanList',
        'plan_code' => 'string',
        'plan_codes' => 'array',
        'pending_subscription' => 'Subscription',
        'redemption' => 'CouponRedemption',
        'redemptions' => 'CouponRedemptionList',
        'setup_fee_in_cents' => 'CurrencyList',
        'subscription' => 'Subscription',
        'subscriptions' => 'SubscriptionList',
        'subscription_add_ons' => 'array',
        'subscription_add_on' => 'SubscriptionAddon',
        'tax_detail' => 'TaxDetail',
        'tax_details' => 'array',
        'transaction' => 'Transaction',
        'transactions' => 'TransactionList',
        'transaction_error' => 'Errors\TransactionError',
        'unit_amount_in_cents' => 'CurrencyList',
    );

    // Use a valid Response to populate a new object.
    protected static function __parseResponseToNewObject($response, $uri, $client)
    {
        $dom = new \DOMDocument();
        if (empty($response->body) || !$dom->loadXML($response->body, LIBXML_NOBLANKS)) {
            return;
        }

        $rootNode = $dom->documentElement;

        $obj = Resource::__createNodeObject($rootNode);
        $obj->_client = $client;
        Resource::__parseXmlToObject($rootNode->firstChild, $obj);
        if ($obj instanceof self) {
            $obj->_afterParseResponse($response, $uri);
        }

        return $obj;
    }

    // Optional method to allow objects access to the full response with headers.
    protected function _afterParseResponse($response, $uri)
    {
    }

    // Use the XML to update $this object.
    protected function __parseXmlToUpdateObject($xml)
    {
        $dom = new \DOMDocument();
        if (empty($xml) || !$dom->loadXML($xml, LIBXML_NOBLANKS)) {
            return;
        }

        $rootNode = $dom->documentElement;

        if ($rootNode->nodeName == $this->getNodeName()) {
            // update the current object
            Resource::__parseXmlToObject($rootNode->firstChild, $this);
        } else {
            if ($rootNode->nodeName == 'errors') {
                // add element to existing object
                Resource::__parseXmlToObject($rootNode->firstChild, $this->_errors);
            }
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
                    if (!empty($text)) {
                        $object->description = $text;
                    }
                }
            } else {
                if ($node->nodeType == XML_ELEMENT_NODE) {
                    $nodeName = str_replace('-', '_', $node->nodeName);

                    if ($object instanceof Pager) {
                        $new_obj = Resource::__createNodeObject($node);
                        if (!is_null($new_obj)) {
                            Resource::__parseXmlToObject($node->firstChild, $new_obj);
                            $object->_objects[] = $new_obj;
                        }
                        $node = $node->nextSibling;
                        continue;
                    } else {
                        if ($object instanceof ErrorList) {
                            if ($nodeName == 'error') {
                                $object[] = Resource::parseErrorNode($node);
                                $node = $node->nextSibling;
                                continue;
                            }
                        } else {
                            if (is_array($object)) {
                                if ($nodeName == 'error') {
                                    $object[] = Resource::parseErrorNode($node);
                                    $node = $node->nextSibling;
                                    continue;
                                }

                                $new_obj = Resource::__createNodeObject($node);
                                if (!is_null($new_obj)) {
                                    if (is_object($new_obj) || is_array($new_obj)) {
                                        Resource::__parseXmlToObject($node->firstChild, $new_obj);
                                    }
                                    $object[] = $new_obj;
                                }
                                $node = $node->nextSibling;
                                continue;
                            }
                        }
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
                                    $object->$nodeName = new Stub($nodeName, $href);
                                } else {
                                    $object->$nodeName = new Stub($nodeName, $href, $object->_client);
                                }
                            }
                        }
                    } else {
                        if ($node->firstChild->nodeType == XML_ELEMENT_NODE) {
                            // has element children, drop in and continue parsing
                            $new_obj = Resource::__createNodeObject($node);
                            if (!is_null($new_obj)) {
                                $object->$nodeName = Resource::__parseXmlToObject($node->firstChild, $new_obj);
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
                                        $object->$nodeName = new \DateTime($node->nodeValue);
                                        break;
                                    case 'float':
                                        $object->$nodeName = (float) $node->nodeValue;
                                        break;
                                    case 'integer':
                                        $object->$nodeName = (int) $node->nodeValue;
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
                }
            }

            $node = $node->nextSibling;
        }

        if (isset($object->_unsavedKeys)) {
            $object->_unsavedKeys = array();
        }

        return $object;
    }

    private static function parseErrorNode($node)
    {
        $error = new FieldError();
        $error->field = $node->getAttribute('field');
        $error->symbol = $node->getAttribute('symbol');
        $error->description = $node->firstChild->wholeText;

        return $error;
    }

    private static function __createNodeObject($node)
    {
        $nodeName = str_replace('-', '_', $node->nodeName);

        if (!array_key_exists($nodeName, Resource::$class_map)) {
            return; // Unknown element
        }

        $node_class = Resource::$class_map[$nodeName];

        if ($node_class == null) {
            return new Object();
        } else {
            if ($node_class == 'array') {
                return array();
            } else {
                if ($node_class == 'string') {
                    return $node->firstChild->wholeText;
                } else {
                    $node_class = 'Recurly\\'.$node_class;
                    if ($node_class == 'Recurly\CurrencyList') {
                        $new_obj = new $node_class($nodeName);
                    } else {
                        $new_obj = new $node_class();
                    }

                    $href = $node->getAttribute('href');
                    if (!empty($href)) {
                        $new_obj->setHref($href);
                    }

                    return $new_obj;
                }
            }
        }
    }
}
