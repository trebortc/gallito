<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CriaderoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permite limpiar la tabla y cargar nuevamente los datos
        /*DB::table('criadero')->truncate();

        DB::table('criadero')->insert([
            'NOMBRE' => "Criadero 1", 
            'DESCRIPCION' => "Criadero peleas", 
            'ESTADO' => "A",
            'updated_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s")
        ]);*/
        //DB::table('criadero')->truncate();
        $criaderos = factory(App\Criadero::class,10)->create();
    }
}
