<?php

use Faker\Generator as Faker;

$factory->define(Hexa\Shop\Infrastructure\Persistence\Models\Insurance::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(),
        'value' => 10000,
        'cash_back' => 80,
        'return_duration' => 3
    ];
});
