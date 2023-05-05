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

        //se crea el usuario con rol de encargado
        $usuario3 = User::create([
            'name' => 'jose93',
            'email' => 'jose@mail.com',
            'password' => Hash::make('123'),
        ]);

        DB::insert('insert into rol_user (user_id,rol_id) values (?, ?)', [3,rand(1,2)]);
        
        Encargado::create([
            'user_id' => $usuario3->id,
            'nombre' => 'José',
            'apellido_materno' => 'Hernandez',
            'apellido_paterno' => 'Gomez'
        ]);

        //se crea el usuario con rol de encargado
        $usuario4 = User::create([
            'name' => 'isabel85',
            'email' => 'isabel@mail.com',
            'password' => Hash::make('123'),
        ]);

        DB::insert('insert into rol_user (user_id,rol_id) values (?, ?)', [4,rand(1,2)]);
        
        Encargado::create([
            'user_id' => $usuario4->id,
            'nombre' => 'Maria Isabel',
            'apellido_materno' => 'Sanchez',
            'apellido_paterno' => 'Lara'
        ]);

        //se crea el usuario con rol de encargado
        $usuario5 = User::create([
            'name' => 'Maria31',
            'email' => 'maria@mail.com',
            'password' => Hash::make('123'),
        ]);

        DB::insert('insert into rol_user (user_id,rol_id) values (?, ?)', [5,rand(1,2)]);
        
        Encargado::create([
            'user_id' => $usuario5->id,
            'nombre' => 'Mariana',
            'apellido_materno' => 'Montero',
            'apellido_paterno' => 'Guzman'
        ]);

        //se crea el usuario con rol de encargado
        $usuario6 = User::create([
            'name' => 'Daniel55',
            'email' => 'daniel@mail.com',
            'password' => Hash::make('123'),
        ]);

        DB::insert('insert into rol_user (user_id,rol_id) values (?, ?)', [6,rand(1,2)]);
        
        Encargado::create([
            'user_id' => $usuario6->id,
            'nombre' => 'Daniel',
            'apellido_materno' => 'Cruz',
            'apellido_paterno' => 'Zabaleta'
        ]);

        //se crea el usuario con rol de encargado
        $usuario7 = User::create([
            'name' => 'Carina31',
            'email' => 'carina@mail.com',
            'password' => Hash::make('123'),
        ]);

        DB::insert('insert into rol_user (user_id,rol_id) values (?, ?)', [7,rand(1,2)]);
        
        Encargado::create([
            'user_id' => $usuario7->id,
            'nombre' => 'Carina',
            'apellido_materno' => 'Lopez',
            'apellido_paterno' => 'Olivos'
        ]);

         //se crea el usuario con rol de encargado
         $usuario8 = User::create([
            'name' => 'Enrique934',
            'email' => 'kike@mail.com',
            'password' => Hash::make('123'),
        ]);

        DB::insert('insert into rol_user (user_id,rol_id) values (?, ?)', [8,rand(1,2)]);
        
        Encargado::create([
            'user_id' => $usuario8->id,
            'nombre' => 'Luis Enrique',
            'apellido_materno' => 'Castillo',
            'apellido_paterno' => 'Sanchez'
        ]);

         //se crea el usuario con rol de encargado
        $usuario9 = User::create([
            'name' => 'Joel84',
            'email' => 'joel@mail.com',
            'password' => Hash::make('123'),
        ]);

        DB::insert('insert into rol_user (user_id,rol_id) values (?, ?)', [9,rand(1,2)]);
        
        Encargado::create([
            'user_id' => $usuario9->id,
            'nombre' => 'Joel',
            'apellido_materno' => 'Cerdan',
            'apellido_paterno' => 'Cao'
        ]);

        //se crea el usuario con rol de encargado
        $usuario10 = User::create([
            'name' => 'ines20',
            'email' => 'ines@mail.com',
            'password' => Hash::make('123'),
        ]);

        DB::insert('insert into rol_user (user_id,rol_id) values (?, ?)', [10,rand(1,2)]);
        
        Encargado::create([
            'user_id' => $usuario10->id,
            'nombre' => 'Ines',
            'apellido_materno' => 'Perez',
            'apellido_paterno' => 'Salas'
        ]);

        //User::factory()->times(10)->create();
       
        
    }
}
