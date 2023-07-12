@extends('layouts.app')
@section('title', 'Editar Colaborador')
@section('content')
<div class="pagetitle">
    <h1>Editar Colaborador</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"> Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('colaboradores.index') }}"> Colaboradores </a></li>
            <li class="breadcrumb-item active">Editar Colaborador</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section profile">
    <form action="#" class="needs-validation" novalidate>
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="{{ asset('images/daniel_muelas.jpg') }}" alt="Profile">
                        <h2> {{ __('Daniel Alexander Muelas Rivera') }} </h2>
                        <h3>{{ __('Coordinador de TI') }}</h3>
                        <div class="mt-2">
                            <a href="" class="btn btn-primary">
                                <i class="bi bi-camera"></i>
                                {{ __('Tomar fotografia') }}
                            </a>

                            <a href="" class="btn btn-secondary">
                                <i class="bi bi-upload"></i>
                                {{ __('Subir fotografía') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> {{ __('Editar colaborador') }} </h5>
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
                                <input type="text" name="identification" id="identification" class="form-control"
                                    value="{{ __('1144097956') }}" required>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('La identificación es requerida') }}</strong>
                                </span>
                            </div>


                            <!-- name -->
                            <div class="col-4 mb-3">
                                <label for="name fw-bold" class="form-label">
                                    {{ __('Nombres:') }} <small> * </small>
                                </label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ __('Daniel Alexander') }}" required>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('Los nombres son requeridos') }}</strong>
                                </span>
                            </div>

                            <!-- last name -->
                            <div class="col-4 mb-3">
                                <label for="last_name fw-bold" class="form-label">
                                    {{ __('Apellidos:') }} <small> * </small>
                                </label>
                                <input type="text" name="last_name" id="last_name" class="form-control"
                                    value="{{ __('Muelas Rivera') }}" required>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('Los apellidos son requeridos') }}</strong>
                                </span>
                            </div>

                            <!-- email -->
                            <div class="col-4 mb-3">
                                <label for="email fw-bold" class="form-label">
                                    {{ __('Correo:') }} <small> * </small>
                                </label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ __('dmuelas@protecnicaing.com') }}" required>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('El correo es requerido') }}</strong>
                                </span>
                            </div>

                            <hr>
                            <div class="form-heading mt-2 mb-2">Información de colaborador</div>

                            <!-- Company -->
                            <div class="col-6 mb-3">
                                <label for="company_id fw-bold" class="form-label">
                                    {{ __('Empresa:') }} <small> * </small>
                                </label>
                                <select name="company_id" id="company_id" class="form-select" required>
                                    <option value="" selected> {{ __('Seleccione...') }} </option>
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
                                </select>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('La ubicación es requerida es requerido') }}</strong>
                                </span>
                            </div>
                        </div>

                        <hr>
                        <div>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Editar colaborador') }}
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

@endsection