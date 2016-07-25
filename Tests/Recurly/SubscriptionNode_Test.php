<?php 

class SubscriptionNode_Test extends Recurly_TestCase {
    
    function testReactivateSubscriptionNodeFromSubscriptionList() {
        $params = array('other' => 'pickles');
        $uri = '/subscriptions?other=pickles&state=canceled';
        $this->client->addResponse('GET', $uri, 'subscriptions/index-200.xml');
        $reactivate_uri = 'https://api.recurly.com/v2/subscriptions/32558dd8a07eec471fbe6642d3a422f4/reactivate';
        $this->client->addResponse('PUT', $reactivate_uri, 'subscriptions/show-200.xml');
        $subscriptions = Recurly_SubscriptionList::getCanceled($params, $this->client);
        $first_subscription_node = $subscriptions->current();
        $this->assertInstanceOf( 'Recurly_Subscription', $first_subscription_node );
        $first_subscription_node->reactivate();
        $this->assertEquals( 'active', $first_subscription_node->state );

    }
    
}