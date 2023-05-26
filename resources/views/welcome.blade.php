<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OrdenaTrello</title>

    {{-- Copiar esto en todas las vistas blade --}}
    <!-- Scripts -->
    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

</head>

<body class="bg-dark">
    {{-- //////////////////////////  HEADER  ///////////////////////////// --}}
    <header class="bg-light p-4">
        <div class="container img-fluid max-width: 100% text-center">
            <img src="https://tienda.ordenatech.es/img/tienda-online-logo-1673433375.jpg" alt=""
                class="img-fluid mx-auto" style="max-width: 50%;">
        </div>
    </header>
    {{-- /////////////////////////////////////////////////////// --}}
    <div class="container">

        <div class="row align-items-center">
            {{--  --}}
            {{-- PRIMER CUADRADO --}}
            <div class="col" style="display: flex; align-items: center;">
                <div class="card bg-transparent border-0 text-white">
                    <div class="card-body">
                        <div>
                            <h1 class="font-weight-bold" style="font-size: 3rem; color: orange;">OrdenaTrello</h1>
                            <h2 class="text-white">OrdenaTrello te ayuda a organizarte en el trabajo en tu día a día</h2>
                        </div>
                    </div>
                </div>
            </div>
            

            {{--  --}}
            {{-- SEGUNDO CUADRADO --}}
            <div class="col pt-5">
                <div class="card bg-transparent border border-5 border-orange">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <h1 class="text-warning">INICIAR SESIÓN</h1>
                            <div class="mb-3">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
            
                            <div class="mb-3">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" placeholder="Contraseña">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
            
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" style="color: orange;" for="remember">{{ __('Recuérdame') }}</label>
                                </div>
                            </div>
            
                            <div class="mb-0">
                                <button type="submit" class="btn btn-primary">{{ __('Entrar') }}</button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link"
                                        href="{{ route('password.request') }}">{{ __('¿Has olvidado la contraseña?') }}</a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            
            {{--  --}}
        </div>
    </div>
</body>


</html>
