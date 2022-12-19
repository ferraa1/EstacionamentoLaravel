<?php

namespace Database\Seeders;

use App\Models\Clientes_veiculos;
use Illuminate\Database\Seeder;

class Clientes_veiculosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Clientes_veiculos::factory(1)->create();
    }
}
