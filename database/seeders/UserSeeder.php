<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Encargado;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
        
    }
}
