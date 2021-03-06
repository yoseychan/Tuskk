<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Frijole&family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class=" navbar navbar-expand-md navbar-dark" id="header">
        <div class="container-fluid">
            <a class="navbar-brand" id="tusk" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse nav-wrapper" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto"></ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('articles') }}">Articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('categories') }}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-separator" href="{{ url('team') }}">Team</a>
                    </li>

                    <!-- Authentication Links -->
                    @guest

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @can('manage-users', Auth::user())
                                    <a class="dropdown-item" href="{{ url('admin/users') }}">Manage users</a>
                                @endcan
                                @can('manage-article', Auth::user())
                                    <a class="dropdown-item" href="{{ url('users/'. Auth::user()->id) }}">My
                                        Articles</a>
                                    <a class="dropdown-item" href="{{ url('article/create')}}">New Article</a>
                                @endcan

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>
    <footer>
        <div class="container">
            <div class="row justify-content-between">
                <div class="menu social">
                    <li><a target="_blank" href="https://twitter.com/home?lang=en"><i class="fab fa-twitter"></i></a></li>
                    <li><a target="_blank" href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a></li>
                    <li><a target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
                    <li><a target="_blank" href="https://www.reddit.com/"><i class="fab fa-reddit"></i></a></li>
                </div>
                <div class="menu ">
                    <ul>
                        <li><a href="{{ url('articles') }}">Articles</a></li>
                        <li><a href="{{ url('categories') }}">Categories</a></li>
                        <li><a href="/categories/esports">eSports</a></li>
                         <li><a href="/team">About Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="tusk">Tuskk</div>
    </footer>
</div>
<script src="https://kit.fontawesome.com/11a1857992.js" crossorigin="anonymous"></script>

</body>
</html>
