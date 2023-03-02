<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LaravelTestApp</title>

        <!-- Fonts -->

        <!-- @('resources/js/app.js') -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


        <!-- Styles -->
    </head>
    <body>
     @if (Route::has('login'))
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <div class="navbar-nav">
                        @auth
                                <a href="{{ url('/home') }}" class="nav-item nav-link active">Home</a>
                            @else
                                <a href="{{ route('login') }}" class="nav-item nav-link">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
                                @endif
                        @endauth
                </div>
            </nav>
            @endif

            @if (Auth::check())
            <div class="jumbotron m-5">
                <h1> Welcome back {{ Auth::user()->name}}</h1>
                   <hr>
             <a
            href="{{ route('home') }}"
          >
            <p> Dashboard </p>
          </a>
            </div>
            @else
             <div class="jumbotron m-5">
                <h1> Register or Login</h1>
                 <hr>
            <a
            href="{{ route('login') }}"
          >
           <p> Login </p>
          </a>
             <a
            href="{{ route('register') }}"
          >
           <p> Register </p>
          </a>
            </div>

            @endif
    </body>
</html>
