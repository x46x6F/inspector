<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Piece>
 */
class PieceFactory extends Factory
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
            'creation_year' => fake()->numberBetween(1980, 2023),
            'has_electro' => fake()->boolean(),
            'status' => fake()->boolean(),
            'material_id' => fake()->numberBetween(1, 100),
            'model_id' => fake()->numberBetween(1, 100),
        ];
    }
}