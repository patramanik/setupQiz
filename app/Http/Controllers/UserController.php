<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['roles', 'permissions'])->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = \App\Models\Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|exists:roles,id'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Assign role and sync permissions from template
        $user->roles()->sync([$request->role]);
        $role = \App\Models\Role::find($request->role);
        if ($role) {
            $user->permissions()->sync($role->permissions->pluck('id'));
        }

        return redirect()->route('users.index')->with('success', 'User created and role permissions synced successfully.');
    }

    public function show(User $user)
    {
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        $roles = \App\Models\Role::all();
        $permissions = \App\Models\Permission::all();
        $userPermissions = $user->permissions->pluck('id')->toArray();
        $userRole = $user->roles->first();

        return view('admin.users.edit', compact('user', 'roles', 'permissions', 'userPermissions', 'userRole'));
    }

    public function update(Request $request, User $user)
    {
        if ($request->has('form_type') && $request->form_type === 'details') {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'role' => 'nullable|exists:roles,id',
            ]);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            if ($request->role) {
                $currentRole = $user->roles->first();
                if (!$currentRole || $currentRole->id != $request->role) {
                    $user->roles()->sync([$request->role]);
                    $newRole = \App\Models\Role::find($request->role);
                    $user->permissions()->sync($newRole->permissions->pluck('id'));
                }
            } else {
                $user->roles()->detach();
            }

            return redirect()->back()->with('success', 'User details and role template updated.');
        }

        if ($request->has('form_type') && $request->form_type === 'permissions') {
            $request->validate([
                'permissions' => 'array',
                'permissions.*' => 'exists:permissions,id',
            ]);

            $user->permissions()->sync($request->permissions ?? []);

            return redirect()->back()->with('success', 'Direct user permissions updated successfully.');
        }

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

}
