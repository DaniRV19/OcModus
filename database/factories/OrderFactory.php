<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>fake()->numberBetween(1, 10),
            'status'=>fake()->randomElement(['pending', 'shipped', 'delivered']),
            'payment_method'=>fake()->randomElement([]),
            'payment_status'=>fake()->randomElement([]),
            'shipping_method'=>fake()->randomElement([]),
            'shipping_cost'=>fake()->numberBetween(3, 20)
        ];
    }
}
