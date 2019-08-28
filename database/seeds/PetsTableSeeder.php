<?php

use Illuminate\Database\Seeder;
use Hexa\Shop\Infrastructure\Persistence\Models\Pet;

class PetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Pet::class)->create();

        factory(Pet::class)->create([
            'chip_identifier' => str_random(),
            'chip_implanted_at' => now(),
            'category_id' => 1
        ]);

        factory(Pet::class)->create([
            'chip_identifier' => str_random(),
            'chip_implanted_at' => now(),
            'category_id' => 2,
            'status' => 'backyard'
        ]);

        factory(Pet::class)->create([
            'chip_identifier' => str_random(),
            'chip_implanted_at' => now(),
            'category_id' => 1,
            'public' => 1
        ]);

        factory(Pet::class)->create([
            'category_id' => 2
        ]);
    }
}
