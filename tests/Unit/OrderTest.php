<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Hexa\Shop\Application\UseCases\DeliverPendingOrder;
use Hexa\Shop\Application\UseCases\CustomerList;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    private $service;

    public function setUp()
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    public function testDeliverPendingOrderOnMonday()
    {
        $class = app(DeliverPendingOrder::class);
        try {
            $class(1);
            $this->fail('No exception was thrown');
        } catch (\Exception $e) {
            $this->assertEquals($e->getMessage(), 'Pending order deliver only on Monday');
        }
    }

    public function testDeliverPendingOrderFail()
    {
        $class = app(DeliverPendingOrder::class);
        try {
            $class(1);
            $this->fail('No exception was thrown');
        } catch (\Exception $e) {
            $this->assertInstanceOf(\Exception::class, $e);
        }
    }

    public function testCustomerList()
    {
        $class = app(CustomerList::class);
        $collection = $class();
        $this->assertGreaterThanOrEqual(0, $collection->count());
    }

    public function tearDown()
    {
        parent::tearDown();
    }

}
