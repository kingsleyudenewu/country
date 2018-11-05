<?php

use Faker\Generator as Faker;

$factory->define(App\State::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'country_id' => factory(\App\Country::class)->create()->id,
    ];
});
