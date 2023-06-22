<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
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
            ['role' => 'Super admin'],
            ['role' => 'Chef de projet'],
            ['role' => 'Chargé de référentiel'],
            ['role' => 'Responsable sécurité'],
            ['role' => 'Auditeur'],
        ];

        foreach ($roles as $role) {
            $r = new Role($role);
            $r->save();
        }

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.fr',
            'password' => '$2y$10$MF.cxfoQt0aNdtHdlHXt.OaMCwUCMSF2/76BOsnvu14dClcAQTPKW',
            'role_id' => 1
        ]);
    }
}
