<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert(array(
            'nombre' => 'Verduras'
        ));
        DB::table('categorias')->insert(array(
            'nombre' => 'Frutas'
        ));
        DB::table('categorias')->insert(array(
            'nombre' => 'Dulces'
        ));
    }
}
