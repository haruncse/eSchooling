<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--<title>{{ config('app.name', 'Laravel') }}</title>--}}
    <title>eSchool</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{--     
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/examples.css" rel="stylesheet" type="text/css">
    <link href="css/slider-pro.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/owl.theme.css" type="text/css" media="all">
    <link href="css/nav.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
     --}}
</head>
<body>
    <div id="app">
    {{--<div class="container-btn" id="btn">
            <div class="text">Menu</div>
            <div id="bars">
                <div class="bar first"></div>
                <div class="bar second"></div>
                <div class="bar third"></div>
            </div>
        </div>
        <!-- top-overlay -->
        <div class="top-overlay fade-out" id="menu">
            <nav class="top-overlay-content" id="nav">
                <span class="top-overlay-close" id="close-btn"> &times; </span>
                <div class="container" id="container">
                    <div class="first-nav text-center">
                        <ul class="first-nav text-center">
                        <li><a href="/" class="active">Home</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/team">Team</a></li>
                        <li><a href="/gallery" class="dropdown">Gallery</a></li>
                          
                        <li class="dropdown">
                          <button class="dropbtn">Dropdown <i class="fas fa-angle-down"></i></button>
                          <div class="dropdown-content">
                            <a href="/gallery">Gallery</a>
                            <a href="/error404">Error</a>
                             <a href="/service">Services</a>
                          </div>
                        </li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                    </div>
                </div>
            </nav>
        </div>
    --}}
        <!--//nav-->
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        eSchool
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="{{route('show.post')}}">View Post</a> 
                            </li>
                            @if(Auth::user()->role=='Student')
                            <li class="dropdown">
                                <a href="{{route('create.post')}}">Ask Questions ?</a> 
                            </li>
                            @elseif(Auth::user()->role=='Teacher')
                            <li class="dropdown">
                                <a href="">Give Answers </a> 
                            </li>
                            @elseif(Auth::user()->role=='eSchoolAdmin')
                            <li class="dropdown">
                                <a href="">Manage All </a> 
                            </li>
                            @endif
                            <li class="dropdown">
                                <a href="">Notifications </a> 
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
