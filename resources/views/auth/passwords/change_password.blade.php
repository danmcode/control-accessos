@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cambiar Contraseña') }}</div>

                <div class="card-body">
                    <div class="alert alert-info text-center" role="alert">
                        <div>
                            <strong>Digita tu nueva Contraseña, pero antes ten en cuenta lo siguiente:</strong>
                        </div>
                        <div>
                            <p> - Como Minimo debe contener 8 caracteres.</p>
                        </div>
                        <div>
                            <p> - Debe tener una letra Mayuscula.</p>
                        </div>
                        <div>
                            <p> - Debe tener por lo menos un Numero.</p>
                        </div>
                        <div>
                            <p> - Debe tener al menos cualquiera de estos caracteres [@,#,$,%].</p>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('change-password.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Nueva Contraseña')
                                }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>

                        <div class="row mb-3">
                            <label for="confirm_password" class="col-md-4 col-form-label text-md-end">{{ __('Repetir
                                Contraseña')
                                }}</label>

                            <div class="col-md-6">
                                <input id="confirm_password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="confirm_password"
                                    autocomplete="current-password">

                                @error('confirm_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Cambiar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@if( $errors->any() )
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Error de validación de campos',
            text: `             
            @foreach ($errors->all() as $error)
                - {{ $error}}
            @endforeach `,
            showConfirmButton: true,
            confirmButtonColor: '#0d489a',
            confirmButtonText: 'Aceptar'     
        });
    });
</script>
@endif

@if (session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        icon: 'success',
        title: '¡Éxito!',
        text: ` {{ session('success') }} `,
        showConfirmButton: false,
        timer: 3000
    });
});
</script>
@endif
@endsection