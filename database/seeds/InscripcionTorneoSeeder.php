<?php

use Illuminate\Database\Seeder;

class InscripcionTorneoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inscripcionesTorneo = factory(App\InscripcionTorneo::class,100)->create();
    }
}
