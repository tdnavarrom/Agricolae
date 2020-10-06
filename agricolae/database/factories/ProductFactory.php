<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'name'   => $faker->text(40),
        'description'    => $faker->text(100),
        'category' => $faker->randomElement(['veggies','tubers','legumes','fruits','nuts','cereals']),
        'price' => $faker->numberBetween($min = 1000, $max = 100000),
        'units' => $faker->numberBetween($min = 1, $max = 1000000),
        'image' => $faker->imageUrl($width = 640, $height = 480) // 'http://lorempixel.com/640/480/'
    ];
});
