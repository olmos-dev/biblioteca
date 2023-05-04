<?php

namespace Database\Seeders;

use App\Models\Encargado;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EncargadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Encargado::factory()->times(10)->create();

        for ($i=3; $i <=12 ; $i++) { 
            DB::insert('insert into rol_user (user_id,rol_id) values (?, ?)', [$i, rand(1,2)]);
        }
    }
}
