<?php

namespace Database\Seeders;

use App\Models\Operacao;
use Illuminate\Database\Seeder;

class OperacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Operacao::factory(10)->create();
    }
}
