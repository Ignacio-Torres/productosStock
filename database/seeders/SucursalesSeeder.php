<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SucursalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sucursales')->insert(array(
            'nombre' => 'Santiago'
        ));
        DB::table('sucursales')->insert(array(
            'nombre' => 'Molina'
        ));
        DB::table('sucursales')->insert(array(
            'nombre' => 'Curico'
        ));
    }
}
