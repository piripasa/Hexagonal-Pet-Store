<?php

use Illuminate\Database\Seeder;
use Hexa\Shop\Infrastructure\Persistence\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class)->create([
            'name' => 'Cat',
            'showroom_limit' => 10,
            'backyard_limit' => 30,
            'need_chip' => 1,
            'chip_age_limit' => 2,
            'chip_price' => 200,
            'upfront' => 20
        ]);

        factory(Category::class)->create([
            'name' => 'Dog',
            'showroom_limit' => 5,
            'backyard_limit' => 15,
            'need_chip' => 1,
            'chip_age_limit' => 2,
            'chip_price' => 200,
            'upfront' => 20
        ]);

        factory(Category::class)->create([
            'name' => 'Bird',
            'showroom_limit' => 15,
            'backyard_limit' => 30,
            'need_chip' => 0,
            'chip_age_limit' => null
        ]);
    }
}
