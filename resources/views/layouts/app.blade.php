<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    @stack('css')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <style>
        body { 
            padding-top: 70px; 
            padding-bottom: 70px;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if(Auth::check())
                            <li class="{!! substr(Route::currentRouteName(), 0, 8) == 'kriteria' ? 'active' : '' !!}"><a href="{{ route('kriteria.index') }}">Kriteria</a></li>
                            <li class="{!! substr(Route::currentRouteName(), 0, 5) == 'range' ? 'active' : '' !!}"><a href="{{ route('range.index') }}">Range</a></li>
                            <li class="{!! substr(Route::currentRouteName(), 0, 6) == 'produk' ? 'active' : '' !!}"><a href="{{ route('produk.index') }}">Produk</a></li>
                            <li class="{!! substr(Route::currentRouteName(), 0, 7) == 'analisa' ? 'active' : '' !!}"><a href="{{ route('analisa') }}">Analisa</a></li>
                        @endif
                        <li class="{!! substr(Route::currentRouteName(), 0, 7) == 'tentang' ? 'active' : '' !!}"><a href="{{ route('tentang') }}">Tentang</a></li>
                        <li class="{!! substr(Route::currentRouteName(), 0, 7) == 'bantuan' ? 'active' : '' !!}"><a href="{{ route('bantuan') }}">Bantuan</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="{!! substr(Route::currentRouteName(), 0, 5) == 'login' ? 'active' : '' !!}"><a href="{{ url('/login') }}">Masuk</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('profil.show') }}">Profil</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Keluar
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            @if(session()->has('notifikasi'))
                <div class="row">
                    <div class="alert alert-success text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {!! session('notifikasi') !!}
                    </div>    
                </div>
            @endif

            <div class="row">
                @yield('content')                
            </div>
        </div>

        <nav class="navbar navbar-default navbar-fixed-bottom">
            <div class="container">
                    <p class="navbar-text">
                        Copyright © 2017 - Prudential Web App - {{ title_case('SISTEM REKOMENDASI PEMILIHAN PRODUK ASURANSI  BAGI CALON NASABAH MENGGUNAKAN METODE SIMPLE ADDITIVE WEIGHTING') }}
                    </p>
            </div>
        </nav>
    </div>

    <!-- Scripts -->
    <script src="/js/jquery-3.1.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    @stack('js')
</body>
</html>
