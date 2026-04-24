<?php
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

$perms = ['create user', 'edit user', 'delete user', 'suspend user'];
foreach ($perms as $p) {
    Permission::firstOrCreate(['name' => $p]);
}

$superadmin = Role::where('name', 'superadmin')->first();
if ($superadmin) {
    $superadmin->permissions()->syncWithoutDetaching(Permission::whereIn('name', $perms)->pluck('id'));
}

$user = User::where('email', 'superadmin@example.com')->first();
if ($user) {
    $user->permissions()->syncWithoutDetaching(Permission::whereIn('name', $perms)->pluck('id'));
}

echo "Permissions added successfully.\n";
