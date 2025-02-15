<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Income>
 */
class IncomeFactory extends Factory
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
            'category' => fake()->randomElement(['Transferencia', 'Bizum', 'Efectivo', 'Tarjeta de credito']),
            'amount' =>fake()->randomFloat(2, 1, 10000),
            'user_id' => User::factory(),
        ];
    }
}
