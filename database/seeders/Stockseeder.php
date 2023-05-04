<?php

namespace Database\Seeders;

use App\Models\{Stock,Libro};
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Stockseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stock::factory()->times(Libro::count())->create();
    }
}
