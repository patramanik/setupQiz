<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 overflow-hidden">

    <!-- Background blobs -->
    <div class="absolute w-72 h-72 bg-white/10 rounded-full top-10 left-10 animate-pulse"></div>
    <div class="absolute w-96 h-96 bg-white/10 rounded-full bottom-10 right-10 animate-pulse"></div>

    <!-- Login Card -->
    <div class="relative w-full max-w-md p-8 bg-white/20 backdrop-blur-xl rounded-2xl shadow-2xl">

        <h2 class="text-2xl font-semibold text-white text-center mb-6">Login</h2>

        <form method="POST" action="/login" class="space-y-6">
            @csrf

            <!-- Email -->
            <div class="relative">
                <input 
                    type="email" 
                    name="email" 
                    required
                    placeholder=" "
                    class="peer w-full px-4 pt-5 pb-2 bg-white/20 text-white rounded-lg outline-none focus:ring-2 focus:ring-white"
                >
                <label class="absolute left-4 top-2 text-sm text-white/70 transition-all
                    peer-placeholder-shown:top-3.5 
                    peer-placeholder-shown:text-base 
                    peer-placeholder-shown:text-white/50
                    peer-focus:top-2 
                    peer-focus:text-sm 
                    peer-focus:text-white">
                    Email
                </label>
            </div>

            <!-- Password -->
            <div class="relative">
                <input 
                    type="password" 
                    name="password" 
                    required
                    placeholder=" "
                    class="peer w-full px-4 pt-5 pb-2 bg-white/20 text-white rounded-lg outline-none focus:ring-2 focus:ring-white"
                >
                <label class="absolute left-4 top-2 text-sm text-white/70 transition-all
                    peer-placeholder-shown:top-3.5 
                    peer-placeholder-shown:text-base 
                    peer-placeholder-shown:text-white/50
                    peer-focus:top-2 
                    peer-focus:text-sm 
                    peer-focus:text-white">
                    Password
                </label>
            </div>

            <!-- Button -->
            <button 
                type="submit"
                class="w-full py-3 bg-white text-gray-800 font-semibold rounded-lg hover:bg-gray-100 transition duration-300 transform hover:-translate-y-1"
            >
                Login
            </button>
        </form>

    </div>

</body>
</html>