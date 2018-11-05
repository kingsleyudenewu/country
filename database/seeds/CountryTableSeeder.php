<?php

use Illuminate\Database\Seeder;
use App\Country;
use App\State;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Country::class, 10)->create()->each(function ($state){
            $state->states()->save(factory(State::class)->make());
        });
    }
}
