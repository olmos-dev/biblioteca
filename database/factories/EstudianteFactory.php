<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estudiante>
 */
class EstudianteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'matricula' => fake()->numberBetween($min = 10000000, $max = 99999999),
            'nombre' => fake()->firstName(),
            'a_paterno' => fake()->lastName(),
            'a_materno' => fake()->lastName(),
        ];
    }
}
