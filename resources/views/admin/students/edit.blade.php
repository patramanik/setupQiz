@extends('layouts.admin')

@section('title', 'Edit Student')
@section('page_title', 'Edit Profile')

@section('content')
<div class="space-y-6 max-w-4xl mx-auto">
    <!-- Header/Back Button -->
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.students.show', $student->student_id) }}" class="w-10 h-10 flex items-center justify-center bg-white dark:bg-slate-800 border border-gray-100 dark:border-slate-700 text-gray-500 dark:text-gray-400 rounded-xl hover:bg-gray-50 dark:hover:bg-slate-700 transition duration-300">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h2 class="text-xl font-bold text-gray-900 dark:text-gray-50">Edit Student: {{ $student->student_id }}</h2>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700 overflow-hidden">
        <form action="{{ route('admin.students.update', $student->student_id) }}" method="POST" class="p-8">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Basic Information -->
                <div class="space-y-6">
                    <h4 class="text-sm font-extrabold text-indigo-600 dark:text-indigo-400 uppercase tracking-widest mb-4">Basic Information</h4>
                    
                    <div>
                        <label class="block text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest mb-2">Full Name</label>
                        <input type="text" name="name" value="{{ old('name', $student->name) }}" 
                               class="w-full bg-gray-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-700 text-gray-700 dark:text-gray-200 rounded-xl px-4 py-3 text-sm font-medium focus:ring-2 focus:ring-indigo-500/20 outline-none transition-all">
                        @error('name') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest mb-2">Profile Email (Mail)</label>
                        <input type="email" name="mail" value="{{ old('mail', $student->profile->mail ?? $student->email) }}" 
                               class="w-full bg-gray-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-700 text-gray-700 dark:text-gray-200 rounded-xl px-4 py-3 text-sm font-medium focus:ring-2 focus:ring-indigo-500/20 outline-none transition-all">
                        @error('mail') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest mb-2">Gender</label>
                            <select name="gender" class="w-full bg-gray-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-700 text-gray-700 dark:text-gray-200 rounded-xl px-4 py-3 text-sm font-medium focus:ring-2 focus:ring-indigo-500/20 outline-none transition-all">
                                <option value="" {{ old('gender', $student->profile->gender) == '' ? 'selected' : '' }}>Select Gender</option>
                                <option value="Male" {{ old('gender', $student->profile->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender', $student->profile->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ old('gender', $student->profile->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest mb-2">DOB</label>
                            <input type="date" name="dob" value="{{ old('dob', $student->profile->dob) }}" 
                                   class="w-full bg-gray-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-700 text-gray-700 dark:text-gray-200 rounded-xl px-4 py-3 text-sm font-medium focus:ring-2 focus:ring-indigo-500/20 outline-none transition-all">
                        </div>
                    </div>
                </div>

                <!-- Other Details -->
                <div class="space-y-6">
                    <h4 class="text-sm font-extrabold text-indigo-600 dark:text-indigo-400 uppercase tracking-widest mb-4">Other Details</h4>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest mb-2">Highest Qualification</label>
                        <input type="text" name="high_qlc" value="{{ old('high_qlc', $student->profile->high_qlc) }}" 
                               class="w-full bg-gray-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-700 text-gray-700 dark:text-gray-200 rounded-xl px-4 py-3 text-sm font-medium focus:ring-2 focus:ring-indigo-500/20 outline-none transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest mb-2">Address</label>
                        <textarea name="address" rows="4" 
                                  class="w-full bg-gray-50 dark:bg-slate-900 border border-gray-200 dark:border-slate-700 text-gray-700 dark:text-gray-200 rounded-xl px-4 py-3 text-sm font-medium focus:ring-2 focus:ring-indigo-500/20 outline-none transition-all">{{ old('address', $student->profile->address) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="mt-12 pt-8 border-t border-gray-50 dark:border-slate-700/50 flex items-center justify-end gap-4">
                <a href="{{ route('admin.students.show', $student->student_id) }}" 
                   class="px-2 py-2 bg-gray-50 dark:bg-slate-900/50 text-gray-500 dark:text-gray-400 rounded-xl text-sm font-bold hover:bg-gray-100 dark:hover:bg-slate-900 hover:text-gray-700 dark:hover:text-gray-200 transition duration-300 border border-transparent">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-2 py-2 bg-indigo-600 text-white rounded-xl text-sm font-extrabold hover:bg-indigo-700 transition-all duration-300 shadow-xl shadow-indigo-500/25 dark:shadow-indigo-900/40 flex items-center gap-3 hover:scale-[1.02] active:scale-[0.98]">
                    <i class="fas fa-check-circle text-lg"></i>
                    Update 
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
