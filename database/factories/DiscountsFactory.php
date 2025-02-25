<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discount>
 */
class DiscountsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => fake()->word,
            'amount' => fake()->numberBetween(1, 100),
            'type' => fake()->randomElement(['fixed', 'percent']),
            'start_date' => fake()->dateTimeBetween('-1 month', 'now'),
            'end_date' => fake()->dateTimeBetween('now', '+1 month'),
            'is_active' => fake()->boolean(80),
            'min_purchase_amount' => fake()->numberBetween(1, 100),
        ];
    }
}
