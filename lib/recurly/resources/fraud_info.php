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
class FraudInfo extends RecurlyResource
{
    private $_decision;
    private $_risk_rules_triggered;
    private $_score;

    protected static $array_hints = array(
    );

    
    /**
    * Getter method for the decision attribute.
    *
    * @return string Kount decision
    */
    public function getDecision(): string
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
    public function setDecision(string $value): void
    {
        $this->_decision = $value;
    }

    /**
    * Getter method for the risk_rules_triggered attribute.
    *
    * @return object Kount rules
    */
    public function getRiskRulesTriggered(): object
    {
        return $this->_risk_rules_triggered;
    }

    /**
    * Setter method for the risk_rules_triggered attribute.
    *
    * @param object $risk_rules_triggered
    *
    * @return void
    */
    public function setRiskRulesTriggered(object $value): void
    {
        $this->_risk_rules_triggered = $value;
    }

    /**
    * Getter method for the score attribute.
    *
    * @return int Kount score
    */
    public function getScore(): int
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
    public function setScore(int $value): void
    {
        $this->_score = $value;
    }
}