<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>@yield('title', 'Admin Dashboard') | ExamDisha</title>
    <!-- Tailwind CSS CDN -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <!-- Google Fonts Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        * { font-family: 'Inter', sans-serif; -webkit-font-smoothing: antialiased; }
        body { background: #f8fafc; }
        .sidebar-transition { transition: transform 0.25s ease-in-out; }
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #e9eef3; border-radius: 10px; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        .card-hover { transition: all 0.2s ease; }
        .card-hover:hover { transform: translateY(-2px); box-shadow: 0 12px 20px -12px rgba(0,0,0,0.15); }
    </style>
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    @stack('styles')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f8fafc] dark:bg-[#0f172a] font-sans antialiased selection:bg-indigo-100 selection:text-indigo-700 transition-colors duration-300">

<!-- Global Loader Overlay -->
<div id="global-loader" class="fixed inset-0 z-[100] flex flex-col items-center justify-center bg-white/70 dark:bg-slate-900/70 backdrop-blur-sm hidden transition-opacity duration-300">
    <div class="relative w-20 h-20 flex items-center justify-center">
        <!-- Outer spinning ring -->
        <div class="absolute inset-0 border-4 border-indigo-200 dark:border-indigo-900/50 rounded-full"></div>
        <!-- Inner spinning ring -->
        <div class="absolute inset-0 border-4 border-transparent border-t-indigo-600 dark:border-t-indigo-400 rounded-full animate-spin"></div>
        <!-- Center icon -->
        <i class="fas fa-bolt text-indigo-600 dark:text-indigo-400 text-xl animate-pulse"></i>
    </div>
    <div class="mt-4 flex flex-col items-center">
        <p class="text-indigo-700 dark:text-indigo-300 font-bold tracking-widest text-sm uppercase animate-pulse">Processing</p>
        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Please wait a moment...</p>
    </div>
</div>

<div class="flex relative">
    <!-- Overlay for mobile -->
    <div id="overlay" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-20 hidden md:hidden"></div>

    <!-- Sidebar Partial -->
    @include('partials.sidebar')

    <!-- Main Content Wrapper -->
    <div class="flex-1 flex flex-col min-h-screen dark:bg-[#0f172a] transition-colors duration-300">
        <!-- Header Partial -->
        @include('partials.header')

        <!-- Dynamic Page Content -->
        <main class="p-5 md:p-6 flex-1 dark:bg-[#0f172a] transition-all duration-300">
            @yield('content')
        </main>

        <footer class="mt-8 mb-4 text-center text-xs text-gray-400 border-t border-gray-100 pt-5">
            <p>© {{ date('Y') }} Exam Disha — Admin Dashboard. Built with Tailwind CSS & Laravel</p>
        </footer>
    </div>
</div>

<script>
    // Sidebar toggle logic (same as original)
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const menuBtn = document.getElementById('menuBtn');
    const closeSidebarBtn = document.getElementById('closeSidebarBtn');

    function openSidebar() {
        if (window.innerWidth < 768) {
            sidebar.classList.add('translate-x-0');
            overlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }
    function closeSidebar() {
        if (window.innerWidth < 768) {
            sidebar.classList.remove('translate-x-0');
            overlay.classList.add('hidden');
            document.body.style.overflow = '';
        }
    }
    if (menuBtn) menuBtn.addEventListener('click', openSidebar);
    if (closeSidebarBtn) closeSidebarBtn.addEventListener('click', closeSidebar);
    if (overlay) overlay.addEventListener('click', closeSidebar);

    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
            sidebar.classList.remove('translate-x-0');
            overlay.classList.add('hidden');
            document.body.style.overflow = '';
        } else if (!sidebar.classList.contains('translate-x-0')) {
            overlay.classList.add('hidden');
        }
    });

    // Theme toggle logic
    const themeToggleBtn = document.getElementById('themeToggle');
    const themeToggleDarkIcon = document.getElementById('themeToggleDarkIcon');
    const themeToggleLightIcon = document.getElementById('themeToggleLightIcon');

    // Change the icons inside the button based on previous settings
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        themeToggleLightIcon.classList.remove('hidden');
    } else {
        themeToggleDarkIcon.classList.remove('hidden');
    }

    themeToggleBtn.addEventListener('click', function() {
        // toggle icons inside button
        themeToggleDarkIcon.classList.toggle('hidden');
        themeToggleLightIcon.classList.toggle('hidden');

        // if set via local storage previously
        if (localStorage.getItem('color-theme')) {
            if (localStorage.getItem('color-theme') === 'light') {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            }

        // if NOT set via local storage previously
        } else {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        }
    });

    // Optional: prevent default on nav links (demo)
    document.querySelectorAll('#sidebar nav a').forEach(link => {
        link.addEventListener('click', (e) => {
            if (window.innerWidth < 768) closeSidebar();
            // e.preventDefault(); // Commenting this out to allow real navigation
        });
    });

    // Global Form Submission Interceptor for Loader
    document.addEventListener('submit', function(e) {
        const form = e.target;
        
        // Skip if form has data-no-loader attribute
        if (form.hasAttribute('data-no-loader')) return;

        // Prevent double submission
        if (form.dataset.submitted === 'true') {
            e.preventDefault();
            return;
        }
        form.dataset.submitted = 'true';

        // Show global loader overlay
        const loader = document.getElementById('global-loader');
        if (loader) {
            loader.classList.remove('hidden');
        }

        // Disable submit buttons and show loading state
        const submitButtons = form.querySelectorAll('button[type="submit"], input[type="submit"]');
        submitButtons.forEach(btn => {
            btn.disabled = true;
            btn.classList.add('opacity-75', 'cursor-not-allowed', 'pointer-events-none');
            
            // If it's a button, show spinner inside it
            if (btn.tagName === 'BUTTON' && !btn.dataset.originalHtml) {
                btn.dataset.originalHtml = btn.innerHTML;
                btn.innerHTML = '<i class="fas fa-circle-notch fa-spin mr-2"></i>Processing...';
            }
        });
    });
</script>
@stack('scripts')
</body>
</html>