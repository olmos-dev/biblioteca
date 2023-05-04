<?php

namespace Database\Factories;

use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stock>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'libro_id' => fake()->unique()->numberBetween(1,Libro::count()),
            'cantidad' => rand(10,20),
            'disponible' => rand(5,10),
            'prestado' => rand(1,3),
        ];
    }
}
