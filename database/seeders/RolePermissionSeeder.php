<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create([
            'name' => 'admin',
        ]);

        $userRole = Role::create([
            'name' => 'user',
        ]);

        $user = User::create([
            'name' => 'Admin Naraicoder',
            'email' => 'admin@naraicoder.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole($adminRole);
    }
}
