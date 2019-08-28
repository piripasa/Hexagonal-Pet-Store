<?php

namespace Tests\Integration;

use Hexa\Shop\Infrastructure\Persistence\Models\Insurance;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InsuranceTest extends TestCase
{
    use RefreshDatabase;

    function testCreateInsurance()
    {
        $insurance = factory(Insurance::class)->create();
        $this->assertIsInt($insurance->id);
    }

}
