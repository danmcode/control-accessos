<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Iniciar Sesión</title>
</head>

<body>
    <div class="row">
        <!-- Image -->
        <div class="col-6 image-login">
            <div class="app-title">

            </div>
        </div>

        <!-- Login form -->
        <div class="col-6 login-form">
            <form method="POST" action="{{ route('login') }}" novalidate>

                <img src="{{ asset('images/prochem.png') }}" alt="" srcset="">
                @csrf

                @if(count($errors) > 0)

                @foreach( $errors->all() as $message )
                <div class="alert alert-danger alert-dismissible fade show">
                    <span>{{ $message }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endforeach
                @endif

                <div class="mb-3">
                    <label for="username" class="form-label fw-bold">{{ __('Nombre de usuario:') }}</label>

                    <div class="">
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                            name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __('El nombre de usuario es requerido') }}</strong>
                        </span>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">{{ __('Contraseña:') }}</label>

                    <div class="">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">

                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __('La conraseña es requerida') }}</strong>
                        </span>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Iniciar sesión') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>