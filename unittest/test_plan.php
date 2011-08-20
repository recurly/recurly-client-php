<?php
require_once('../library/recurly.php');


class PlanTestCase extends UnitTestCase {
    
    function setUp() {
    }
    
    function tearDown() {
    }
    	
	function testListPlans() {
		$plans = RecurlyPlan::getPlans();
		print_r($plans);
		$this->assertIsA($plan, 'RecurlyPlan');
	}
	
	function testGetPlan() {
		$plan = RecurlyPlan::getPlan(RECURLY_SUBSCRIPTION_PLAN_CODE);
		$this->assertIsA($plan, 'RecurlyPlan');
	}
}