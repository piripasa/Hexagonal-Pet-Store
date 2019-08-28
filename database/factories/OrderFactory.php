<?php

use Faker\Generator as Faker;

$factory->define(Hexa\Shop\Infrastructure\Persistence\Models\Order::class, function (Faker $faker) {
    return [
        'price' => rand(400, 1000),
        'status' => 'delivered',
        'pet_id' => rand(1, 3),
        'user_id' => rand(1, 5)
    ];
});
