<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Artikel::class, function (Faker $faker) {

    return [
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
        'author' => $faker->name,
        'image' => 'artikel_images/'.$faker->image($dir = storage_path('app/public/artikel_images'), $width = 400, $height =400, 'cats', false)
    ];
});
