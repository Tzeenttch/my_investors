<?php

namespace Database\Factories;

use App\Models\Income;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OutcomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'date' => fake()->date(),
            'bank'=> fake()->randomElement(['Santander', 'BBVA', 'CaixaBank', 'CajaRural', 'Unicaja']),
            'category' => fake()->randomElement(['Transferencia', 'Bizum', 'Efectivo', 'Tarjeta de credito']),
            'amount' =>fake()->randomFloat(2, 1, 10000),
        ];
    }
}
