<?php

use Faker\Generator as Faker;

$factory->define(App\Gallo::class, function (Faker $faker) {
    return [
        'ID_REPRESENTANTE' => function(){
            return App\Representante::inRandomOrder()->first()->ID_REPRESENTANTE;
        }, 
        'PLACA' => $faker->name, 
        'PESO' => $faker->randomElement($array = array (3.3,3.4,3.5,3.6,3.7,3.8,3.9,4,4.1,4.2,4.3,4.4,4.5,4.6)),
        'EDAD' => $faker->numberBetween($min = 1, $max = 4), 
        'TALLA' => $faker->randomElement($array = array(1,2,3,4)), 
        'ESTADO' => $faker->randomElement($array = array('A','E','S'))        
    ];
});
