<?php

namespace Database\Factories;

use App\Models\Funko;
use Illuminate\Database\Eloquent\Factories\Factory;


class FunkoFactory extends Factory
{
    protected $model = Funko::class;
    public function definition(): array
    {
        return [
            'nombre' => fake()->name,
            'precio' => fake()->randomFloat(2, 1, 100),
            'cantidad' => fake()->numberBetween(0, 100),
            'imagen' => 'https://m.media-amazon.com/images/I/917Mf8yTjEL._AC_UF894,1000_QL80_.jpg',
            'categoria_id' => 1,
        ];
    }
}
