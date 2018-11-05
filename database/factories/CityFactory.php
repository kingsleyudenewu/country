<?php

use Faker\Generator as Faker;

$factory->define(App\City::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'state_id' => factory(\App\State::class)->create()->id,
    ];
});
