<?php

use Illuminate\Database\Seeder;
use Hexa\Shop\Infrastructure\Persistence\Models\Insurance;

class InsurancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Insurance::class, 1)->create([
            'name' => 'Pet Insurance',
            'value' => 10000,
            'cash_back' => 80,
            'return_duration' => 3
        ]);
    }
}
