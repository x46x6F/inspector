<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ModelsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => 28,
            'name' => fake()->company(),
            'status' => fake()->name(),
            'constructor_id' => fake()->numberBetween(0, 100),
            'type_id' => fake()->numberBetween(0, 100)
        ];
    }
}
