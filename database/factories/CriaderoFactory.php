<?php

use Faker\Generator as Faker;

$factory->define(App\Criadero::class, function (Faker $faker) {
    return [
        'NOMBRE' => $faker->name,
        'DESCRIPCION' => $faker->name,
        'ESTADO' => $faker->randomElement($array = array ('A','B','C')),
        'updated_at' => date("Y-m-d H:i:s"),
        'created_at' => date("Y-m-d H:i:s")
    ];
});
