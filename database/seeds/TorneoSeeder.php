<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TorneoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('torneo')->truncate();   
        $torneos = factory(App\Torneo::class,1)->create();
    }
}
