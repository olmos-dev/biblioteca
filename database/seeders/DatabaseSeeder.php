<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Encargado;
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
        $usuario1 = User::create([
            'name' => 'alberto94',
            'email' => 'alberto@mail.com',
            'password' => Hash::make('123'),
        ]);
        
        Encargado::create([
            'user_id' => $usuario1->id,
            'nombre' => 'Alberto',
            'apellido_materno' => 'Gomez',
            'apellido_paterno' => 'Perez'
        ]);
        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
