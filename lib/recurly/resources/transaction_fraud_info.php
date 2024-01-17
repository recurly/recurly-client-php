<?php
/**
 * This file is automatically created by Recurly's OpenAPI generation process
 * and thus any edits you make by hand will be lost. If you wish to make a
 * change to this file, please create a Github issue explaining the changes you
 * need and we will usher them to the appropriate places.
 */
namespace Recurly\Resources;

use Recurly\RecurlyResource;

// phpcs:disable
class TransactionFraudInfo extends RecurlyResource
{
    private $_decision;
    private $_object;
    private $_reference;
    private $_risk_rules_triggered;
    private $_score;

    protected static $array_hints = [
        'setRiskRulesTriggered' => '\Recurly\Resources\FraudRiskRule',
    ];

    
    /**
    * Getter method for the decision attribute.
    * Kount decision
    *
    * @return ?string
    */
    public function getDecision(): ?string
    {
        return $this->_decision;
    }

    /**
    * Setter method for the decision attribute.
    *
    * @param string $decision
    *
    * @return void
    */
    public function setDecision(string $decision): void
    {
        $this->_decision = $decision;
    }

    /**
    * Getter method for the object attribute.
    * Object type
    *
    * @return ?string
    */
    public function getObject(): ?string
    {
        return $this->_object;
    }

    /**
    * Setter method for the object attribute.
    *
    * @param string $object
    *
    * @return void
    */
    public function setObject(string $object): void
    {
        $this->_object = $object;
    }

    /**
    * Getter method for the reference attribute.
    * Kount transaction reference ID
    *
    * @return ?string
    */
    public function getReference(): ?string
    {
        return $this->_reference;
    }

    /**
    * Setter method for the reference attribute.
    *
    * @param string $reference
    *
    * @return void
    */
    public function setReference(string $reference): void
    {
        $this->_reference = $reference;
    }

    /**
    * Getter method for the risk_rules_triggered attribute.
    * A list of fraud risk rules that were triggered for the transaction.
    *
    * @return array
    */
    public function getRiskRulesTriggered(): array
    {
        return $this->_risk_rules_triggered ?? [] ;
    }

    /**
    * Setter method for the risk_rules_triggered attribute.
    *
    * @param array $risk_rules_triggered
    *
    * @return void
    */
    public function setRiskRulesTriggered(array $risk_rules_triggered): void
    {
        $this->_risk_rules_triggered = $risk_rules_triggered;
    }

    /**
    * Getter method for the score attribute.
    * Kount score
    *
    * @return ?int
    */
    public function getScore(): ?int
    {
        return $this->_score;
    }

    /**
    * Setter method for the score attribute.
    *
    * @param int $score
    *
    * @return void
    */
    public function setScore(int $score): void
    {
        $this->_score = $score;
    }
}