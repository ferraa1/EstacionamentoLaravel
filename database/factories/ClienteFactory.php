<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->words(2, true),
            'usuario' => $this->faker->words(1, true),
            'senha' => '40bd001563085fc35165329ea1ff5c5ecbdbbeef',
            'email' => $this->faker->email(),
            'telefone' => $this->faker->regexify('[0-9]{9}'),
            'ativado' => 1,
        ];
    }
}
