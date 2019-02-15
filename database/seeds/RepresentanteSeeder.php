<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RepresentanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('representante')->truncate();
        $representantes = factory(App\Representante::class,30)->create();
    }
}
