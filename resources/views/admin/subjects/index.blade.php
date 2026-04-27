@extends('layouts.admin')

@section('title', 'Subjects Management')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Subjects Management</h2>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Manage and view all subjects mapped to exams.</p>
    </div>
    <a href="{{ route('subjects.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition-all shadow-sm shadow-indigo-500/20 flex items-center gap-2">
        <i class="fas fa-plus"></i> Create Subject
    </a>
</div>

@if(session('success'))
<div class="mb-6 bg-emerald-50 dark:bg-emerald-500/10 border border-emerald-200 dark:border-emerald-500/20 text-emerald-600 dark:text-emerald-400 px-4 py-3 rounded-xl flex items-center gap-3">
    <i class="fas fa-check-circle"></i>
    <p class="text-sm font-medium">{{ session('success') }}</p>
</div>
@endif

<div class="bg-white dark:bg-slate-800/80 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700/50 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50/50 dark:bg-slate-900/50 border-b border-gray-100 dark:border-slate-700/50">
                    <th class="px-6 py-4 text-[11px] font-bold text-gray-400 dark:text-gray-500 uppercase tracking-wider">Subject Code</th>
                    <th class="px-6 py-4 text-[11px] font-bold text-gray-400 dark:text-gray-500 uppercase tracking-wider">Subject Name</th>
                    <th class="px-6 py-4 text-[11px] font-bold text-gray-400 dark:text-gray-500 uppercase tracking-wider">Mapped Exam</th>
                    <th class="px-6 py-4 text-[11px] font-bold text-gray-400 dark:text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-[11px] font-bold text-gray-400 dark:text-gray-500 uppercase tracking-wider text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-slate-700/50">
                @forelse($subjects as $subject)
                <tr class="hover:bg-gray-50/50 dark:hover:bg-slate-800/50 transition-colors group">
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 border border-indigo-100 dark:border-indigo-500/20">
                            {{ $subject->subject_code }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-sm font-semibold text-gray-800 dark:text-gray-200">{{ $subject->name }}</span>
                    </td>
                    <td class="px-6 py-4">
                        @if($subject->exam)
                        <span class="text-sm font-medium text-gray-600 dark:text-gray-300">
                            {{ $subject->exam->name }} 
                            <span class="text-xs text-gray-400">({{ $subject->exam->exam_code }})</span>
                        </span>
                        @else
                        <span class="text-sm text-gray-400 italic">No Exam</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @if($subject->is_active)
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-xs font-medium bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-100 dark:border-emerald-500/20">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Active
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-xs font-medium bg-rose-50 dark:bg-rose-500/10 text-rose-600 dark:text-rose-400 border border-rose-100 dark:border-rose-500/20">
                                <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> Inactive
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('subjects.edit', $subject) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-gray-50 dark:bg-slate-800 text-gray-400 dark:text-gray-500 hover:text-indigo-600 dark:hover:text-indigo-400 hover:bg-indigo-50 dark:hover:bg-indigo-500/10 transition-colors tooltip" title="Edit Subject">
                                <i class="fas fa-pen text-sm"></i>
                            </a>
                            <form action="{{ route('subjects.destroy', $subject) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this subject?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-gray-50 dark:bg-slate-800 text-gray-400 dark:text-gray-500 hover:text-rose-600 dark:hover:text-rose-400 hover:bg-rose-50 dark:hover:bg-rose-500/10 transition-colors tooltip" title="Delete Subject">
                                    <i class="fas fa-trash-alt text-sm"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center">
                            <div class="w-16 h-16 bg-gray-50 dark:bg-slate-800 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-book-open text-2xl text-gray-400 dark:text-gray-500"></i>
                            </div>
                            <h3 class="text-base font-bold text-gray-800 dark:text-gray-200 mb-1">No Subjects Found</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Get started by creating your first subject mapped to an exam.</p>
                            <a href="{{ route('subjects.create') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-700 dark:text-indigo-400 dark:hover:text-indigo-300">
                                Create Subject &rarr;
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
