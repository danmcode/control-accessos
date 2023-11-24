@extends('layouts.app')
@section('title', 'Generar Permiso')
@section('content')
<div class="pagetitle">
    <h1>Formulario de Permisos</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"> Inicio</a></li>
            <li class="breadcrumb-item"><a href="#"> Permisos </a></li>
            <li class="breadcrumb-item active">Crear Permisos</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section profile">
    <form action="{{route('permission.store')}}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> {{ __('Permiso de Salida Colaboradores')}} </h5>
                        <hr>
                        <div class="form-heading mt-2 mb-2">Información del Permiso</div>

                        <div class="row">
                            <!-- date_permission -->
                            <div class="col-6 mb-3">
                                <label for="date_permission fw-bold" class="form-label">
                                    {{ __('Fecha de Permiso:') }} <small> * </small>
                                </label>
                                <input type="date" name="date_permission" id="date_permission" class="form-control"
                                    required>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('La fecha del permiso es requerida') }}</strong>
                                </span>
                            </div>

                            <hr>
                            <div class="form-heading mt-2 mb-2">Para Ausentarse del Trabajo</div>

                            <!-- allowed_by -->
                            <div class="col-4 mb-3">
                                <label for="allowed_by fw-bold" class="form-label">
                                    {{ __('Autorizador Responsable:') }} <small> * </small>
                                </label>
                                <select name="allowed_by" id="allowed_by" class="form-select" required>
                                    <option value="" selected> {{ __('Seleccione...') }} </option>
                                    @foreach( $DJAS as $key => $DJA )
                                    <option value="{{ $DJA->id }}"> {{ $DJA->name.' '.$DJA->last_name
                                        }}
                                    </option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('Debe seleccionar una opcion') }}</strong>
                                </span>
                            </div>

                            <!-- start_hour -->
                            <div class="col-4 mb-3">
                                <label for="start_hour fw-bold" class="form-label">
                                    {{ __('Hora Inicio:') }} <small> * </small>
                                </label>
                                <input type="time" name="start_hour" id="start_hour" class="form-control" required>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('La Hora Inicio es requerida') }}</strong>
                                </span>
                            </div>


                            <!-- final_hour -->
                            <div class="col-4 mb-3">
                                <label for="final_hour fw-bold" class="form-label">
                                    {{ __('Hora Final:') }} <small> * </small>
                                </label>
                                <input type="time" name="final_hour" id="final_hour" class="form-control" required>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('La hora Final es requerida') }}</strong>
                                </span>
                            </div>

                            <!-- reason_permission -->
                            <div class="col-6 mb-3">
                                <label for="reason_permission fw-bold" class="form-label">
                                    {{ __('Motivo del Permiso:') }} <small> * </small>
                                </label>
                                <textarea name="reason_permission" id="reason_permission"
                                    class="form-control"></textarea>
                            </div>

                            <!-- observation -->
                            <div class="col-6 mb-3">
                                <label for="observation fw-bold" class="form-label">
                                    {{ __('Observación:') }} <small> * </small>
                                </label>
                                <textarea name="observation" id="observation" class="form-control"></textarea>
                            </div>

                        </div>

                        <hr>
                        <div>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Crear permiso') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</section>

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