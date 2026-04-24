@extends('layouts.admin')

@section('title', 'Manage Roles')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Roles Management</h2>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Create and assign permissions to roles.</p>
    </div>
    <a href="{{ route('roles.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-xl text-sm font-medium transition-colors cursor-pointer inline-flex items-center gap-2">
        <i class="fas fa-plus"></i> New Role
    </a>
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
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Role Name</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Permissions Included</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-slate-700/50">
                @forelse($roles as $role)
                <tr class="hover:bg-gray-50/50 dark:hover:bg-slate-800/40 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $role->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-800 dark:text-gray-100 capitalize">{{ $role->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                        <div class="flex flex-wrap gap-1">
                            @foreach($role->permissions->take(3) as $perm)
                                <span class="bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 text-xs px-2 py-0.5 rounded-full border border-indigo-100 dark:border-indigo-500/20">
                                    {{ $perm->name }}
                                </span>
                            @endforeach
                            @if($role->permissions->count() > 3)
                                <span class="bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 text-xs px-2 py-0.5 rounded-full">
                                    +{{ $role->permissions->count() - 3 }} more
                                </span>
                            @endif
                            @if($role->permissions->isEmpty())
                                <span class="text-xs text-gray-400 italic">No permissions</span>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('roles.edit', $role) }}" class="p-2 text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors bg-gray-50 hover:bg-indigo-50 dark:bg-slate-800 dark:hover:bg-indigo-500/10 rounded-lg">
                                <i class="fas fa-edit"></i>
                            </a>
                            @if(!in_array(strtolower($role->name), ['superadmin', 'admin']))
                                <form action="{{ route('roles.destroy', $role) }}" method="POST" class="inline-block delete-role-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" data-has-permissions="{{ $role->permissions->count() > 0 ? 'true' : 'false' }}" class="delete-role-btn p-2 text-gray-400 hover:text-rose-600 dark:hover:text-rose-400 transition-colors bg-gray-50 hover:bg-rose-50 dark:bg-slate-800 dark:hover:bg-rose-500/10 rounded-lg">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            @else
                                <button type="button" disabled class="p-2 text-gray-200 dark:text-slate-600 cursor-not-allowed bg-gray-50 dark:bg-slate-800 rounded-lg" title="Core role cannot be deleted">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center text-sm font-medium text-gray-500 dark:text-gray-400">
                        No roles found. <a href="{{ route('roles.create') }}" class="text-indigo-600 dark:text-indigo-400 hover:underline">Create one</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-role-btn');
        
        deleteButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const form = this.closest('form');
                const hasPermissions = this.dataset.hasPermissions === 'true';

                if (hasPermissions) {
                    Swal.fire({
                        title: 'Action Blocked',
                        text: 'Cannot delete! First remove all permissions attached to this role.',
                        icon: 'error',
                        confirmButtonColor: '#4f46e5',
                        confirmButtonText: 'Got it'
                    });
                    return;
                }
                
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Deleting this role will remove it from all users currently holding it. This cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endpush
