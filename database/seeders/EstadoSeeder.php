<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //se asignan los valores del estado en la base de datos para posteriormente realizar la validacion y exista congruencia con la BD y la aplicacion web
        DB::insert('insert into estado (valor, nombre) values (?, ?)', [0, 'Entregado']);
        DB::insert('insert into estado (valor, nombre) values (?, ?)', [1, 'Prestado']);
    }
}
