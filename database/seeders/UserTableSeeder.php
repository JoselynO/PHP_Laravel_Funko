<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{

        DB::table('users')->insert([
            [
                'name' => 'joselyn',
                'email' => 'joselyn@hotmail.com',
                'password' => bcrypt('loshi123'),
                'role' => 'admin',
            ],
            [
                'name' => 'evelyn',
                'email' => 'evelyn@hotmail.com',
                'password' => bcrypt('loshi123'),
                'role' => 'user',
            ],
        ]);

    }
}
