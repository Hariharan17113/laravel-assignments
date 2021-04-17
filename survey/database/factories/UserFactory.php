<?php

namespace Database\Factories;
use App\Models\Member;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\User;
/** @var  Illuminate\Database\Eloquent\Factories\Factory $factory*/


$factory->define(Member::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
    ];
});

