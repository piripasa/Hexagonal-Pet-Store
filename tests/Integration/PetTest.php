<?php

namespace Tests\Integration;

use Hexa\Shop\Infrastructure\Persistence\Models\Pet;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PetTest extends TestCase
{
    use RefreshDatabase;

    function testCreatePet()
    {
        $pet = factory(Pet::class)->create();
        $this->assertIsInt($pet->id);
    }

    function testCreatePetWithChip()
    {
        $chip_identifier = str_random();
        $pet = factory(Pet::class)->create([
            'chip_identifier' => $chip_identifier,
            'chip_implanted_at' => now(),
            'category_id' => 1
        ]);

        $this->assertEquals($pet->chip_identifier, $chip_identifier);
    }

    function testUpdatePet()
    {
        $pet = factory(Pet::class)->create();
        $pet->update(['status' => 'backyard']);
        $this->assertEquals($pet->status, 'backyard');
    }

}
