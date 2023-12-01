<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Site>
 */
class SiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'number' => fake()->numberBetween(0,100),
            'address' => fake()->address(),
            'address_comp' => fake()->address(),
            'zip_code' => fake()->numberBetween(10000, 99999),
            'city' => fake()->city(),
        ];
    }
}
