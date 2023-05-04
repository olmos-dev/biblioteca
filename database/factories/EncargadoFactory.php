<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Encargado;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Encargado>
 */
class EncargadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->unique()->numberBetween(3, User::count()),
            'nombre' => fake()->name(),
            'apellido_materno' =>  fake()->firstName(),
            'apellido_paterno' => fake()->lastName()
        ];
    }
}
