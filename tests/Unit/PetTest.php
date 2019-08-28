<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Hexa\Shop\Application\UseCases\StorePet;
use Hexa\Shop\Application\UseCases\ShowroomPetList;
use Hexa\Shop\Application\UseCases\SellPet;
use Hexa\Shop\Application\UseCases\MoveToShowroom;
use Hexa\Shop\Application\UseCases\MoveToBackyard;
use Hexa\Shop\Application\UseCases\ImplantChip;

class PetTest extends TestCase
{
    use RefreshDatabase;

    private $service;

    public function setUp()
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    public function testStorePetSuccess()
    {
        $class = app(StorePet::class);
        $object = $class([
            'name' => 'test pet', 
            'dob' => '2016-05-05', 
            'price' => 1000,
            'description' => 'pet description', 
            'category_id' => 1
        ]);
        $this->assertIsInt($object->id);
    }

    public function testStorePetFail()
    {
        $class = app(StorePet::class);
        try {
            $class([
                'name' => 'test pet',
                'dob' => '2016-05-05',
                'price' => 1000,
                'description' => 'pet description',
                //'category_id' => 1
            ]);
            $this->fail('No exception was thrown');
        } catch (\Exception $e) {
            $this->assertInstanceOf(\Exception::class, $e);
        }
    }

    public function testImplantChipSuccess()
    {
        $class = app(ImplantChip::class);
        $object = $class(5, 'chipidentifier', '2016-05-05', 2000);

        $this->assertIsInt($object->id);
    }

    public function testImplantChipFail()
    {
        $class = app(ImplantChip::class);
        try {
            $class(100, 'chipidentifier', '2016-05-05', 2000);
            $this->fail('No exception was thrown');
        } catch (\Exception $e) {
            $this->assertInstanceOf(\Exception::class, $e);
        }
    }

    public function testShowroomPetsList()
    {
        $class = app(ShowroomPetList::class);
        $collection = $class();
        $this->assertGreaterThanOrEqual(0, $collection->count());
    }

    public function testMoveToShowroomSuccess()
    {
        $class = app(MoveToShowroom::class);
        $response = $class([3]);
        $this->assertGreaterThanOrEqual(0, $response);
    }

    public function testMoveToShowroomFail()
    {
        $class = app(MoveToShowroom::class);
        try {
            $class([1]);
            $this->fail('No exception was thrown');
        } catch (\Exception $e) {
            $this->assertInstanceOf(\Exception::class, $e);
        }
    }

    public function testMoveToBackyardSuccess()
    {
        $class = app(MoveToBackyard::class);
        $response = $class([1]);
        $this->assertGreaterThanOrEqual(0, $response);
    }

    public function testMoveToBackyardFail()
    {
        $class = app(MoveToBackyard::class);
        try {
            $class([3]);
            $this->fail('No exception was thrown');
        } catch (\Exception $e) {
            $this->assertInstanceOf(\Exception::class, $e);
        }
    }

    public function testPetSellSuccess()
    {
        $class = app(Sellpet::class);
        $response = $class(1, 1);
        $this->assertIsInt($response->id);
    }

    public function testPetSellFail()
    {
        $class = app(Sellpet::class);
        try {
            $class(1, 3);
            $this->fail('No exception was thrown');
        } catch (\Exception $e) {
            $this->assertInstanceOf(\Exception::class, $e);
        }
    }

    public function testPetSellWithInsuranceSuccess()
    {
        $class = app(Sellpet::class);
        $response = $class(1, 1, 1);
        $this->assertIsInt($response->id);
    }

    public function testPetSellWithInsuranceFail()
    {
        $class = app(Sellpet::class);
        try {
            $class(1, 1, 3);
            $this->fail('No exception was thrown');
        } catch (\Exception $e) {
            $this->assertInstanceOf(\Exception::class, $e);
        }
    }

    public function testPetSellWithUpfrontSuccess()
    {
        $class = app(Sellpet::class);
        $response = $class(1, 5, null, 'yes');
        $this->assertIsInt($response->id);
    }

    public function testPetSellWithUpfrontFail()
    {
        $class = app(Sellpet::class);
        try {
            $class(1, 5, null, 'no');
            $this->fail('No exception was thrown');
        } catch (\Exception $e) {
            $this->assertInstanceOf(\Exception::class, $e);
        }
    }

    public function testPetSellCustomerNotFound()
    {
        $class = app(Sellpet::class);
        try {
            $class(10, 1);
            $this->fail('No exception was thrown');
        } catch (\Exception $e) {
            $this->assertEquals($e->getMessage(), 'Customer not found');
        }
    }

    public function testPetSellPetNotFound()
    {
        $class = app(Sellpet::class);
        try {
            $class(1, 100);
            $this->fail('No exception was thrown');
        } catch (\Exception $e) {
            $this->assertEquals($e->getMessage(), 'Pet not found');
        }
    }

    public function testBackyardPetNotForSell()
    {
        $class = app(Sellpet::class);
        try {
            $class(1, 3);
            $this->fail('No exception was thrown');
        } catch (\Exception $e) {
            $this->assertEquals($e->getMessage(), 'Backyard pet not for sell');
        }
    }

    public function tearDown()
    {
        parent::tearDown();
    }

}
