<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- URL Base -->
        <meta name="url" content="{{ url('') }}">
        <title>{{ config('app.name', 'dashboard') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/new.css') }}" rel="stylesheet">
        
    </head>

    <body>
        
        <div id="app">
            
            <!-- boton para ocultar la nav -->  
            <button onclick="shownavbar()" id="toggle_two" hidden class="color paddingbtns" >
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
                    
            <nav class="main-menu" id="navbar">
                <!-- boton para mostrar la nav -->
                <button onclick="hiddenavbar()" id="toggle_one" class="color" >               
                    <i class='fa fa-bars' style='color: white'></i>
                </button>

                @guest
                    <ul>
                        <li>
                            <i class="fa fa-home fa-2x"></i>
                            <a class="nav-text" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li>
                                <i class="fa fa-home fa-2x"></i>
                                <a class="nav-text" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                        @else
                        <li>
                        <a href="/dashboard">
                                <i class="fa fa-home fa-2x"></i>
                                <span class="nav-text">
                                    Inicio
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="/guest">
                            <img src="{{ asset('../images/ads.png') }}" alt="Folder" width="60" class="paddingimg">
                                <span class="nav-text">
                                    Campañas
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ asset('/usuarios') }}">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="nav-text">
                                    Nuevos ingresos Boliplay
                                </span>
                            </a>
                        </li>

                        <li class="nav-item dropdown ">
                            <a href="#">
                                <i class="fa fa-wrench fa-2x"></i>

                                <span id="navbarDropdown" class="nav-text dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    Herramientas
                                </span>
                            </a>
                        </li>
                        <li>
                        <a href="#">
                                <i class="fa fa-2x"></i>
                                <span class="nav-text">
                                    Landing
                                </span>
                            </a>
                        </li>
                        <li>
                        <a href="#">
                                <i class="fa  fa-2x"></i>
                                <span class="nav-text">
                                    Referidos
                                </span>
                            </a>
                        </li>
                        <li>
                        <a href="#">
                                <i class="fa  fa-2x"></i>
                                <span class="nav-text">
                                    Mensajes
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                            <img src="{{ asset('../images/reportes.png') }}" alt="Folder" width="55" class="paddingimg">
                                <span class="nav-text">
                                    Reportes
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ asset('/guest') }}">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="nav-text">
                                    Cajeros     BP   
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ asset('/usuarios') }}">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="nav-text">
                                    Jugadores BP                                
                                </span>
                            </a>
                        </li>

                        <!-- <li class="nav-item dropdown">
                            <a href="#">
                                <i class="fa fa-wrench fa-2x"></i>
                                <span id="navbarDropdown" class="nav-text dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    Boliplay
                                </span>
                                <ul class="dropdown-menu text-center">
                                    <li><a href="#">Cajeros</a></li>
                                    <li><a href="#">Jugadores</a></li>
                                </ul>
                            </a>
                        </li> -->

                        
                    </ul>

                    <ul class="logout">
                    
                        <li>
                            <a href="#">
                                <i class="fa fa-power-off fa-2x" aria-hidden="true" ></i>
                                <spam class="nav-text" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </spam>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </li>
                                
                    </ul>
                    
                @endguest        
            </nav>
            
            <main class="py-4 content">
                
                @yield('content')
            </main>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

        @yield('js')
        <script src="{{ asset('js/dashboard.js') }}" defer></script>

    </body>
</html>
