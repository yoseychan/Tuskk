<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'user_id' => $faker->numberBetween(1, 5),
        'category_id' => $faker->numberBetween(1, 3),
        'body' => $faker->paragraph(2),
        'image' => 'https://cdn.pixabay.com/photo/2017/09/24/14/01/alpaca-2781920_960_720.jpg'
     ];
});
