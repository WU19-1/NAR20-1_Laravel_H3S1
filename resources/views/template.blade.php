<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('/css/template.css')}}">
    <link rel="stylesheet" href="{{asset('/css/fa/css/all.css')}}">
</head>
<body>
    <navbar>
        <div class="header-container">
            <div class="header-content logo"><a href="/home" class="header-link">SimpleUniversity</a></div>
            @if(auth('admin')->check())
                <div class="header-content"><a href="/admin" class="header-link">Admin Page</a></div>
                <div class="header-content logout"><a href="/admin-logout" class="header-link">Logout</a></div>
            @endif
            @if(\Illuminate\Support\Facades\Auth::check() || request()->hasCookie('remember'))
                <div class="header-content"><a href="/profile" class="header-link">Profile</a></div>
                <div class="header-content"><a href="/schedule" class="header-link">Class Schedule</a></div>
                <div class="header-content logout"><a href="/logout" class="header-link">Logout</a></div>
            @endif
        </div>
    </navbar>
    <main>
        @yield('content')
    </main>
    <div class="footer">
        <p>Ⓒ Bluejacket - Software Laboratory Center Generation 19 - 1 Ⓒ</p>
    </div>
</body>
</html>