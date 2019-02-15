<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //dd(CriaderoSeeder::class);
        //Sin relación
            //$this->call(TorneoSeeder::class);
            //$this->call(CriaderoSeeder::class);
        //Con relación
            //$this->call(RepresentanteSeeder::class);
            //$this->call(GalloSeeder::class);
        $this->call(InscripcionTorneoSeeder::class);
        
        
    }
}
