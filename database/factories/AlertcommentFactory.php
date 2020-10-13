<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\User;
use App\Alertcomment;
use Faker\Generator as Faker;

$factory->define(Alertcomment::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return factory(User::class)->create()->id;
        },
        'comment' => $faker->text(140),
    ];
});
