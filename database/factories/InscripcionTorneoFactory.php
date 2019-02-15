<?php

use Faker\Generator as Faker;
use App\Gallo;


$factory->define(App\InscripcionTorneo::class, function (Faker $faker) {
    //$gallo = Gallo::all()->random();
    $gallo = Gallo::inRandomOrder()->first();
    $representante = $gallo->representante;
    $criadero = $representante->criadero;

    return [
        'ID_TORNEO'=> function(){
            return App\Torneo::inRandomOrder()->first()->ID_TORNEO;
        },
        'ID_CRIADEROS' => $criadero->ID_CRIADEROS,
        'ID_REPRESENTANTE' => $representante->ID_REPRESENTANTE,
        'ID_GALLO' => $gallo->ID_GALLO,
        'NOMBRE_CRIADERO' => $criadero->NOMBRE,
        'NOMBRE_REPRESENTANTE' => $representante->NOMBRES,
        'PLACA_GALLO' => $gallo->PLACA,
        'PESO_GALLO' => $gallo->PESO,
        'EDAD_GALLO' => $gallo->EDAD,
        'TALLA_GALLO' => $gallo->TALLA,
        'ESTADO' => $faker -> randomElement($array = array('A','A'))
    ];
});
