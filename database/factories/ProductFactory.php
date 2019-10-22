<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
		'name' => $faker->userName,
		'price' => $faker->randomNumber(2),
		'quantity' => $faker->randomNumber(2),
		'category_id' => 1,
		'image' => $faker->imageUrl(),
		'status' => '1',
		'created_at' => now(),
		'updated_at' => now(),
		'image_ext' => 1,
		'original_name' => $faker->userName
    ];
});
