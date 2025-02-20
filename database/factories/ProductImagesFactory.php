<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImages>
 */
class ProductImagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => fake()->numberBetween(1, 10),
            'url' => fake()->imageUrl(640, 480),
            'alt_text' => fake()->sentence,
            'is_primary' => fake()->boolean(80),
            'display_order' => fake()->numberBetween(1, 10),
        ];
    }
}
