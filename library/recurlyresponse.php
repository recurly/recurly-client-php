<?php

/**
 * @category   Recurly
 * @package    Recurly_Client_PHP
 * @copyright  Copyright (c) 2009 {@link http://recurly.com Recurly, Inc.}
 */
class RecurlyResponse extends DOMDocument
{
	private $_responseType;
	private $_array;
	
	/**
	 * Constructor
	 *
	 * @param $response string well formed xml
	 * @throws Recurly_Response_Exception in the event the xml is not well formed
	 */
	public function __construct($response)
	{
		$this->_array = null;
		parent::__construct('1.0', 'UTF-8');
		if (!$this->loadXML($response))
			throw new Recurly_Response_Exception("Response failed to load into the DOM.\n\n$response", Recurly_Response_Exception::UNKNOWN);
		
		if ($this->documentElement->nodeName == 'error')
		{
			$this->_responseType = 'error';
			$this->handleError();
		}
		$this->_responseType = $this->documentElement->nodeName;
	}

	/**
	 * Get the response type for this request object -- usually corresponds to the root node name
	 *
	 * @return string
	 */
	public function getResponseType()
	{
		return $this->_responseType;
	}

	/**
	 * Get a nested array representation of the response doc
	 *
	 * @return array
	 */
	public function toArray()
	{
		if ($this->_array)
			return $this->_array;
		
		$root = $this->documentElement;
		if ($root == 'error')
		{
			return array(
				0 => array(
					'code' => $root->getAttribute('code'),
					'message' => $root->firstChild->nodeValue
				)
			);
		}
		$this->_array = $this->_toArray($root->childNodes);
		return $this->_array;
	}

	/**
	 * Recursive method to traverse the dom and produce an array
	 *
	 * @return array
	 */
	protected function _toArray(DOMNodeList $nodes)
	{
		$array = array();
		foreach ($nodes as $node)
		{
			if ($node->nodeType != XML_ELEMENT_NODE)
				continue;

			if ($node->hasAttributes())
			{
				if ($node->hasAttribute('code') && $node->getAttribute('code')) {  
					$key = $node->getAttribute('code');
					$array[$key] = array();
					if ($node->hasAttribute('id')) {
						$array[$key] = array(
							'id' => $node->getAttribute('id')
						);
					}
					$array[$key] = $array[$key] + array('code'=>$key);
				} else {
					$key = $node->getAttribute('id');
					$array[$key] = array();
				}
				$array[$key] = $array[$key] + $this->_toArray($node->childNodes);
			} else {
				if ($node->childNodes->length > 1) { // sub array
					$array[$node->tagName] = $this->_toArray($node->childNodes);
				} else {
					$array[$node->tagName] = $node->nodeValue;
				}
			}
		}
		return $array;
	}
	
	
	protected function handleError()
	{
		throw new RecurlyException($this->documentElement->firstChild->nodeValue, $this->documentElement->getAttribute('code'));
	}
	
	public function __toString()
	{
		return $this->saveXML();
	}
}
