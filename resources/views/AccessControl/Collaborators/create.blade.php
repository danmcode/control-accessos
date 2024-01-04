@extends('layouts.app')
@section('title', 'Crear colaborador')
@section('content')
<div class="pagetitle">
    <h1>Crear Colaborador</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"> Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('colaboradores.index') }}"> Colaboradores </a></li>
            <li class="breadcrumb-item active">Crear Colaborador</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section profile">
    <form action="{{ route('colaboradores.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <!-- show when the image is taken -->
                        <div id="capturedImageContainer"></div>

                        <!-- Show default or when is canceled -->
                        <div id="defaultImage">
                            <img class="image-default" src="{{asset('images/default.png')}}">
                        </div>

                        <!-- Show streaming video to take a photo -->
                        <div class="cameraFeed" id="cameraFeed"></div>

                        <h2>
                            <div class="center-css">
                                <label id="labelName">
                                    Nombre
                                </label>
                            </div>
                            <div class="center-css">
                                <label id="labelLastName">
                                    Colaborador
                                </label>
                            </div>
                        </h2>

                        <h3 class="center-css">
                            <label id="job_title_label"> Cargo </label>
                        </h3>

                        <div class="row">
                            <div class="center-css col-sm-12 mb-1">
                                <a id="openCameraBtn" class="btn btn-primary">
                                    <i class="bi bi-camera"></i>
                                    {{ __('Capturar desde cámara') }}
                                </a>
                            </div>

                            <!-- Upload a photo  -->
                            <div class="center-css col-sm-12 mb-1">
                                <a id="uploadPhotoBtn" class="btn btn-secondary">
                                    <i class="bi bi-upload"></i>
                                    {{ __('Subir fotografía') }}
                                </a>
                            </div>

                            <div class="center-css mb-1">
                                <!-- Take a photo only show when the open Camera was pressed -->
                                <a id="captureBtn" class="btn btn-primary captureBtn">
                                    <i class="bi bi-camera"></i>
                                    {{ __('Tomar fotografia') }}
                                </a>
                            </div>

                            <div class="center-css mb-1">
                                <!-- Cancel a Photo -->
                                <a id="cancelBtn" class="btn btn-danger">
                                    <i class="bi bi-x-circle"></i>
                                    {{ __('Cancelar') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> {{ __('Crear colaboradores') }} </h5>
                        <hr>

                        <div class="form-heading mt-2 mb-2">Información básica</div>

                        <div class="row">
                            <!-- Identification type -->
                            <div class="col-6 mb-3">
                                <label for="identification_type fw-bold" class="form-label">
                                    {{ __('Tipo de identificación:') }} <small> * </small>
                                </label>
                                <select name="identification_type" id="identification_type" class="form-select"
                                    required>
                                    <option value="" selected> {{ __('Seleccione...') }} </option>
                                    @if( isset($identificationTypes) && sizeof($identificationTypes) > 0 )
                                    @foreach( $identificationTypes as $key => $identificationType )
                                    <option value="{{ $identificationType->id }}"> {{ $identificationType->name }}
                                    </option>
                                    @endforeach
                                    @endif
                                </select>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('El tipo de identificación es requerido') }}</strong>
                                </span>
                            </div>

                            <!-- identification -->
                            <div class="col-6 mb-3">
                                <label for="identification fw-bold" class="form-label">
                                    {{ __('Identificación:') }} <small> * </small>
                                </label>
                                <input type="number" name="identification" id="identification" class="form-control"
                                    required>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('La identificación es requerida') }}</strong>
                                </span>
                            </div>


                            <!-- name -->
                            <div class="col-4 mb-3">
                                <label for="name fw-bold" class="form-label">
                                    {{ __('Nombres:') }} <small> * </small>
                                </label>
                                <input type="text" name="name" id="name" class="form-control" required>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('Los nombres son requeridos') }}</strong>
                                </span>
                            </div>

                            <!-- last name -->
                            <div class="col-4 mb-3">
                                <label for="last_name fw-bold" class="form-label">
                                    {{ __('Apellidos:') }} <small> * </small>
                                </label>
                                <input type="text" name="last_name" id="last_name" class="form-control" required>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('Los apellidos son requeridos') }}</strong>
                                </span>
                            </div>

                            <!-- email -->
                            <div class="col-4 mb-3">
                                <label for="email fw-bold" class="form-label">
                                    {{ __('Correo:') }} <small> * </small>
                                </label>
                                <input type="email" name="email" id="email" class="form-control" required>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('El correo es requerido') }}</strong>
                                </span>
                            </div>


                            <!-- photo info -->
                            <div class="col-4 mb-3">
                                <input type="hidden" name="photoDataInput" id="photoDataInput" class="form-control">
                            </div>

                            <hr>
                            <div class="form-heading mt-2 mb-2">Información de colaborador</div>
                            <div class="row g-3 align-items-center mt-0 mb-3">
                                <div class="col-auto mb-2">
                                    <label for="Rol fw-bold" class="form-label">
                                        {{ __('Rol:') }} <small> * </small>
                                    </label>
                                </div>
                                <div class="col-auto mb-2"> <select name="rol_id" id="rol_id" class="form-select"
                                        required>
                                        <option value="" selected> {{ __('Seleccione...') }} </option>
                                        @if( isset($rols) && sizeof($rols) > 0 )
                                        @foreach( $rols as $key => $rol )
                                        <option value="{{ $rol->id }}"> {{ $rol->name }} </option>
                                        @endforeach
                                        @endif
                                    </select></div>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('El rol es requerido') }}</strong>
                                </span>
                            </div>


                            <!-- Company -->
                            <div class="col-6 mb-3">
                                <label for="company_id fw-bold" class="form-label">
                                    {{ __('Empresa:') }} <small> * </small>
                                </label>
                                <select name="company_id" id="company_id" class="form-select" required>
                                    <option value="" selected> {{ __('Seleccione...') }} </option>
                                    @if( isset($companies) && sizeof($companies) > 0 )
                                    @foreach( $companies as $key => $company )
                                    <option value="{{ $company->id }}"> {{ $company->name }} </option>
                                    @endforeach
                                    @endif
                                </select>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('La empresa es requerida') }}</strong>
                                </span>
                            </div>

                            <!-- Area -->
                            <div class="col-6 mb-3">
                                <label for="area_id fw-bold" class="form-label">
                                    {{ __('Área:') }} <small> * </small>
                                </label>
                                <select name="area_id" id="area_id" class="form-select" required>
                                    <option value="" selected> {{ __('Seleccione...') }} </option>
                                    @if( isset($areas) && sizeof($areas) > 0 )
                                    @foreach( $areas as $key => $area )
                                    <option value="{{ $area->id }}"> {{ $area->name }} </option>
                                    @endforeach
                                    @endif
                                </select>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('El área es requerida') }}</strong>
                                </span>
                            </div>

                            <!-- Cargo -->
                            <div class="col-6 mb-3">
                                <label for="job_title_id fw-bold" class="form-label">
                                    {{ __('Cargo:') }} <small> * </small>
                                </label>
                                <select name="job_title_id" id="job_title_id" class="form-select" required>
                                    <option value="" selected> {{ __('Seleccione...') }} </option>
                                    @if( isset($jobTitles) && sizeof($jobTitles) > 0 )
                                    @foreach( $jobTitles as $key => $jobTitle )
                                    <option value="{{ $jobTitle->id }}"> {{ $jobTitle->name }} </option>
                                    @endforeach
                                    @endif
                                </select>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('El cargo es requerido') }}</strong>
                                </span>
                            </div>

                            <!-- Cargo -->
                            <div class="col-6 mb-3">
                                <label for="location_id fw-bold" class="form-label">
                                    {{ __('Ubicación:') }} <small> * </small>
                                </label>
                                <select name="location_id" id="location_id" class="form-select" required>
                                    <option value="" selected> {{ __('Seleccione...') }} </option>
                                    @if( isset($locations) && sizeof($locations) > 0 )
                                    @foreach( $locations as $key => $location )
                                    <option value="{{ $location->id }}"> {{ $location->name }} </option>
                                    @endforeach
                                    @endif
                                </select>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('La ubicación es requerida es requerido') }}</strong>
                                </span>
                            </div>

                        </div>

                        <hr>
                        <div>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Guardar colaborador') }}
                            </button>
                        </div>
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
<script src="{{ asset('js/components/camera.js') }}"></script>
<script src="{{ asset('js/components/inputsControl.js') }}"></script>
@endsection