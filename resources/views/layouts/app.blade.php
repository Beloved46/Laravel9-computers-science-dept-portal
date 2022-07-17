<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Computer Science</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/4f803513fe.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm fixed-top " style="background-color: #baf3d7">
            <div class="container-fluid mx-4">
                <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand fs-3 fw-bold" href="{{ url('/') }}" style="color: #009d63">
                    Computerscience
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"><a class="nav-link fw-bold fs-5" href="#">About</a></li>
                        <li class="nav-item"><a class="nav-link fw-bold fs-5" href="#">Helpdesk</a></li>
                        <li class="nav-item"><a class="nav-link fw-bold fs-5" href="#">Courseware</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        {{-- @guest --}}
                            @if (Route::has('login'))
                                
                            @auth
                                <li><a href="{{ url('/dashboard') }}" class="btn btn-success btn-sm fw-bold fs-5 text-dark" >Dashboard</a></li>

                            @else (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link btn btn-outline-success btn-sm fw-bold fs-5" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link btn btn-success btn-sm fw-bold fs-5" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> --}}
                                @endauth
                            @endif
                        {{-- @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest --}}
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        @include('layouts.footer')
    </div>
        
</body>
</html>
