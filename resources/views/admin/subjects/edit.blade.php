@extends('layouts.admin')

@section('title', 'Edit Subject')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <a href="{{ route('subjects.index') }}" class="text-sm text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400 mb-2 inline-flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Back to Subjects
        </a>
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Edit Subject</h2>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Update subject details for <span class="font-bold">{{ $subject->subject_code }}</span>.</p>
    </div>
</div>

<div class="bg-white dark:bg-slate-800/80 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700/50 p-6 md:p-8 w-full xl:w-2/3 mx-auto">
    <form action="{{ route('subjects.update', $subject) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Map to Exam -->
            <div class="md:col-span-2">
                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Map to Exam <span class="text-rose-500">*</span></label>
                <select name="exam_id" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 dark:border-slate-700 bg-gray-50 dark:bg-slate-900/50 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 text-gray-800 dark:text-gray-100 transition-colors" required>
                    <option value="" disabled>Select an active exam...</option>
                    @foreach($exams as $exam)
                        <option value="{{ $exam->id }}" {{ old('exam_id', $subject->exam_id) == $exam->id ? 'selected' : '' }}>
                            {{ $exam->name }} ({{ $exam->exam_code }})
                        </option>
                    @endforeach
                </select>
                @error('exam_id')
                    <p class="text-rose-500 text-xs mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Subject Name -->
            <div class="md:col-span-2">
                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Subject Name <span class="text-rose-500">*</span></label>
                <input type="text" name="name" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 dark:border-slate-700 bg-gray-50 dark:bg-slate-900/50 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 text-gray-800 dark:text-gray-100 transition-colors" value="{{ old('name', $subject->name) }}" placeholder="e.g. Mathematics" required>
                @error('name')
                    <p class="text-rose-500 text-xs mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status Radio Buttons -->
            <div class="md:col-span-2">
                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-3">Subject Status <span class="text-rose-500">*</span></label>
                <div class="flex items-center gap-6">
                    <!-- Active Option -->
                    <label class="relative flex items-center gap-3 cursor-pointer group">
                        <input type="radio" name="is_active" value="1" class="peer sr-only" {{ old('is_active', $subject->is_active) == '1' ? 'checked' : '' }} required>
                        <div class="w-5 h-5 rounded-full border-2 border-gray-300 dark:border-gray-600 peer-checked:border-indigo-500 peer-checked:bg-indigo-500 transition-all flex items-center justify-center">
                            <div class="w-2 h-2 rounded-full bg-white opacity-0 peer-checked:opacity-100 transition-opacity"></div>
                        </div>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">Active</span>
                    </label>

                    <!-- Inactive Option -->
                    <label class="relative flex items-center gap-3 cursor-pointer group">
                        <input type="radio" name="is_active" value="0" class="peer sr-only" {{ old('is_active', $subject->is_active) == '0' ? 'checked' : '' }} required>
                        <div class="w-5 h-5 rounded-full border-2 border-gray-300 dark:border-gray-600 peer-checked:border-rose-500 peer-checked:bg-rose-500 transition-all flex items-center justify-center">
                            <div class="w-2 h-2 rounded-full bg-white opacity-0 peer-checked:opacity-100 transition-opacity"></div>
                        </div>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-rose-600 dark:group-hover:text-rose-400 transition-colors">Inactive</span>
                    </label>
                </div>
                @error('is_active')
                    <p class="text-rose-500 text-xs mt-1 font-medium">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="border-t border-gray-100 dark:border-slate-700/50 pt-6 flex items-center justify-end">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-xl text-sm font-medium transition-all shadow-sm shadow-indigo-500/20 hover:shadow-md hover:shadow-indigo-500/30 flex items-center gap-2">
                <i class="fas fa-save"></i> Update Subject
            </button>
        </div>
    </form>
</div>
@endsection
