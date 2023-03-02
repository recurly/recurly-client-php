<?php

class RecurlyEntitlementListTest extends Recurly_TestCase
{
  function defaultResponses(): array {
    return array(
      array('GET', '/accounts/abcdef1234567890/entitlements', 'accounts/entitlements/index-200.xml')
    );
  }

  public function testLoad() {
    $entitlements = Recurly_EntitlementList::get('abcdef1234567890', null, $this->client);

    $this->assertInstanceOf('Recurly_EntitlementList', $entitlements);

    $entitlement = $entitlements->current();
    $this->assertInstanceOf('Recurly_Entitlement', $entitlement);
    $this->assertInstanceOf('Recurly_Stub', $entitlement->account);
    $this->assertInstanceOf('DateTime', $entitlement->created_at);
    $this->assertInstanceOf('DateTime', $entitlement->updated_at);

    $customer_permission = $entitlement->customer_permission;
    $this->assertEquals($customer_permission->id, 'rmi7c52kfr1h');
    $this->assertEquals($customer_permission->code, 'hellocode');
    $this->assertEquals($customer_permission->name, 'helloname');
    $this->assertEquals($customer_permission->description, 'hellodesc');

    $granted_by = $entitlement->granted_by;
    $this->assertInstanceOf('Recurly_Subscription', $granted_by[0]);
    $this->assertInstanceOf('Recurly_Subscription', $granted_by[1]);
    $this->assertInstanceOf('Recurly_Subscription', $granted_by[2]);
    $this->assertInstanceOf('Recurly_ExternalSubscription', $granted_by[3]);
  }
}
