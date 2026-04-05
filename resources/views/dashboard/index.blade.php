@extends('layouts.admin')

@section('title', 'Overview')

@section('page_title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Welcome Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-50">Welcome back, Alex! 👋</h2>
            <p class="text-gray-500 dark:text-gray-300 mt-1">Here's what's happening with your quiz application today.</p>
        </div>
        <div class="flex items-center gap-2">
            <button class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-gray-700 dark:text-gray-200 px-4 py-2 rounded-xl text-sm font-medium hover:bg-gray-50 dark:hover:bg-slate-700 transition duration-300 shadow-sm">
                <i class="fas fa-download mr-2 text-indigo-500 dark:text-indigo-400"></i> Export Report
            </button>
            <button class="bg-indigo-600 text-white px-4 py-2 rounded-xl text-sm font-medium hover:bg-indigo-700 transition shadow-lg shadow-indigo-200 dark:shadow-indigo-900/30 duration-300">
                <i class="fas fa-plus mr-2"></i> Create New Quiz
            </button>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card 1 -->
        <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700 card-hover transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-blue-50 dark:bg-blue-500/20 text-blue-600 dark:text-blue-300 rounded-xl flex items-center justify-center">
                    <i class="fas fa-brain text-xl"></i>
                </div>
                <span class="text-xs font-bold text-green-600 dark:text-emerald-400 bg-green-50 dark:bg-emerald-500/20 px-2 py-1 rounded-lg">+12%</span>
            </div>
            <h3 class="text-gray-500 dark:text-gray-300 text-sm font-semibold uppercase tracking-wider">Active Quizzes</h3>
            <p class="text-3xl font-extrabold text-gray-900 dark:text-white mt-1">42</p>
        </div>
        
        <!-- Card 2 -->
        <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700 card-hover transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-indigo-50 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-300 rounded-xl flex items-center justify-center">
                    <i class="fas fa-users text-xl"></i>
                </div>
                <span class="text-xs font-bold text-green-600 dark:text-emerald-400 bg-green-50 dark:bg-emerald-500/20 px-2 py-1 rounded-lg">+5.2%</span>
            </div>
            <h3 class="text-gray-500 dark:text-gray-300 text-sm font-semibold uppercase tracking-wider">Total Students</h3>
            <p class="text-3xl font-extrabold text-gray-900 dark:text-white mt-1">1,280</p>
        </div>

        <!-- Card 3 -->
        <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700 card-hover transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-purple-50 dark:bg-purple-500/20 text-purple-600 dark:text-purple-300 rounded-xl flex items-center justify-center">
                    <i class="fas fa-medal text-xl"></i>
                </div>
                <span class="text-xs font-bold text-indigo-600 dark:text-indigo-300 bg-indigo-50 dark:bg-indigo-500/20 px-2 py-1 rounded-lg">84% Avg</span>
            </div>
            <h3 class="text-gray-500 dark:text-gray-300 text-sm font-semibold uppercase tracking-wider">Completion Rate</h3>
            <p class="text-3xl font-extrabold text-gray-900 dark:text-white mt-1">92.4%</p>
        </div>

        <!-- Card 4 -->
        <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700 card-hover transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-pink-50 dark:bg-pink-500/20 text-pink-600 dark:text-pink-300 rounded-xl flex items-center justify-center">
                    <i class="fas fa-star text-xl"></i>
                </div>
                <span class="text-xs font-bold text-rose-600 dark:text-rose-300 bg-rose-50 dark:bg-rose-500/20 px-2 py-1 rounded-lg">4.9/5</span>
            </div>
            <h3 class="text-gray-500 dark:text-gray-300 text-sm font-semibold uppercase tracking-wider">User Rating</h3>
            <p class="text-3xl font-extrabold text-gray-900 dark:text-white mt-1">4.8</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Stats Chart Layer -->
        <div class="lg:col-span-2 bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700 transition-all duration-300">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-lg font-bold text-gray-900 dark:text-gray-50">Quiz Engagement</h2>
                    <p class="text-xs text-gray-400 dark:text-gray-400">Total attempts over the last 7 days</p>
                </div>
                <select class="bg-gray-50 dark:bg-slate-900 border-none text-xs font-bold text-gray-500 dark:text-gray-300 rounded-lg focus:ring-0 cursor-pointer">
                    <option>Last 7 Days</option>
                    <option>Last 30 Days</option>
                </select>
            </div>
            <div class="h-64 flex items-center justify-center bg-gray-50 dark:bg-slate-900/50 rounded-xl border border-dashed border-gray-200 dark:border-slate-700/50">
                <div class="text-center">
                    <i class="fas fa-chart-area text-gray-300 dark:text-slate-700 text-4xl mb-3"></i>
                    <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Analytics chart will load here</p>
                </div>
            </div>
        </div>

        <!-- Right Side: Recent Activity -->
        <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700 flex flex-col transition-all duration-300">
            <h2 class="text-lg font-bold text-gray-900 dark:text-gray-50 mb-6">Recent Attempts</h2>
            <div class="space-y-6 flex-1">
                @php
                    $activities = [
                        ['user' => 'Sarah Connor', 'quiz' => 'Modern JS Basics', 'score' => '95%', 'time' => '2 mins ago'],
                        ['user' => 'John Wick', 'quiz' => 'Laravel Security', 'score' => '100%', 'time' => '15 mins ago'],
                        ['user' => 'Ellen Ripley', 'quiz' => 'React Hooks', 'score' => '82%', 'time' => '45 mins ago'],
                        ['user' => 'Marty McFly', 'quiz' => 'PHP 8.2 Features', 'score' => '74%', 'time' => '1 hour ago'],
                        ['user' => 'James Bond', 'quiz' => 'System Design', 'score' => '88%', 'time' => '3 hours ago'],
                    ];
                @endphp
                @foreach ($activities as $act)
                <div class="flex items-start gap-3 group cursor-pointer">
                    <div class="w-9 h-9 rounded-full bg-indigo-50 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-300 flex items-center justify-center text-xs font-bold group-hover:bg-indigo-600 group-hover:text-white transition-all duration-400">
                        {{ substr($act['user'], 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-gray-800 dark:text-gray-100 truncate group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">{{ $act['user'] }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 line-clamp-1 mt-0.5">{{ $act['quiz'] }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs font-bold text-emerald-600 dark:text-emerald-400">{{ $act['score'] }}</p>
                        <p class="text-[10px] text-gray-400 dark:text-gray-500 font-medium">{{ $act['time'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="w-full mt-8 py-3 bg-gray-50 dark:bg-slate-900/80 text-gray-600 dark:text-gray-300 rounded-xl text-xs font-bold hover:bg-gray-100 dark:hover:bg-slate-700 transition duration-300 border border-transparent dark:border-slate-700/50">View All Attempts</button>
        </div>
    </div>
</div>
@endsection
