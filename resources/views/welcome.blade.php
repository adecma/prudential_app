<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #E95420;
                color: #fff;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                        <a href="{{ route('konsultasi.registrasi') }}">Konsultasi</a>
                        <a href="{{ route('tentang') }}">Tentang</a>
                        <a href="{{ route('bantuan') }}">Bantuan</a>
                        <a href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                Keluar
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @else
                        <a href="{{ route('konsultasi.registrasi') }}">Konsultasi</a>
                        <a href="{{ route('tentang') }}">Tentang</a>
                        <a href="{{ route('bantuan') }}">Bantuan</a>
                        <a href="{{ url('/login') }}">Masuk</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <img src="/img/prudential.png" alt="Prudential Web App" style="width:200px; height:200px; left:5px; border-radius:10%;">
                <div class="title m-b-md">
                    {{ config('app.name', 'Laravel') }}
                </div>
            </div>
        </div>
    </body>
</html>
