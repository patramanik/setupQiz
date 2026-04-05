<header class="bg-white/75 dark:bg-[#0f172a]/75 backdrop-blur-md sticky top-0 z-20 border-b border-gray-100 dark:border-slate-800/80 px-6 sm:px-8 py-3.5 flex items-center justify-between shadow-sm transition-all duration-300">
    <!-- Header Left Area -->
    <div class="flex items-center gap-4">
        <!-- Mobile Menu Trigger -->
        <button id="menuBtn" class="w-10 h-10 flex items-center justify-center text-gray-500 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 focus:outline-none md:hidden bg-gray-50 dark:bg-slate-800/50 hover:bg-gray-100 dark:hover:bg-slate-800 rounded-xl transition duration-300 border border-transparent dark:border-slate-700/50">
            <i class="fas fa-bars-staggered text-xl"></i>
        </button>

        <div class="hidden sm:flex flex-col">
            <h1 class="text-[17px] font-extrabold text-gray-900 dark:text-gray-50 tracking-tight leading-none">@yield('page_title', 'Dashboard Overview')</h1>
            <div class="flex items-center gap-2 mt-2">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.4)]"></span>
                <span class="text-[11px] font-bold text-gray-500 dark:text-gray-300 uppercase tracking-widest leading-none">{{ now()->format('l, F d') }}</span>
            </div>
        </div>
    </div>

    <!-- Header Actions Area -->
    <div class="flex items-center gap-4">
        <!-- Theme Toggle -->
        <div class="flex items-center gap-2 pr-2 border-r border-gray-100 dark:border-slate-800">
            <button id="themeToggle" class="w-10 h-10 flex items-center justify-center bg-gray-50 dark:bg-slate-800 text-gray-500 dark:text-gray-300 hover:bg-indigo-50 dark:hover:bg-slate-700 hover:text-indigo-600 dark:hover:text-indigo-400 rounded-xl transition duration-300 relative group group-active:scale-95 shadow-sm">
                <i id="themeToggleDarkIcon" class="hidden fas fa-moon text-lg"></i>
                <i id="themeToggleLightIcon" class="hidden fas fa-sun text-lg"></i>
            </button>
        </div>

        <!-- Quick Search (Desktop) -->
        <div class="hidden lg:flex items-center relative group">
            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                <i class="fas fa-search text-gray-400 dark:text-gray-400 text-sm group-hover:text-indigo-500 dark:group-hover:text-indigo-400 transition-colors"></i>
            </div>
            <input type="text" class="bg-gray-50/80 dark:bg-slate-900/80 border border-transparent dark:border-slate-700 focus:bg-white dark:focus:bg-slate-900 focus:border-indigo-500/30 focus:ring-4 focus:ring-indigo-500/5 text-gray-800 dark:text-gray-100 text-[13px] font-medium rounded-xl block w-64 pl-10 pr-4 py-2.5 transition-all outline-none" placeholder="Search quizzes or students...">
            <div class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none">
                <span class="text-[10px] font-bold text-gray-400 dark:text-gray-500 bg-gray-200 dark:bg-slate-800 px-2 py-0.5 rounded-md uppercase tracking-wider font-mono">CMD + K</span>
            </div>
        </div>

        <!-- Notification Center -->
        <div class="relative group">
            <button class="w-10 h-10 flex items-center justify-center bg-gray-50 dark:bg-slate-800 hover:bg-indigo-50 dark:hover:bg-slate-700 text-gray-500 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 rounded-xl transition duration-300 relative group-active:scale-95 shadow-sm">
                <i class="fas fa-bell text-lg"></i>
                <span class="absolute top-2.5 right-3 w-2.5 h-2.5 bg-rose-500 border-2 border-white dark:border-slate-800 rounded-full transition group-hover:scale-125 shadow-sm"></span>
            </button>
        </div>

        <!-- User profile summary -->
        <div class="flex items-center gap-3.5 pl-1 group cursor-pointer">
            <div class="flex flex-col text-right hidden sm:flex">
                <span class="text-[13px] font-extrabold text-gray-800 dark:text-gray-50 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">Alex Morgan</span>
                <span class="text-[10px] font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest mt-0.5">Super Admin</span>
            </div>
            <div class="relative">
                <img class="w-10 h-10 rounded-xl object-cover ring-2 ring-gray-100 dark:ring-slate-800 group-hover:ring-indigo-500/40 transition-all duration-300" src="https://ui-avatars.com/api/?background=6366f1&color=fff&name=AM" alt="profile">
                <span class="absolute -bottom-1 -right-1 w-4 h-4 bg-white dark:bg-slate-900 rounded-full flex items-center justify-center text-[8px] border border-gray-100 dark:border-slate-700 text-indigo-600 dark:text-indigo-400 font-bold shadow-sm">
                    <i class="fas fa-chevron-down"></i>
                </span>
            </div>
        </div>
    </div>
</header>