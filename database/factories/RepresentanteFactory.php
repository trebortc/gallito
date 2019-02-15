<?php

use Faker\Generator as Faker;

$factory->define(App\Representante::class, function (Faker $faker) {
    return [
        'ID_CRIADEROS' => function(){
            return App\Criadero::inRandomOrder()->first()->ID_CRIADEROS;
        }, 
        'IDENTIFICACION' => $faker -> unique() -> numerify('##########'), 
        'NOMBRES' => $faker -> unique() ->name, 
        'TELEFONOS' => $faker -> numerify('######'),
        'CORREO' => $faker -> email,
        'DESCRIPCION' => $faker -> sentence($nbWords = 6, $variableNbWords = true), 
        'ETADO' => $faker -> randomElement($array = array('A','B','C'))
    ];
});
