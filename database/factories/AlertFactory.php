<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
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
        'area' => '大阪府',
        'city' => $faker->randomElement(['池田市', '泉大津市', '泉佐野市', '和泉市','茨木市', '大阪狭山市','大阪市',
        '貝塚市', '柏原市','交野市','交野町','門真市','河南町','河内長野市', '岸和田市','熊取町','堺市', '狭山町', '四條畷市', 
        '四條畷町'=>'四條畷町', '島本町'=>'島本町', '吹田市'=>'吹田市','摂津市'=>'摂津市', '泉南市'=>'泉南市', '泉南町'=>'泉南町',
        '太子町', '高石市', '高槻市', '田尻町','忠岡町', '大東市','千早赤阪村', '豊中市', '豊能町', '富田林市', '南海町','寝屋川市', 
        '能勢町', '羽曳野市', '阪南市','阪南町', '東大阪市', '東鳥取町','東能瀬村','枚方市', '藤井寺市', '松原市', '岬町','箕面市',
        '美原町', '守口市', '八尾市']),
        'location' => $faker->text(15),
        'lat' => $faker->latitude(),
        'lng' => $faker->longitude(),
    ];
});