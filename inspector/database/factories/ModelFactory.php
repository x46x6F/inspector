<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'name' => fake()->company(),
            'status' => fake()->name(),
            'has_electro' => fake()->boolean(),
            'creation_year' => fake()->numberBetween(1980, 2023),
            'constructor_id' => fake()->numberBetween(0, 100),
            'type_id' => fake()->numberBetween(0, 100),
            'compose_id' => fake()->optional()
        ];
    }
}
