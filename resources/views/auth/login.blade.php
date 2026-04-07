<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal - Login</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }

            33% {
                transform: translate(30px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }
    </style>
</head>

<body class="min-h-screen bg-slate-50 flex text-slate-800">

    <!-- Left Side: Visual / Educational Branding -->
    <div class="hidden lg:flex lg:w-1/2 relative bg-indigo-900 overflow-hidden items-center justify-center">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=2070&auto=format&fit=crop"
                alt="University Campus" class="object-cover w-full h-full opacity-40">
            <div class="absolute inset-0 bg-gradient-to-t from-indigo-950 via-indigo-900/80 to-transparent"></div>
        </div>

        <!-- Decorative Elements -->
        <div
            class="absolute top-20 left-20 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob">
        </div>
        <div
            class="absolute bottom-20 right-20 w-72 h-72 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000">
        </div>

        <!-- Content -->
        <div class="relative z-10 p-12 lg:p-24 text-white max-w-2xl">
            <div
                class="mb-8 inline-flex items-center gap-3 bg-white/10 px-4 py-2 rounded-full backdrop-blur-md border border-white/20 shadow-[0_0_15px_rgba(255,255,255,0.1)] hover:bg-white/20 transition-all duration-300">
                <i class="fa-solid fa-graduation-cap text-amber-400 text-lg"></i>
                <span class="text-sm font-medium tracking-wide border-l border-white/30 pl-3">Quiz PORTAL</span>
            </div>

            <h1 class="text-5xl font-bold mb-6 leading-tight font-outfit">Empower your <br><span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-amber-300 to-amber-500">academic
                    journey.</span></h1>
            <p class="text-indigo-100/90 text-lg leading-relaxed mb-10 font-light">A Quiz Portal is a web-based
                application designed to conduct, manage, and evaluate quizzes in an efficient and user-friendly manner.
                It allows users to register, log in, and participate in various quizzes across different categories or
                subjects.</p>

            <!-- Testimonial/Stats style widget -->
            <!-- <div class="glass-panel p-6 rounded-2xl flex items-center gap-6 mt-12 w-fit transform hover:-translate-y-1 transition-all duration-300">
                <div class="flex -space-x-4">
                    <img class="w-12 h-12 rounded-full border-2 border-indigo-900 shadow-sm" src="https://i.pravatar.cc/100?img=1" alt="Student">
                    <img class="w-12 h-12 rounded-full border-2 border-indigo-900 shadow-sm" src="https://i.pravatar.cc/100?img=4" alt="Student">
                    <img class="w-12 h-12 rounded-full border-2 border-indigo-900 shadow-sm" src="https://i.pravatar.cc/100?img=3" alt="Student">
                    <div class="w-12 h-12 rounded-full border-2 border-indigo-900 bg-indigo-600 flex items-center justify-center text-xs font-bold text-white shadow-sm">+5k</div>
                </div>
                <div>
                    <div class="flex text-amber-400 text-sm gap-0.5">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    </div>
                    <p class="text-sm font-medium mt-1 text-white">Joined by 5,000+ students</p>
                </div>
            </div> -->
        </div>
    </div>

    <!-- Right Side: Login Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12 lg:p-24 bg-white relative">

        <!-- Mobile Background Elements -->
        <div class="absolute top-0 inset-x-0 h-64 bg-gradient-to-b from-indigo-50/50 to-white lg:hidden"></div>
        <div
            class="absolute top-[-10%] right-[-5%] w-64 h-64 bg-indigo-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 lg:hidden">
        </div>
        <div
            class="absolute bottom-[-10%] left-[-5%] w-64 h-64 bg-amber-100 rounded-full mix-blend-multiply filter blur-3xl opacity-40 lg:hidden">
        </div>

        <div class="w-full max-w-md relative z-10">

            <!-- Logo area for mobile -->
            <div class="lg:hidden mb-10 inline-flex items-center gap-3">
                <div
                    class="w-12 h-12 bg-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-600/20">
                    <i class="fa-solid fa-graduation-cap text-white text-2xl"></i>
                </div>
                <span class="text-2xl font-bold text-slate-800 tracking-tight font-outfit">QuizApp</span>
            </div>

            <!-- Form Header & Copy -->
            <div class="mb-10 text-left">
                <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-2 font-outfit tracking-tight">Welcome back
                </h2>
                <p class="text-slate-500 font-light text-lg">Please enter your student details to continue.</p>
            </div>

            <form method="POST" action="/login" class="space-y-6">
                @csrf

                <!-- Email Input Group -->
                <div class="space-y-2 relative group">
                    <label for="email"
                        class="text-sm font-medium text-slate-700 block transition-colors group-focus-within:text-indigo-600">Email</label>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-indigo-500 transition-colors">
                            <i class="fa-regular fa-envelope text-lg"></i>
                        </div>
                        <input id="email" type="email" name="email" required placeholder="@gmail.com"
                            class="w-full pl-11 pr-4 py-3 bg-slate-50/50 border border-slate-200 text-slate-800 rounded-xl outline-none focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-300">
                    </div>
                </div>

                <!-- Password Input Group -->
                <div class="space-y-2 relative group">
                    <div class="flex justify-between items-center">
                        <label for="password"
                            class="text-sm font-medium text-slate-700 transition-colors group-focus-within:text-indigo-600">Password</label>
                        <a href="#"
                            class="text-xs font-semibold text-indigo-600 hover:text-indigo-700 transition-colors underline-offset-4 hover:underline">Forgot
                            password?</a>
                    </div>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-indigo-500 transition-colors">
                            <i class="fa-solid fa-lock text-lg"></i>
                        </div>
                        <input id="password" type="password" name="password" required placeholder="••••••••••••"
                            class="w-full pl-11 pr-4 py-3 bg-slate-50/50 border border-slate-200 text-slate-800 rounded-xl outline-none focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-300">
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center pt-2">
                    <input id="remember-me" name="remember" type="checkbox"
                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-slate-300 rounded cursor-pointer transition-colors accent-indigo-600">
                    <label for="remember-me"
                        class="ml-2 block text-sm text-slate-600 cursor-pointer select-none font-medium">
                        Remember me on this specific device
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full relative group overflow-hidden py-3.5 px-4 bg-indigo-600 text-white font-semibold rounded-xl transition duration-300 hover:bg-indigo-700 shadow-[0_8px_20px_-6px_rgba(79,70,229,0.5)] hover:shadow-[0_12px_25px_-6px_rgba(79,70,229,0.6)] flex justify-center items-center gap-2 transform active:scale-[0.98]">
                    <span class="tracking-wide">Sign In to Portal</span>
                    <i class="fa-solid fa-arrow-right text-lg transform group-hover:translate-x-1.5 transition-transform duration-300"></i>
                </button>
            </form>

            <!-- Sign Up Link -->
            <div class="mt-10 pt-6 border-t border-slate-100 flex justify-center text-sm">
                <span class="text-slate-500">Need help accessing your account?</span>
                <a href="#"
                    class="ml-1.5 font-semibold text-indigo-600 hover:text-indigo-700 transition-colors underline-offset-4 hover:underline">Contact
                    Support</a>
            </div>
        </div>
    </div>

    @if ($errors->any() || session('status') || session('success') || session('error'))
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const displayBanners = () => {
                    if (typeof window.showBanner === 'function') {
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                window.showBanner("{{ $error }}", "error");
                            @endforeach
                        @endif

                        @if (session('error'))
                            window.showBanner("{{ session('error') }}", "error");
                        @endif

                        @if (session('success'))
                            window.showBanner("{{ session('success') }}", "success");
                        @endif

                        @if (session('status'))
                            window.showBanner("{{ session('status') }}", "info");
                        @endif
                    } else {
                        // Wait for Vite module (app.js) to finish loading
                        setTimeout(displayBanners, 100);
                    }
                };
                displayBanners();
            });
        </script>
    @endif
</body>

</html>
