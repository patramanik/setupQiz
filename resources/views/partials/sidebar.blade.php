<aside id="sidebar"
    class="fixed inset-y-0 left-0 z-30 w-72 bg-white dark:bg-[#0f172a] text-gray-700 dark:text-gray-300 flex flex-col sidebar-transition -translate-x-full md:relative md:translate-x-0 border-r border-gray-100 dark:border-slate-800 shadow-sm">
    <!-- Brand Section -->
    <div class="px-7 py-8 flex items-center justify-between border-b border-gray-50 dark:border-slate-800/50">
        <div class="flex items-center gap-3 group cursor-pointer">
            <div
                class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-indigo-700 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-500/20 group-hover:scale-110 transition duration-300">
                <i class="fas fa-bolt text-white text-lg"></i>
            </div>
            <div class="flex flex-col">
                <span class="text-xl font-bold text-gray-800 dark:text-gray-50 tracking-tight leading-none">Nexus<span
                        class="text-indigo-600 dark:text-indigo-400">Dash</span></span>
                <span
                    class="text-[10px] font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest mt-1.5">Quiz
                    Platform</span>
            </div>
        </div>
        <button id="closeSidebarBtn"
            class="md:hidden text-gray-400 hover:text-gray-800 dark:hover:text-white transition-colors">
            <i class="fas fa-times text-xl"></i>
        </button>
    </div>

    <!-- Navigation Section -->
    <nav class="flex-1 px-4 py-6 space-y-9 overflow-y-auto custom-scrollbar">
        <!-- Main Menu Group -->
        <div class="space-y-1.5">
            <p class="px-4 text-[11px] font-extrabold text-gray-400 dark:text-gray-600 uppercase tracking-[2px] mb-4">
                Main Menu</p>

            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-3.5 px-4 py-3 rounded-xl transition-all duration-300 group {{ request()->routeIs('dashboard') ? 'bg-indigo-50 dark:bg-indigo-600/20 text-indigo-700 dark:text-indigo-400 font-bold shadow-sm' : 'hover:bg-gray-50 dark:hover:bg-slate-800 hover:text-gray-900 dark:hover:text-white' }}">
                <div class="w-5 flex justify-center">
                    <i
                        class="fas fa-grid-2 text-lg {{ request()->routeIs('dashboard') ? 'text-indigo-600 dark:text-indigo-400' : 'text-gray-400 dark:text-gray-500 group-hover:text-indigo-500 dark:group-hover:text-indigo-400' }}"></i>
                </div>
                <span class="text-[14px]">Dashboard</span>
                @if (request()->routeIs('dashboard'))
                    <span class="ml-auto w-2 h-2 rounded-full bg-indigo-600 dark:bg-indigo-400 shadow-glow"></span>
                @endif
            </a>

            <a href="#"
                class="flex items-center gap-3.5 px-4 py-3 rounded-xl transition-all duration-300 group hover:bg-gray-50 dark:hover:bg-slate-800 hover:text-gray-900 dark:hover:text-white">
                <div
                    class="w-5 flex justify-center text-gray-400 dark:text-gray-500 group-hover:text-amber-500 dark:group-hover:text-amber-400">
                    <i class="fas fa-book-open text-lg"></i>
                </div>
                <span class="text-[14px]">Quizzes</span>
            </a>

            <a href="#"
                class="flex items-center gap-3.5 px-4 py-3 rounded-xl transition-all duration-300 group hover:bg-gray-50 dark:hover:bg-slate-800 hover:text-gray-900 dark:hover:text-white">
                <div
                    class="w-5 flex justify-center text-gray-400 dark:text-gray-500 group-hover:text-rose-500 dark:group-hover:text-rose-400">
                    <i class="fas fa-user-graduate text-lg"></i>
                </div>
                <span class="text-[14px]">Students</span>
                <span
                    class="ml-auto bg-rose-50 dark:bg-rose-500/10 text-rose-600 dark:text-rose-400 text-[10px] font-bold px-2.5 py-0.5 rounded-lg uppercase tracking-wide">New</span>
            </a>

            <a href="#"
                class="flex items-center gap-3.5 px-4 py-3 rounded-xl transition-all duration-300 group hover:bg-gray-50 dark:hover:bg-slate-800 hover:text-gray-900 dark:hover:text-white">
                <div
                    class="w-5 flex justify-center text-gray-400 dark:text-gray-500 group-hover:text-emerald-500 dark:group-hover:text-emerald-400">
                    <i class="fas fa-chart-line-up text-lg"></i>
                </div>
                <span class="text-[14px]">Analytics</span>
            </a>
        </div>

        <!-- Management Group -->
        <div class="space-y-1.5">
            <p class="px-4 text-[11px] font-extrabold text-gray-400 dark:text-gray-600 uppercase tracking-[2px] mb-4">
                Management</p>

            <a href="#"
                class="flex items-center gap-3.5 px-4 py-3 rounded-xl transition-all duration-300 group hover:bg-gray-50 dark:hover:bg-slate-800 hover:text-gray-900 dark:hover:text-white">
                <div class="w-5 flex justify-center text-gray-400 dark:text-gray-500 group-hover:text-indigo-500">
                    <i class="fas fa-cog text-lg"></i>
                </div>
                <span class="text-[14px]">Configurations</span>
            </a>

            <a href="#"
                class="flex items-center gap-3.5 px-4 py-3 rounded-xl transition-all duration-300 group hover:bg-gray-50 dark:hover:bg-slate-800 hover:text-gray-900 dark:hover:text-white">
                <div class="w-5 flex justify-center text-gray-400 dark:text-gray-500 group-hover:text-indigo-500">
                    <i class="fas fa-shield-halved text-lg"></i>
                </div>
                <span class="text-[14px]">Moderators</span>
            </a>
        </div>

        <!-- Support Widget -->
        <div class="px-2 pt-6">
            <div
                class="relative overflow-hidden bg-indigo-50 dark:bg-slate-800/80 border border-indigo-100 dark:border-slate-700/50 rounded-2xl p-5 group cursor-pointer hover:bg-indigo-100/60 dark:hover:bg-slate-800 transition-all duration-300 shadow-sm">
                <div
                    class="absolute -right-4 -top-4 w-20 h-20 bg-indigo-500/5 dark:bg-indigo-400/5 rounded-full blur-2xl group-hover:bg-indigo-500/10 transition-all duration-500">
                </div>
                <div class="flex flex-col gap-4 relative z-10">
                    <div
                        class="w-9 h-9 bg-white dark:bg-slate-900 border border-indigo-100 dark:border-slate-700 text-indigo-600 dark:text-indigo-400 rounded-xl flex items-center justify-center shadow-sm">
                        <i class="fas fa-question text-sm"></i>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-gray-800 dark:text-gray-100">Need help?</p>
                        <p class="text-[11px] text-gray-500 dark:text-gray-400 mt-1.5 font-medium leading-normal">Get
                            professional support from our dedicated technical team.</p>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Footer Profile -->
    <div class="p-6 border-t border-gray-50 dark:border-slate-800/50 mt-auto">
        <div class="flex items-center gap-4 group cursor-pointer">
            <div class="relative">
                <img class="w-10 h-10 rounded-xl object-cover ring-2 ring-gray-100 dark:ring-slate-800 group-hover:ring-indigo-200 dark:group-hover:ring-indigo-500/40 transition-all duration-400"
                    src="https://ui-avatars.com/api/?background=6366f1&color=fff&name={{ urlencode(Auth::user()->name) }}"
                    alt="avatar">
                <span
                    class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-emerald-500 border-2 border-white dark:border-[#0f172a] rounded-full shadow-sm"></span>
            </div>

            <div class="flex-1 min-w-0">
                <p
                    class="text-[13px] font-bold text-gray-800 dark:text-gray-100 truncate group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
                    {{ Auth::user()->name }}
                </p>
                <p
                    class="text-[11px] font-semibold text-gray-400 dark:text-gray-500 truncate mt-0.5 uppercase tracking-wider">
                    Super Admin
                </p>
            </div>

            <button type="button" id="logout-btn"
                class="text-gray-400 hover:text-rose-500 dark:hover:text-rose-400 p-1.5 transition-colors"
                title="Logout">
                <i class="fas fa-power-off text-sm"></i>
            </button>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </div>
</aside>

<style>
    .shadow-glow {
        box-shadow: 0 0 10px rgba(99, 102, 241, 0.5);
    }

    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #f1f5f9;
        border-radius: 10px;
    }

    .dark .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #1e293b;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #e2e8f0;
    }

    .dark .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #334155;
    }
</style>