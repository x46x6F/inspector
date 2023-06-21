<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseRealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['role' => 'Auditeur'],
            ['role' => 'Chef de projet'],
            ['role' => 'Chargé de référentiel'],
            ['role' => 'Responsable sécurité']
        ];

        foreach ($roles as $role) {
            $r = new Role($role);
            $r->save();
        }
    }
}
