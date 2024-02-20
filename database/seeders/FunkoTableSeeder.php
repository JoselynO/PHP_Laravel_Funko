<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class FunkoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{

        DB::table('funkos')->insert([
            [
                'nombre' => 'Rapunzel',
                'precio' => 21.99,
                'cantidad' => 60,
                'imagen' => 'https://cdn.grupoelcorteingles.es/SGFM/dctm/MEDIA03/202203/04/00183180135382____2__1200x1200.jpg',
                'categoria_id' => 1,
            ],
            [
                'nombre' => 'Thor',
                'precio' => 11.99,
                'cantidad' => 19,
                'imagen' => 'https://cdn.grupoelcorteingles.es/SGFM/dctm/MEDIA03/202203/04/00183180135382____2__1200x1200.jpg',
                'categoria_id' => 2,
            ],
            [
                'nombre' => 'One Piece',
                'precio' => 16.99,
                'cantidad' => 41,
                'imagen' => 'https://cdn.grupoelcorteingles.es/SGFM/dctm/MEDIA03/202203/04/00183180135382____2__1200x1200.jpg',
                'categoria_id' => 3,
            ],
            [
                'nombre' => 'Dragon Ball Z',
                'precio' => 13.99,
                'cantidad' =>  26,
                'imagen' => 'https://cdn.grupoelcorteingles.es/SGFM/dctm/MEDIA03/202203/04/00183180135382____2__1200x1200.jpg',
                'categoria_id' => 4,
            ],
            [
                'nombre' => 'Cenicienta',
                'precio' =>  18.99,
                'cantidad' =>  14,
                'imagen' => 'https://cdn.grupoelcorteingles.es/SGFM/dctm/MEDIA03/202203/04/00183180135382____2__1200x1200.jpg',
                'categoria_id' => 1,
            ],
        ]);
    }
}
