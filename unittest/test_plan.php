<?php
require_once('../library/recurly.php');


class PlanTestCase extends UnitTestCase {
    
    function setUp() {
    }
    
    function tearDown() {
    }
    	
	function testListPlans() {
		$plans = RecurlyPlan::getPlans();
		$this->assertIsA($plans, 'Array');
		$this->assertIsA($plans[0], 'RecurlyPlan');
	}
	
	function testGetPlan() {
		$plan = RecurlyPlan::getPlan(RECURLY_SUBSCRIPTION_PLAN_CODE);
		$this->assertIsA($plan, 'RecurlyPlan');
	}
}