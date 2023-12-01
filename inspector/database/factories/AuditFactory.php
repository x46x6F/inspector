<?php

namespace Database\Factories;

use App\Models\Campaign;
use App\Models\Piece;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Audit>
 */
class AuditFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'campaign_id' => collect(Campaign::all()->pluck('id'))->random(),
            'piece_id' => collect(Piece::all()->pluck('id'))->random(),
            'audit' => fake()->boolean(),
            'presence' => fake()->boolean(),
            'functional' => fake()->boolean(),
            'month' => fake()->month(),
            'usury' => fake()->boolean(),
            'change' => fake()->boolean(),
            'complement' => fake()->boolean(),
            'recommended' => fake()->boolean()
        ];
    }
}
