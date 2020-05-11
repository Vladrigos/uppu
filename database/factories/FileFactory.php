<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\File;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(File::class, function (Faker $faker) {
    $filePath = 'public/storage/uploads/';
    $categories = ['abstract', 'animals', 'business', 'cats', 'city', 'food', 'nightlife', 'fashion', 'people', 'nature', 'sports', 'technics', 'transport'];
    return [
        'user_id' => 2,
        'name' => $faker->word(),
        'hash_name' => $faker->file($filePath . "user_1", $filePath . "user_2", false),
//      $faker->image($filePath, 320, 240, Arr::random($categories), false),
        'size' => 999,
        'comment' => $faker->sentence(6),
        'extension' => 'png',
    ];
});
