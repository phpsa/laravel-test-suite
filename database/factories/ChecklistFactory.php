<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Checklist;
use App\Models\Todo;
use Faker\Generator as Faker;

$factory->define(Checklist::class, function (Faker $faker) {

    $totalTodos = Todo::count();

    return [
        'todo_id'      => $faker->numberBetween(1, $totalTodos),
        'title'        => $faker->catchPhrase(),
        'completed_at' => $faker->randomElement([now(), null]),
    ];
});
