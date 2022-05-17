<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title',"Blog")</title>
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    @stack('css')
</head>

<body class="bg-light">
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('categories') }}">Category</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('posts') }}">Posts</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('roles') }}">Roles</span></a>
                </li>
            </ul>

            {{-- User profile --}}
            {{-- Sử dụng Auth::check để kiểm tra xem người dùng đã đăng nhập hay chưa --}}
            @if (Auth::check())
                {{-- Nếu đã đăng nhập thì lấy email của người dùng ra ngoài --}}
                <a href="{{ url('user-profile') }}" class="nav-link text-white">{{ Auth::user()->email }}</a>
            @endif

            {{-- Logout --}}
            <a class="nav-link text-white" href="javascript:void(0)" onclick="document.getElementById('logout-form').submit()">Logout</span></a>
            <form id="logout-form" method="POST" action="logout">
                @csrf
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="mt-4">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('vendors/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('js')
</body>

</html>
