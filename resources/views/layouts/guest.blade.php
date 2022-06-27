<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> Computer Science</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
        

        <!-- Scripts -->
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
        <noscript><link rel="stylesheet" href="{{ asset('assets/css/noscript.css') }}" /></noscript>

        
    </head>
    <body class="is-preload">
        <!-- Header -->
<div id="page-wrapper">

    <header id="header">
        <h1 id="logo"><a href="/">Computer Science</a></h1>
        <nav id="nav">
            <ul>
                <li><a href="#">About</a></li>
                <li><a href="#">Helpdesk</a></li>
                <li><a href="#">Courseware</a></li>
                <li>@if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <li><a href="{{ url('/dashboard') }}" class="button primary small">Dashboard</a></li>
                @else
                    <li><a href="{{ route('login') }}" class="button primary small">Log in</a></li>
    
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="button small">Register</a></li>
                    @endif
                @endauth
                </li>
                </div>
        @endif
            
            </ul>
        </nav>
    </header>
    
    
    </div>
            {{ $slot }}
            <!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon brands alt fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
						<li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="github.com/beloved46" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
						<li><a href="mailto:belovedakande@gmail.com" class="icon solid alt fa-envelope"><span class="label">Email</span></a></li>
                                                
					</ul>
					<ul class="copyright">
                        <li><a href="https://www.flaticon.com/free-stickers/work" title="work stickers">Work stickers created by inipagistudio - Flaticon</a></li>
						<li>&copy; Copyright, Beloved 2022.</li>
				</footer>
    
    </body>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.scrolly.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.dropotron.min.js') }}"></script>
		{{-- <script src="{{ asset('assets/js/jquery.scrollex.min.js') }}"></script> --}}
		<script src="{{ asset('assets/js/browser.min.js') }}"></script>
		<script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
		<script src="{{ asset('assets/js/util.js') }}"></script>
		<script src="{{ asset('assets/js/main.js') }}"></script>
</html>
