<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaTableSeeder extends Seeder{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        DB::table('categorias')->insert([
            ['nombre' => 'DISNEY'],
            ['nombre' => 'MARVEL'],
            ['nombre' => 'SERIES'],
            ['nombre' => 'PELICULAS'],
        ]);
    }
}
