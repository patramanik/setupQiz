@extends('layouts.admin')

@section('title', 'Register New User')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <a href="{{ route('users.index') }}" class="text-sm text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400 mb-2 inline-flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Back to Users
        </a>
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Register New User</h2>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Create an account and assign a role template.</p>
    </div>
</div>

<div class="bg-white dark:bg-slate-800/80 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700/50 p-6 md:p-8 w-full xl:w-2/3 mx-auto">
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Full Name -->
            <div>
                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Full Name</label>
                <input type="text" name="name" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 dark:border-slate-700 bg-gray-50 dark:bg-slate-900/50 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 text-gray-800 dark:text-gray-100" value="{{ old('name') }}" placeholder="John Doe" required>
                @error('name')
                    <p class="text-rose-500 text-xs mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Address -->
            <div>
                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Email Address</label>
                <input type="email" name="email" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 dark:border-slate-700 bg-gray-50 dark:bg-slate-900/50 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 text-gray-800 dark:text-gray-100" value="{{ old('email') }}" placeholder="john@example.com" required>
                @error('email')
                    <p class="text-rose-500 text-xs mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Password</label>
                <input type="password" name="password" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 dark:border-slate-700 bg-gray-50 dark:bg-slate-900/50 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 text-gray-800 dark:text-gray-100" placeholder="Minimum 8 characters" required minlength="8">
                @error('password')
                    <p class="text-rose-500 text-xs mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Role Selection -->
            <div>
                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Assign Role Template</label>
                <select name="role" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 dark:border-slate-700 bg-gray-50 dark:bg-slate-900/50 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 text-gray-800 dark:text-gray-100" required>
                    <option value="" disabled selected>Select a role...</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : '' }}>
                            {{ ucfirst($role->name) }}
                        </option>
                    @endforeach
                </select>
                @error('role')
                    <p class="text-rose-500 text-xs mt-1 font-medium">{{ $message }}</p>
                @enderror
                <p class="text-[11px] text-gray-500 mt-2">
                    <i class="fas fa-info-circle text-indigo-400 mr-1"></i> Permissions from the selected role will be automatically copied to this user. You can customize them later.
                </p>
            </div>
        </div>

        <div class="border-t border-gray-100 dark:border-slate-700/50 pt-6 flex items-center justify-end">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-xl text-sm font-medium transition-colors shadow-sm shadow-indigo-500/20">
                Register User
            </button>
        </div>
    </form>
</div>
@endsection
