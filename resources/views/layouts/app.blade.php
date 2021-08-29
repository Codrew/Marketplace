<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Hello, world!</title>
    <style>
        /* .navbar li a {
            color: white !important;
        } */

        .dropdown:hover>.dropdown-menu {
            display: block;
        }

        /* hover dropdown menus */
        @media only screen and (max-width: 991px) {
            .navbar-hover .show>.dropdown-toggle::after {
                transform: rotate(-90deg);
            }
        }

        @media only screen and (min-width: 492px) {

            .navbar-hover .collapse ul li {
                position: relative;
            }

            .navbar-hover .collapse ul li:hover>ul {
                display: block
            }

            .navbar-hover .collapse ul ul {
                position: absolute;
                top: 100%;
                left: 0;
                min-width: 250px;
                display: none
            }

            .navbar-hover .collapse ul ul ul {
                position: absolute;
                top: 0;
                left: 100%;
                min-width: 250px;
                display: none
            }
        }

    </style>
    @stack('css')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-danger shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->is_admin == 1)
                                    <a class="dropdown-item" href="{{ url('admin/dashboard')}}">
                                        Dashboard
                                    </a>
                                    @else
                                    <a class="dropdown-item" href="{{ route('ads.index')}}">
                                        Ads
                                    </a>
                                    @endif
        
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm navbar-hover">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHover"
                aria-controls="navbarDD" aria-expanded="false" aria-label="Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarHover">
                <ul class="container navbar-nav">
                    @foreach ($menus as $menuItem)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('category.show', $menuItem->slug) }}"
                                data-toggle="dropdown_remove_dropdown_class_for_clickable_link" aria-haspopup="true"
                                aria-expanded="false">
                                {{ $menuItem->name }}
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($menuItem->subcategory as $menuSub)
                                    <li>
                                        <a class="dropdown-item dropdown-toggle"
                                            href="{{ route('subcategory.show', [$menuItem->slug, $menuSub->slug]) }}">{{ $menuSub->name }}</a>
                                        <ul class="dropdown-menu">
                                            @foreach ($menuSub->childcategory as $menuChild)
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('childcategory.show', [$menuItem->slug, $menuSub->slug, $menuChild->slug]) }}">{{ $menuChild->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/cjunujrlznff7099easlis9bmyn2qp18c6zsiaobewfn7gld/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
          selector: '#mytextarea'
        });
      </script>
    @stack('js')
</body>

</html>
