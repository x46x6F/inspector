<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Material>
 */
class MaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'has_electro' => fake()->boolean(),
            'creation_year' => fake()->numberBetween(1980, 2023),
            'status' => fake()->boolean(),
            'site_id' => fake()->numberBetween(1, 100),
        ];
    }
}
