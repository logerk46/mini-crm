<?php

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company(),
        'email' => $faker->email(),
        'logo' => "no_image.jpg",
        'website' => $faker->url(),
    ];
});
