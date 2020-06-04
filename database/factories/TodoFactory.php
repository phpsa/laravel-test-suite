<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Todo;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {

    $totalUsers = User::count();

    return [
        'user_id'      => $faker->numberBetween(1, $totalUsers),
        'title'        => $faker->catchPhrase(),
        'completed_at' => $faker->randomElement([now(), null]),
        'deleted_at'   => $faker->randomElement([now(), null])
    ];
});
