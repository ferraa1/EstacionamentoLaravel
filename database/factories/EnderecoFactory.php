<?php

namespace Database\Factories;

use App\Models\Cidade;
use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Endereco>
 */
class EnderecoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cliente_id' => $this->faker->randomElement(Cliente::pluck('id')),
            'endereco' => $this->faker->words(2, true),
            'numero' => $this->faker->regexify('[0-9]{3}'),
            'cep' => $this->faker->regexify('[0-9]{8}'),
            'bairro' => $this->faker->words(2, true),
            'complemento' => $this->faker->words(1, true),
            'cidade_id' => $this->faker->randomElement(Cidade::pluck('id')),
        ];
    }
}
