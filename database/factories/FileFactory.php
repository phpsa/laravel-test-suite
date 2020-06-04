<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\File;
use App\Models\Profile;
use Faker\Generator as Faker;

$factory->define(File::class, function (Faker $faker) {

    $totalProfiles = Profile::count();

    return [
        'profile_id' => $faker->numberBetween(1, $totalProfiles),
        'url'        => $faker->imageUrl(640, 480, 'cats')
    ];
});
