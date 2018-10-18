<?php

use Faker\Generator as Faker;

$factory->define(App\Employer::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName(),
        'company_id' => rand(0,50),
        'email' => $faker->email(),
        'phone' => $faker->phoneNumber(),
    ];
});
