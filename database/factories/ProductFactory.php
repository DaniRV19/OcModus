<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'=>fake()->word(),
            'slug'=>fake()->slug(),
            'description'=>fake()->text(5),
            'price'=>fake()->numberBetween(5, 999),
            'stock'=>fake()->numberBetween(1, 49),
            'sku'=>fake()->unique()->ean8(),
            'is_active'=>fake()->boolean(90),
            'category_id'=>fake()->numberBetween(1, 5)
        ];
    }
}
