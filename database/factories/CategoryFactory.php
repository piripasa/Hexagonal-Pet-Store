<?php

use Faker\Generator as Faker;

$factory->define(Hexa\Shop\Infrastructure\Persistence\Models\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'showroom_limit' => 10,
        'backyard_limit' => 30
    ];
});
