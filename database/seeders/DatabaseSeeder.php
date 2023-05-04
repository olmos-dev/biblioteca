<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Encargado;
use App\Models\Prestamo;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LibroSeeder::class,
            Stockseeder::class,
            EstudianteSeeder::class,
            EstadoSeeder::class,
            RolSeeder::class,
            UserSeeder::class,
            //EncargadoSeeder::class,
            PrestamoSeeder::class,
           
        ]);
    }
}
