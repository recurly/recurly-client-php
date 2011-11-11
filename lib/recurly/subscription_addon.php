<?php

class Recurly_SubscriptionAddOn extends Recurly_Resource {
	
	protected static $_writeableAttributes;
	
	public static function init() {
		Recurly_SubscriptionAddOn::$_writeableAttributes = array(
			'add_on_code',
			'quantity',
			'unit_amount_in_cents'
		);
	}
	
	protected function getNodeName() {
		return 'subscription_add_on';
	}
	
	protected function getWriteableAttributes() {
		return Recurly_SubscriptionAddOn::$_writeableAttributes;
	}
	
	
	protected function populateXmlDoc(&$doc, &$node, &$obj) {
		$addonNode = $node->appendChild($doc->createElement($this->getNodeName()));
		parent::populateXmlDoc($doc, $addonNode, $obj);
	}
	

}

Recurly_SubscriptionAddOn::init();

