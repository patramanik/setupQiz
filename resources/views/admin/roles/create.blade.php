@extends('layouts.admin')

@section('title', 'Create Role')

@section('content')
<div class="mb-6">
    <a href="{{ route('roles.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200 flex items-center gap-2 mb-2 transition-colors">
        <i class="fas fa-arrow-left"></i> Back to Roles
    </a>
    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Create New Role</h2>
</div>

<div class="bg-white dark:bg-slate-800/80 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700/50 overflow-hidden">
    <form action="{{ route('roles.store') }}" method="POST" class="p-6 md:p-8">
        @csrf

        <div class="mb-8">
            <label for="name" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Role Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="e.g. editor"
                class="w-full sm:w-1/2 px-4 py-2.5 rounded-xl border border-gray-200 dark:border-slate-700 bg-gray-50 dark:bg-slate-900/50 text-gray-800 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-colors placeholder:text-gray-400 @error('name') border-rose-300 focus:border-rose-500 focus:ring-rose-500/20 @enderror">
            @error('name')
                <p class="mt-1.5 text-sm text-rose-500 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-8">
            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-4 border-b border-gray-100 dark:border-slate-700 pb-2">Assign Permissions</label>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                @foreach($permissions as $permission)
                    <label class="flex items-start gap-3 p-3 rounded-xl border border-gray-100 dark:border-slate-700/50 hover:bg-gray-50 dark:hover:bg-slate-700/30 cursor-pointer transition-colors">
                        <div class="flex items-center h-5 mt-0.5">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" @checked(is_array(old('permissions')) && in_array($permission->id, old('permissions')))
                                class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-slate-700 dark:border-slate-600">
                        </div>
                        <div class="flex flex-col">
                            <span class="text-sm font-semibold text-gray-800 dark:text-gray-200 capitalize">{{ $permission->name }}</span>
                        </div>
                    </label>
                @endforeach
            </div>
            @error('permissions')
                <p class="mt-2 text-sm text-rose-500 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-gray-100 dark:border-slate-700/50">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-xl text-sm font-medium transition-colors shadow-sm shadow-indigo-500/20">
                Create Role
            </button>
            <a href="{{ route('roles.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200 transition-colors">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
