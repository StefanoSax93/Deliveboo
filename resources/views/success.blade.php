<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DeliveBoo-payment-success</title>

    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div class="vh-100 d-flex flex-column bg-light">
        {{-- navbar --}}
        <div class="my-nav flex-shrink-0">
            <nav class="navbar navbar-expand-md">
                <div class="container">
                    <a class="navbar-logo text-decoration-none" href="/">
                        <!-- deliveboo logo -->
                        <img class="logo" src="img/unnamed.png" alt="deliveboo logo">
                        <span class="fw-bold text-white">deliveBoo</span>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse mb-2" id="navbarSupportedContent">
                        <div class="navbar-nav ms-auto">
                            @if (Route::has('login'))
                                <div class="d-flex justify-content-end mt-3">
                                    @auth
                                        <a href="{{ url('/admin') }}" class="btn btn-light text-decoration-none">Admin</a>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-light text-decoration-none">Accedi al
                                            tuo ristorante</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}"
                                                class="btn btn-light ms-3 text-decoration-none">Registra un nuovo
                                                ristorante</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        
        {{-- paysuccess --}}
        <div class="success flex-grow-1 container ">
            <div class="my-card">
                <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                    <i class="checkmark">✓</i>
                </div>
                <h1>Success</h1>
                <h6></h6>

                <p>Complimenti! Il tuo ordine è stato eseguito con successo
                </p>

                <p class="my-3"> Riceverai un' e-mail con i dettagli relativi allo stato del tuo ordine.</p>
                <a class="btn btn-success text-white" href="/">Torna alla home</a>
            </div>
        </div>
    </div>

</body>

</html>
