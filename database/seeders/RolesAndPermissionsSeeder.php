<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        $permissions = [
            'edit quiz',
            'delete quiz',
            'student entry',
            'view reports',
            'manage roles',
            'manage users',
            'create user',
            'edit user',
            'delete user',
            'suspend user'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles
        $superadmin = Role::firstOrCreate(['name' => 'superadmin']);
        $admin = Role::firstOrCreate(['name' => 'admin']);

        // Assign permissions to roles (templates)
        // superadmin gets all permissions
        $superadmin->permissions()->sync(Permission::all());

        // admin gets some permissions (example: edit quiz, student entry, manage users)
        $adminPermissions = Permission::whereIn('name', ['edit quiz', 'student entry', 'manage users'])->get();
        $admin->permissions()->sync($adminPermissions);

        // --- CREATE TEST USERS AND ASSIGN DIRECT PERMISSIONS ---
        // Superadmin User
        $superadminUser = \App\Models\User::firstOrCreate(
            ['email' => 'superadmin@example.com'],
            ['name' => 'Super Administrator', 'password' => bcrypt('password')]
        );
        // Sync role
        $superadminUser->roles()->sync([$superadmin->id]);
        // Sync direct permissions from role template
        $superadminUser->permissions()->sync($superadmin->permissions->pluck('id'));

        // Admin User
        $adminUser = \App\Models\User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Local Administrator', 'password' => bcrypt('password')]
        );
        // Sync role
        $adminUser->roles()->sync([$admin->id]);
        // Sync direct permissions from role template
        $adminUser->permissions()->sync($admin->permissions->pluck('id'));
    }
}
