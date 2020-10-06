<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Review::class, function (Faker $faker) {
    return [        
        'user_id' => $faker->numberBetween($min = 1, $max = 20),
        'product_id' => $faker->numberBetween($min = 1, $max = 60),
        'title'   => $faker->text(20),
        'description'    => $faker->text(100),
        'score' => $faker->numberBetween($min = 1, $max = 5)
    ];
});
