<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Funcionario;
use App\Models\Vaga;
use App\Models\Preco_hora;
use App\Models\Veiculo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Operacao>
 */
class OperacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "data_entrada" => $this->faker->dateTime(),
            "data_saida" => $this->faker->dateTime(),
            "funcionario_id" => $this->faker->randomElement(Funcionario::pluck('id')),
            "vaga_id" => $this->faker->randomElement(Vaga::pluck('id')),
            "preco_hora_id" => $this->faker->randomElement(Preco_hora::pluck('id')),
            "veiculo_id" => $this->faker->randomElement(Veiculo::pluck('id')),
        ];
    }
}
