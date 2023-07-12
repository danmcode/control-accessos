@extends('layouts.app')
@section('title', 'Visitantes')
@section('content')
<div class="pagetitle">
    <h1>Visitantes</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Visitantes</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section profile">

    <div class="row">
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body profile-card pt-4">
                    <h5 class="card-title">
                        <i class="bi bi-people"></i>
                        {{ __('Buscar visitantes') }}
                    </h5>

                    <form action="#">
                        <div class="row">
                            <div class="form-heading mt-2 mb-2">Por fecha de ingreso</div>

                            <div class="col-6 mb-3">
                                <label for="start_date"> {{ __('Desde:') }} </label>
                                <input type="date" name="start_date" id="start_date" class="form-control">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="end_date"> {{ __('Hasta:') }} </label>
                                <input type="date" name="end_date" id="end_date" class="form-control">
                            </div>

                            <div class="col-6 mb-3">
                                <label for="start_hour"> {{ __('Hora inicio:') }} </label>
                                <input type="time" name="start_hour" id="start_hour" class="form-control">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="end_hour"> {{ __('Hora fin:') }} </label>
                                <input type="time" name="end_hour" id="end_hour" class="form-control">
                            </div>
                        </div>

                        <div class="form-heading mt-2 mb-2">¿A quien visitó?</div>
                        <div class="col-12 mb-3">
                            <label for="collaborator_visited"> {{ __('Nombre:') }} </label>
                            <input type="text" name="collaborator_visited" id="collaborator_visited"
                                class="form-control">
                        </div>

                        <hr>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i>
                            {{ __('Buscar') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> {{ __('Visitantes') }} </h5>
                    <hr>

                    <div class="table-responsive">
                        <table class="table table-hover table-colaborator" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"></th>
                                    <th scope="col">
                                        {{ __('Visitante') }}
                                    </th>
                                    <th scope="col">Elemtos de ingreso</th>
                                    <th scope="col">Vehiculo</th>
                                    <th scope="col">Acciones</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"> 1 </th>
                                    <td>
                                        <img src="{{ asset('images/messages-3.jpg') }}">
                                    </td>
                                    <td>
                                        <div>
                                            <span class="card-title">
                                                {{__('DAVID EDUARDO NELSON MULDON ')}}
                                            </span>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div>
                                                        <i class="bi bi-person-vcard-fill"></i>
                                                        <span> {{__('1141237956')}} </span>
                                                    </div>
                                                    <div>
                                                        <i class="bi bi-building"></i>
                                                        <span> {{__('Abka Colombia SAS')}} </span>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div>
                                                        <i class="bi bi-person-workspace"></i>
                                                        <span> {{__('Contratista')}} </span>
                                                    </div>
                                                    <div>
                                                        <i class="bi bi-geo-alt"></i>
                                                        <span> {{__('Edificio viejo')}} </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="bi bi-person-fill-lock"></i>
                                                <span class="fw-bold"> Responsable: </span> {{__('Jaider Vasquez')}}
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div>
                                            <i class="bi bi-box-arrow-right visitor-in"></i> <span> 17/05/23 10:45 a.m.
                                            </span>
                                        </div>
                                        <a href="" class="btn btn-danger">
                                            <i class="bi bi-box-arrow-left visitor-out"></i>
                                            {{ __('Registrar salida') }}
                                        </a>
                                    </td>
                                    <td> <a href=""><i class="bi bi-exclamation-circle"></i></a> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')

@endsection