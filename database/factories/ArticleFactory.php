<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'user_id' => $faker->numberBetween(2, 6),
        'category_id' => $faker->numberBetween(1, 3),
        'body' => $faker->paragraph(20),
        'excerpt'=> $faker->paragraph(2),
        'image' => 'https://source.unsplash.com/300x225/?dog'
     ];
});
