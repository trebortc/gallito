<?php

use Faker\Generator as Faker;

$factory->define(App\Torneo::class, function (Faker $faker) {
    return [
        'NOMBRE' => $faker->name,
        'DESCRIPCION' => $faker->text,
        'FECHA' => $faker->date($format = 'Y-m-d', $max = '2019-12-31'),
        'ESTADO' => $faker->randomElement($array = array('A','E','S'))          
    ];
});
