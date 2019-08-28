<?php

use Faker\Generator as Faker;

$factory->define(Hexa\Shop\Infrastructure\Persistence\Models\Pet::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'dob' => $faker->date(),
        'price' => $faker->numberBetween(300, 1000),
        'description' => $faker->sentence,
        'status' => 'showroom',
        'category_id' => 3
    ];
});
