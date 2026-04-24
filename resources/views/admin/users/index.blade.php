@extends('layouts.admin')

@section('title', 'Manage Users')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Users Management</h2>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Manage user roles and their specific permissions.</p>
    </div>
</div>

@if(session('success'))
    <div class="bg-emerald-50 text-emerald-600 border border-emerald-200 px-4 py-3 rounded-xl mb-6 flex items-center justify-between dark:bg-emerald-900/20 dark:border-emerald-800 dark:text-emerald-400">
        <div class="flex items-center gap-3">
            <i class="fas fa-check-circle text-lg"></i>
            <span class="text-sm font-medium">{{ session('success') }}</span>
        </div>
    </div>
@endif

<div class="bg-white dark:bg-slate-800/80 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700/50 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50/50 dark:bg-slate-800/50 border-b border-gray-100 dark:border-slate-700/50">
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">User</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Role</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Direct Permissions</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-slate-700/50">
                @forelse($users as $user)
                <tr class="hover:bg-gray-50/50 dark:hover:bg-slate-800/40 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex flex-col">
                            <span class="text-sm font-bold text-gray-800 dark:text-gray-100">{{ $user->name }}</span>
                            <span class="text-xs text-gray-500 dark:text-gray-400">{{ $user->email }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        @if($user->roles->first())
                            <span class="bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 px-2 py-1 rounded border border-indigo-100 dark:border-indigo-500/20 capitalize">
                                {{ $user->roles->first()->name }}
                            </span>
                        @else
                            <span class="text-gray-400 italic">No Role</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                        <div class="flex flex-wrap gap-1">
                            @foreach($user->permissions->take(3) as $perm)
                                <span class="bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 text-xs px-2 py-0.5 rounded-full border border-emerald-100 dark:border-emerald-500/20">
                                    {{ $perm->name }}
                                </span>
                            @endforeach
                            @if($user->permissions->count() > 3)
                                <span class="bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 text-xs px-2 py-0.5 rounded-full">
                                    +{{ $user->permissions->count() - 3 }} more
                                </span>
                            @endif
                            @if($user->permissions->isEmpty())
                                <span class="text-xs text-gray-400 italic">None</span>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex items-center justify-end gap-2">
                            @if(auth()->check() && auth()->user()->hasPermission('edit user'))
                            <a href="{{ route('users.edit', $user) }}" class="p-2 text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors bg-gray-50 hover:bg-indigo-50 dark:bg-slate-800 dark:hover:bg-indigo-500/10 rounded-lg">
                                <i class="fas fa-edit"></i> Edit User
                            </a>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center text-sm font-medium text-gray-500 dark:text-gray-400">
                        No users found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
