<?php

/**
 * Represents the <rule> object in <risk_rules_triggered>
 */
class Recurly_FraudRiskRule
{
  var $code;
  var $message;

  public function __toString() {
    return "<Recurly_FraudRiskRule code=\"{$this->code}\" message=\"{$this->message}\">";
  }
}
