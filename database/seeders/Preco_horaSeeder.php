<?php

namespace Database\Seeders;

use App\Models\Preco_hora;
use Illuminate\Database\Seeder;

class Preco_horaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Preco_hora::factory(20)->create();
    }
}
