<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DeliveBoo') }}</title>

    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fontawesome -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css'
        integrity='sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=='
        crossorigin='anonymous' />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app" class="d-flex flex-column vh-100">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm sticky-top flex-shrink-0"
            style="background: linear-gradient(to right, #00CCBC, #D0EB99)">
            <div class="container-fluid">
                <a class="navbar-brand text-uppercase ms-4 fw-bold" href="/">
                    <span class="d-none d-sm-inline">Torna alla Home Pubblica</span> <i class="fa-solid fa-house ms-2"></i>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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
                            <li class="nav-item dropdown me-4">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{-- Creo una variabile poiché non posso usare Auth:: in src --}}
                                    @php
                                        $restaurant_img = Auth::user()->restaurant_img;
                                    @endphp

                                    @if ($restaurant_img)
                                        <img class="rounded-circle me-2" width="32" height="32"
                                            src="{{ asset('storage/' . $restaurant_img) }}">
                                    @else
                                        <img class="rounded-circle me-2" width="32" height="32"
                                            src="https://www.pngfind.com/pngs/m/610-6104451_image-placeholder-png-user-profile-placeholder-image-png.png"
                                            alt="">
                                    @endif
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text_secondary" href="{{ route('logout') }}"
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

        <div class="main-container flex-grow-1 overflow-hidden">
            @auth
                @include('partials.sidebar')
            @endauth
            <main class="position-relative overflow-auto">
                @yield('content')
                <svg xmlns="http://www.w3.org/2000/svg" class="fixed-bottom" style="z-index: -100"
                    viewBox="0 0 1440 320">
                    <path fill="#00ccbc" fill-opacity="0.5"
                        d="M0,64L40,58.7C80,53,160,43,240,64C320,85,400,139,480,149.3C560,160,640,128,720,101.3C800,75,880,53,960,69.3C1040,85,1120,139,1200,170.7C1280,203,1360,213,1400,218.7L1440,224L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
                    </path>
                </svg>
            </main>
        </div>
    </div>
</body>

</html>
