<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cliente;
use App\Models\Veiculo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Clientes_veiculosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "cliente_id" => $this->faker->randomElement(Cliente::pluck('id')),
            "veiculo_id" => $this->faker->randomElement(Veiculo::pluck('id'))
        ];
    }
}
