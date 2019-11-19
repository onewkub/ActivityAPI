<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\student;
use App\User;
use Faker\Generator as Faker;

$factory->define(student::class, function (Faker $faker) {
    $user = User::all()->pluck('uid')->toArray();
    return [
        'uid'=> $faker->randomElement(),
        'studnetID' => $faker->unique()->numberBetween(600510400,600510900)
    ];
});
