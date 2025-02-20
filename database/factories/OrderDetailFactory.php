<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id"=> fake()->numberBetween(1,49),
            "product_id"=> fake()->numberBetween(1,10),
            "quantity"=> fake()->numberBetween(1,99),
            "unit_price"=>fake()->numberBetween(1,999),
            "subtotal"=> fake()->numberBetween(1,9999),
        ];
    }
}
