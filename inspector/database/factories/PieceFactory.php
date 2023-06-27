<?php

namespace Database\Factories;

<<<<<<< HEAD
use App\Models\Model;
=======
use App\Models\Models;
>>>>>>> 98b5bb50d9dcd47153ab95610bea3466a7d60b1c
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
            'creation_year' => fake()->numberBetween(1980, 2023),
            'status' => fake()->boolean(),
            'material_id' => fake()->numberBetween(1, 100),
<<<<<<< HEAD
            'model_id' => collect(Model::all()->pluck('id'))->random(),
=======
            // 'model_id' => collect(Models::where('id')->pluck('id'))->random(),
            'model_id' => 28,
>>>>>>> 98b5bb50d9dcd47153ab95610bea3466a7d60b1c
        ];
    }
}
