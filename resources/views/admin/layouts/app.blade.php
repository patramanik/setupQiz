<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <script src="{{ asset('js/admin.js') }}" defer></script>
</head>
<body>
    <!-- Sidebar -->
    @include('admin.partials.sidebar')

    <div class="main-content">
        <!-- Header -->
        @include('admin.partials.header')

        <!-- Page Content -->
        <div class="content">
            @yield('content')
        </div>

        <!-- Footer -->
        @include('admin.partials.footer')
    </div>
</body>
</html>