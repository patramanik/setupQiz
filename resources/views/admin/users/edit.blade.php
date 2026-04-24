@extends('layouts.admin')

@section('title', 'Manage User Permissions')

@section('content')
<div class="mb-6">
    <a href="{{ route('users.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200 flex items-center gap-2 mb-2 transition-colors">
        <i class="fas fa-arrow-left"></i> Back to Users
    </a>
    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Edit User: <span class="text-indigo-600 dark:text-indigo-400">{{ $user->name }}</span></h2>
</div>

<div class="bg-white dark:bg-slate-800/80 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700/50 overflow-hidden mb-6">
    <form action="{{ route('users.update', $user) }}" method="POST" class="p-6 md:p-8">
        @csrf
        @method('PUT')
        <input type="hidden" name="form_type" value="details">

        <div class="mb-8 p-4 bg-yellow-50 dark:bg-yellow-900/10 border border-yellow-200 dark:border-yellow-800 rounded-xl">
            <h3 class="text-sm font-bold text-yellow-800 dark:text-yellow-400"><i class="fas fa-info-circle mr-1"></i> How this works</h3>
            <p class="text-sm text-yellow-700 dark:text-yellow-500 mt-1">
                Roles act as templates. Changing a user's role will automatically check all the default permissions for that role. 
                You can then manually check or uncheck individual permissions below.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- Full Name -->
            <div>
                <label for="name" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Full Name</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 dark:border-slate-700 bg-gray-50 dark:bg-slate-900/50 text-gray-800 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-colors" value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <p class="mt-2 text-sm text-rose-500 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Email Address</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 dark:border-slate-700 bg-gray-50 dark:bg-slate-900/50 text-gray-800 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-colors" value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <p class="mt-2 text-sm text-rose-500 font-medium">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mb-4 w-full sm:w-1/2">
            <label for="role" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Assign Role (Template)</label>
            <select name="role" id="role" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 dark:border-slate-700 bg-gray-50 dark:bg-slate-900/50 text-gray-800 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-colors capitalize">
                <option value="">-- No Role --</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" @selected($userRole && $userRole->id == $role->id)>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center gap-4 pt-6 mt-6 border-t border-gray-100 dark:border-slate-700/50">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-xl text-sm font-medium transition-colors shadow-sm shadow-indigo-500/20">
                Save User Details
            </button>
            <a href="{{ route('users.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200 transition-colors">
                Cancel
            </a>
        </div>
    </form>
</div>

<div class="bg-white dark:bg-slate-800/80 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700/50 overflow-hidden">
    <form action="{{ route('users.update', $user) }}" method="POST" class="p-6 md:p-8">
        @csrf
        @method('PUT')
        <input type="hidden" name="form_type" value="permissions">

        <div class="mb-4">
            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-4 border-b border-gray-100 dark:border-slate-700 pb-2">Direct User Permissions</label>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                @foreach($permissions as $permission)
                    <label class="flex items-start gap-3 p-3 rounded-xl border border-gray-100 dark:border-slate-700/50 hover:bg-gray-50 dark:hover:bg-slate-700/30 cursor-pointer transition-colors">
                        <div class="flex items-center h-5 mt-0.5">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" 
                                @checked(is_array(old('permissions')) ? in_array($permission->id, old('permissions')) : in_array($permission->id, $userPermissions))
                                class="w-4 h-4 text-emerald-600 bg-gray-100 border-gray-300 rounded focus:ring-emerald-500 dark:focus:ring-emerald-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-slate-700 dark:border-slate-600">
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

        <div class="flex items-center gap-4 pt-6 mt-6 border-t border-gray-100 dark:border-slate-700/50">
            <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2.5 rounded-xl text-sm font-medium transition-colors shadow-sm shadow-emerald-500/20">
                Save Custom Permissions
            </button>
        </div>
    </form>
</div>
@endsection
