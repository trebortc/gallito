<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GalloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('gallo')->truncate();
        $gallos = factory(App\Gallo::class,100)->create();
    }
}
