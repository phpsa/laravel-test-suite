<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Profile;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {

    $totalUsers = User::count();

    return [
        'gender' => $faker->randomElement(['male','female','other']),
        'dob'    => $faker->dateTimeBetween('-30 years', '-10 years')
    ];
});
