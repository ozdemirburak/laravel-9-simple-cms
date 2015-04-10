<?php

$factory('App\User', [
    'name' => $faker->userName,
    'email' => $faker->email,
    'password' => $faker->sha256
]);