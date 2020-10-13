<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'following_id' => function(){
            return factory(User::class)->create()->id;
        },
        'followed_id' => function(){
            return factory(User::class)->create()->id;
        },
    ];
});