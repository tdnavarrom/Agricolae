<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 3),
        'name'   => $faker->text(40),
        'description'    => $faker->text(100),
        'category' => $faker->randomElement(['veggies','tubers','legumes','fruits','nuts','cereals']),
        'price' => $faker->numberBetween($min = 1000, $max = 100000),
        'units' => $faker->randomElement(['unit','pound','kilogram']),
        'rating' => $faker->numberBetween($min = 1, $max = 5),
        'image' => '1604544606DButt.jpg'
    ];
});
