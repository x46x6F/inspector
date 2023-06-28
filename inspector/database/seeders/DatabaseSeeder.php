<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Constructor;
use App\Models\Model;
use App\Models\Piece;
use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Constructor::factory(10)->create();
        Model::factory(10)->create();
        Piece::factory(50)->create();
        Site::factory(10)->create();
        User::factory(10)->create();
    }
}
