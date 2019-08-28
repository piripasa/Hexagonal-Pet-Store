<?php

namespace Tests\Integration;

use Hexa\Shop\Infrastructure\Persistence\Models\Order;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    function testCreateOrder()
    {
        $order = factory(Order::class)->create();
        $this->assertIsInt($order->id);
    }

    function testCreateOrderWithUpfront()
    {
        $order = factory(Order::class)->create([
            'upfront' => 100,
            'status' => 'pending'
        ]);

        $this->assertIsInt($order->id);
    }

    function testCreateOrderWithUInsurance()
    {
        $order = factory(Order::class)->create([
            'insurance_id' => 1
        ]);

        $this->assertEquals($order->insurance_id, 1);
    }

    function testUpdateOrder()
    {
        $order = factory(Order::class)->create([
            'upfront' => 100,
            'status' => 'pending'
        ]);
        $order->update(['status' => 'delivered']);
        $this->assertEquals($order->status, 'delivered');
    }

}
