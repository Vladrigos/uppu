<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\File;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(File::class, function (Faker $faker) {
    $filePath = 'public/storage/uploads/user_1/';
    $defaultFilePath = 'public/images/';
    $hashName = $faker->file($defaultFilePath, $filePath, false);
    $categories = ['abstract', 'animals', 'business', 'cats', 'city', 'food', 'nightlife', 'fashion', 'people', 'nature', 'sports', 'technics', 'transport'];

    return [
        'user_id' => '1',
        'name' => $faker->word(),
        'hash_name' => $hashName,
//      $faker->image($filePath, 320, 240, Arr::random($categories), false),
        'path' => 'uploads/user_1/' . $hashName,//$filePath . $hashName,
        'size' => 999,
        'extension' => 'png',
    ];
    //factory(\App\User::class)
});
