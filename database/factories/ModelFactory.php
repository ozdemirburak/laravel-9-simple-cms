<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(\App\Models\User::class, function (Faker $faker) {
    static $password;
    return [
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => Str::random(10),
    ];
});

$factory->define(\App\Models\Category::class, function (Faker $faker) {
    return [
        'description' => $faker->sentence(5),
        'title' => Str::title($faker->words(2, true))
    ];
});

$factory->define(\App\Models\Page::class, function (Faker $faker, $attributes) {
    return [
        'content' => implode('<br/><br/>', $faker->paragraphs(8)),
        'description' => $faker->sentence(6),
        'title' => Str::title($faker->words(2, true))
    ];
});

$factory->define(\App\Models\Article::class, function (Faker $faker) {
    return [
        'category_id' => $faker->numberBetween(1, 5),
        'content' => implode('<br/><br/>', $faker->paragraphs(8)),
        'description' => $faker->sentence(5),
        'published_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'title' => Str::title($faker->words(4, true))
    ];
});
