<header class="header">
    <div class="logo">
        <a href="{{ route('admin.dashboard') }}">Admin Panel</a>
    </div>
    <div class="user-menu">
        <span>{{ auth()->user()->name }}</span>
        <a href="{{ route('logout') }}">Logout</a>
    </div>
</header>