<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Alert;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Alert::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return factory(User::class)->create()->id;
        },
        'content' => $faker->text(140),
        'title' => $faker->text(15),
        'area' => 'わからない',
        'location' => $faker->text(15),
        'lat' => $faker->latitude(),
        'lng' => $faker->longitude(),
    ];
});