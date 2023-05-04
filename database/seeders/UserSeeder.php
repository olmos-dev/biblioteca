<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Encargado;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //se crea el usuario con rol de admninistrador
        $usuario1 = User::create([
            'name' => 'alberto94',
            'email' => 'alberto@mail.com',
            'password' => Hash::make('123'),
        ]);

        DB::insert('insert into rol_user (user_id,rol_id) values (?, ?)', [1,1]);

        Encargado::create([
            'user_id' => $usuario1->id,
            'nombre' => 'Alberto',
            'apellido_materno' => 'Gomez',
            'apellido_paterno' => 'Perez'
        ]);
        
        //se crea el usuario con rol de encargado
        $usuario2 = User::create([
            'name' => 'ana85',
            'email' => 'ana@mail.com',
            'password' => Hash::make('123'),
        ]);

        DB::insert('insert into rol_user (user_id,rol_id) values (?, ?)', [2,2]);
        
        Encargado::create([
            'user_id' => $usuario2->id,
            'nombre' => 'Ana',
            'apellido_materno' => 'Pereda',
            'apellido_paterno' => 'Baez'
        ]);

        //User::factory()->times(10)->create();
       
        
    }
}
