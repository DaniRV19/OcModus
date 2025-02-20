<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id"=>fake()->numberBetween(),
            "street"=>fake()->streetAddress(),
            "city"=>fake()->city(),
            "state"=>fake()->state(),
            "country"=>fake()->country(),
            "postal_code"=>fake()->postcode(),
            "type"=>fake()->randomElement(["home","work","vacation"])
        ];
    }
}
