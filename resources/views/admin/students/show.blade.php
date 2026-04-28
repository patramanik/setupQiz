@extends('layouts.admin')

@section('title', 'Student Details')
@section('page_title', 'Student Profile')

@section('content')
<div class="space-y-6">
    <!-- Header/Back Button -->
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.students.index') }}" class="w-10 h-10 flex items-center justify-center bg-white dark:bg-slate-800 border border-gray-100 dark:border-slate-700 text-gray-500 dark:text-gray-400 rounded-xl hover:bg-gray-50 dark:hover:bg-slate-700 transition duration-300">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h2 class="text-xl font-bold text-gray-900 dark:text-gray-50">Student Profile: {{ $student->student_id }}</h2>
        <div class="ml-auto">
            <a href="{{ route('admin.students.edit', $student->student_id) }}" class="flex items-center gap-2 bg-indigo-600 text-white px-5 py-2 rounded-xl text-sm font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-200 dark:shadow-indigo-900/30 duration-300">
                <i class="fas fa-edit"></i> Edit Student
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Profile Card -->
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700 p-8 text-center relative overflow-hidden">
                <!-- Wallet Balance Badge -->
                <div class="absolute top-4 right-4">
                    <div class="bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 px-3 py-1.5 rounded-xl border border-emerald-100 dark:border-emerald-500/20">
                        <p class="text-[10px] font-extrabold uppercase tracking-widest leading-none mb-1">Balance</p>
                        <p class="text-lg font-black leading-none">₹{{ number_format($student->wallet_balance, 2) }}</p>
                    </div>
                </div>

                <div class="relative inline-block mb-6">
                    <img class="w-24 h-24 rounded-2xl object-cover ring-4 ring-gray-50 dark:ring-slate-700 shadow-xl" 
                         src="https://ui-avatars.com/api/?background=6366f1&color=fff&size=200&name={{ urlencode($student->name) }}" alt="student profile">
                    <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-emerald-500 border-4 border-white dark:border-slate-800 rounded-full flex items-center justify-center">
                        <i class="fas fa-check text-white text-[10px]"></i>
                    </div>
                </div>
                <h3 class="text-xl font-extrabold text-gray-900 dark:text-white">{{ $student->name }}</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 font-medium mt-1">{{ $student->email }}</p>
                
                <div class="mt-8 pt-8 border-t border-gray-50 dark:border-slate-700/50 flex items-center justify-center gap-6">
                    <div class="text-center">
                        <p class="text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-1">Status</p>
                        <span class="text-[11px] font-extrabold bg-green-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 px-3 py-1 rounded-lg uppercase">Active</span>
                    </div>
                    <div class="text-center">
                        <p class="text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-1">Joined</p>
                        <span class="text-sm font-bold text-gray-700 dark:text-gray-300">{{ $student->created_at->format('M Y') }}</span>
                    </div>
                </div>
            </div>

            <!-- Quick Info -->
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700 p-6">
                <h4 class="text-sm font-extrabold text-gray-900 dark:text-gray-50 uppercase tracking-widest mb-6">Other Details</h4>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500 dark:text-gray-400 font-medium">Highest Qual.</span>
                        <span class="text-sm font-bold text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-500/10 px-2 py-0.5 rounded-md">{{ $student->profile->high_qlc ?? 'N/A' }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500 dark:text-gray-400 font-medium">Gender</span>
                        <span class="text-sm font-bold text-gray-700 dark:text-gray-200">{{ $student->profile->gender ?? 'N/A' }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500 dark:text-gray-400 font-medium">Date of Birth</span>
                        <span class="text-sm font-bold text-gray-700 dark:text-gray-200">{{ $student->profile->dob ? \Carbon\Carbon::parse($student->profile->dob)->format('d M, Y') : 'N/A' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Details Column -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Address and More -->
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700 p-6">
                <h4 class="text-sm font-extrabold text-gray-900 dark:text-gray-50 uppercase tracking-widest mb-6">Contact & Address Information</h4>
                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="p-4 bg-gray-50 dark:bg-slate-900/50 rounded-2xl border border-gray-100 dark:border-slate-700 md:col-span-2">
                            <p class="text-[10px] font-extrabold text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-1.5">Profile Email (Mail)</p>
                            <p class="text-sm font-bold text-gray-800 dark:text-gray-200">{{ $student->profile->mail ?? $student->email }}</p>
                        </div>
                    </div>
                    <div class="p-4 bg-gray-50 dark:bg-slate-900/50 rounded-2xl border border-gray-100 dark:border-slate-700">
                        <p class="text-[10px] font-extrabold text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-1.5">Current Address</p>
                        <p class="text-sm font-bold text-gray-800 dark:text-gray-200 leading-relaxed">{{ $student->profile->address ?? 'No address provided.' }}</p>
                    </div>
                </div>
            </div>

            <!-- Transactions Section -->
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700 overflow-hidden">
                <div class="p-6 border-b border-gray-100 dark:border-slate-700 flex items-center justify-between">
                    <div>
                        <h4 class="text-sm font-extrabold text-gray-900 dark:text-gray-50 uppercase tracking-widest">Financial Summary</h4>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Manage wallet and view transactions</p>
                    </div>
                    <button id="toggleTransactions" class="flex items-center gap-2 bg-indigo-600 text-white px-4 py-2 rounded-xl text-xs font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-200 dark:shadow-indigo-900/30 duration-300">
                        <i class="fas fa-history"></i> Wallet Transaction
                    </button>
                </div>

                <!-- Transaction List (Hidden by default) -->
                <div id="transactionSection" class="hidden animate-fade-in">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50/50 dark:bg-slate-900/50">
                                    <th class="px-6 py-4 text-[10px] font-extrabold text-gray-400 dark:text-gray-500 uppercase tracking-widest">Date</th>
                                    <th class="px-6 py-4 text-[10px] font-extrabold text-gray-400 dark:text-gray-500 uppercase tracking-widest">Type</th>
                                    <th class="px-6 py-4 text-[10px] font-extrabold text-gray-400 dark:text-gray-500 uppercase tracking-widest">Amount</th>
                                    <th class="px-6 py-4 text-[10px] font-extrabold text-gray-400 dark:text-gray-500 uppercase tracking-widest">Updated Bal.</th>
                                    <th class="px-6 py-4 text-[10px] font-extrabold text-gray-400 dark:text-gray-500 uppercase tracking-widest">Description</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50 dark:divide-slate-700/50">
                                @forelse ($student->walletHistories as $history)
                                <tr class="hover:bg-gray-50/50 dark:hover:bg-slate-800/50 transition-colors">
                                    <td class="px-6 py-4 text-xs font-bold text-gray-500 dark:text-gray-400">
                                        {{ $history->created_at->format('d M, Y H:i') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-[10px] font-black px-2 py-0.5 rounded-lg uppercase tracking-wider {{ $history->type == 'Credit' ? 'bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400' : 'bg-rose-50 dark:bg-rose-500/10 text-rose-600 dark:text-rose-400' }}">
                                            {{ $history->type }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-extrabold {{ $history->type == 'Credit' ? 'text-emerald-600 dark:text-emerald-400' : 'text-rose-600 dark:text-rose-400' }}">
                                        {{ $history->type == 'Credit' ? '+' : '-' }}₹{{ number_format($history->amount, 2) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-200">
                                        ₹{{ number_format($history->updated_balance, 2) }}
                                    </td>
                                    <td class="px-6 py-4 text-xs text-gray-500 dark:text-gray-400 font-medium">
                                        {{ $history->description }}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-8 text-center text-sm text-gray-400">No transactions recorded yet.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('toggleTransactions').addEventListener('click', function() {
        const section = document.getElementById('transactionSection');
        const icon = this.querySelector('i');
        
        if (section.classList.contains('hidden')) {
            section.classList.remove('hidden');
            this.classList.remove('bg-indigo-600');
            this.classList.add('bg-slate-800', 'dark:bg-indigo-600');
            this.innerHTML = '<i class="fas fa-times"></i> Close Statement';
        } else {
            section.classList.add('hidden');
            this.classList.add('bg-indigo-600');
            this.classList.remove('bg-slate-800', 'dark:bg-indigo-600');
            this.innerHTML = '<i class="fas fa-history"></i> Wallet Transaction';
        }
    });
</script>

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeIn 0.4s ease-out forwards;
    }
</style>
@endsection
