<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' =>  $password ?: $password = bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'color' => $faker->hexColor,
        'description' => $faker->sentence(5),
        'language_id' => $faker->numberBetween(1, 2),
        'title' => $faker->sentence(5)
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {
    return [
        'category_id' => $faker->numberBetween(1, 5),
        'content' => implode("<br/><br/>", $faker->paragraphs(8)),
        'description' => $faker->sentence(5),
        'published_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'title' => $faker->sentence(5)
    ];
});
