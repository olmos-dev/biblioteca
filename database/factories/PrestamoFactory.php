<?php

namespace Database\Factories;

use App\Models\{Estudiante,Libro,Encargado};
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prestamo>
 */
class PrestamoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'libro_id' => Libro::all()->random()->id,
            'estudiante_id' => Estudiante::all()->random()->id,
            'encargado_id' => Encargado::all()->random()->id,
            'estado' => rand(0,1),
            'created_at' => fake()->dateTimeBetween('-1 week',Carbon::now())
        ];
    }
}
