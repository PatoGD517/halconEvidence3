<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Halcon Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav>
        <!-- Add your navigation bar -->
        @if(Auth::check())
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('users.index') }}">Users</a>
            <a href="{{ route('orders.index') }}">Orders</a>
            <a href="{{ route('orders.archived') }}">Archived Orders</a>
        @endif
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
