@extends('layouts.admin')

@section('title', 'Students List')
@section('page_title', 'All Students')

@section('content')
<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700 overflow-hidden">
    <div class="p-6 border-b border-gray-100 dark:border-slate-700 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-lg font-bold text-gray-900 dark:text-gray-50">Student Management</h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">View and manage registered students</p>
        </div>
        <div class="flex items-center gap-2">
            <div class="relative group">
                <i class="fas fa-search absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-sm group-focus-within:text-indigo-500 transition-colors"></i>
                <input type="text" placeholder="Search students..." class="pl-10 pr-4 py-2 bg-gray-50 dark:bg-slate-900 border-none rounded-xl text-sm focus:ring-2 focus:ring-indigo-500/20 w-64 transition-all outline-none">
            </div>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50/50 dark:bg-slate-900/50">
                    <th class="px-6 py-4 text-xs font-extrabold text-gray-400 dark:text-gray-500 uppercase tracking-widest">Student ID</th>
                    <th class="px-6 py-4 text-xs font-extrabold text-gray-400 dark:text-gray-500 uppercase tracking-widest">Student Name</th>
                    <th class="px-6 py-4 text-xs font-extrabold text-gray-400 dark:text-gray-500 uppercase tracking-widest">Email</th>
                    <th class="px-6 py-4 text-xs font-extrabold text-gray-400 dark:text-gray-500 uppercase tracking-widest text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 dark:divide-slate-700/50">
                @foreach ($students as $student)
                <tr class="hover:bg-gray-50/50 dark:hover:bg-slate-800/50 transition-colors group">
                    <td class="px-6 py-4">
                        <span class="text-sm font-mono font-bold text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-500/10 px-2.5 py-1 rounded-lg">
                            {{ $student->student_id }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-gray-100 dark:bg-slate-700 flex items-center justify-center text-[11px] font-bold text-gray-500 dark:text-gray-400">
                                {{ substr($student->name, 0, 1) }}
                            </div>
                            <span class="text-sm font-bold text-gray-700 dark:text-gray-200">{{ $student->name }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 font-medium">{{ $student->email }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.students.show', $student->student_id) }}" 
                           class="inline-flex items-center gap-2 bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-700 text-gray-700 dark:text-gray-200 px-3.5 py-1.5 rounded-xl text-[12px] font-bold hover:bg-indigo-600 hover:text-white dark:hover:bg-indigo-600 dark:hover:text-white hover:border-indigo-600 transition duration-300 shadow-sm group-hover:shadow-indigo-500/10">
                            View More <i class="fas fa-arrow-right text-[10px]"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
                @if($students->isEmpty())
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center">
                            <i class="fas fa-user-slash text-4xl text-gray-200 dark:text-slate-700 mb-4"></i>
                            <p class="text-gray-500 dark:text-gray-400 font-medium">No students found in the database.</p>
                        </div>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
