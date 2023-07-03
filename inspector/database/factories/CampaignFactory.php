<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campaign>
 */
class CampaignFactory extends Factory
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
            'status' => fake()->word(),
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
            'creator_id' => collect(User::where('role_id', Role::where('name', '=', 'Chef de projet')->pluck('id'))->pluck('id'))->random(),
            'auditor_id' => collect(User::where('role_id', Role::where('name', '=', 'Auditeur')->pluck('id'))->pluck('id'))->random(),
            'site_id' => collect(Site::all()->pluck('id'))->random()
        ];
    }
}
