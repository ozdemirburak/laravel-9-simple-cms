<?php

$factory('App\User', [
    'name' => $faker->userName,
    'email' => $faker->email,
    'password' => $faker->sha256
]);

$factory('App\Category', [
    'language_id' => $faker->numberBetween(1,2),
    'title' => $faker->sentence(5),
    'slug' => $faker->slug,
    'description' => $faker->sentence(5),
    'color' => $faker->hexcolor
]);

$factory('App\Article', [
    'category_id' => $faker->numberBetween(1,5),
    'title' => $faker->sentence(5),
    'slug' => $faker->slug,
    'content' => $faker->paragraphs(8),
    'published_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
    'description' => $faker->sentence(5)
]);