<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vouchers>
 */
class VouchersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => fake()->unique()->word,
            'amount' => fake()->numberBetween(1, 100),
            'expiry_date' => fake()->dateTimeBetween('now', '+1 year'),
            'is_used' => fake()->boolean(80),
            'user_id' => fake()->numberBetween(1, 10),
            
        ];
    }
}
