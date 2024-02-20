<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Funko;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            $this->call(CategoriaTableSeeder::class);
            $this->call(FunkoTableSeeder::class);
            $this->call(UserTableSeeder::class);
    }
}
