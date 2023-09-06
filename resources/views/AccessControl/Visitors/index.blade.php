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
                                    <th scope="col">Elemetos de ingreso</th>
                                    <th scope="col">Vehiculo</th>
                                    <th scope="col">Acciones</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( isset($visitors) && sizeof($visitors) > 0 )
                                @foreach( $visitors as $key => $visitor )
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>
                                        <img src="{{ asset($visitor->photo_path) }}">
                                    </td>
                                    <td>
                                        <div>
                                            <span class="card-title">
                                                {{$visitor->name.' '.$visitor->last_name}}
                                            </span>
                                            <div class="row">
                                                <div class="col-5">
                                                    <div>
                                                        <i class="bi bi-person-vcard-fill"></i>
                                                        <span> {{$visitor->identification}} </span>
                                                    </div>
                                                    <div>
                                                        <i class="bi bi-person-workspace"></i>
                                                        <span> {{$visitor->VisitorType->name}} </span>
                                                    </div>
                                                </div>

                                                <div class="col-7">
                                                    <div>
                                                        <i class="bi bi-building"></i>
                                                        <span> {{$visitor->company}} </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div>
                                                    <i class="bi bi-person-fill-lock"></i>
                                                    <span class="fw-bold"> Responsable: </span> {{__('Jaider
                                                    Vasquez')}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-12">
                                                <div>
                                                    <i class="bi bi-box-seam"></i>
                                                    <span class="fw-bold"> Tipo de equipo:</span>
                                                    {{isset($visitor->Equipment->EquipmentType->name)?
                                                        $visitor->Equipment->EquipmentType->name :'NA'
                                                    }}
                                                </div>
                                                <div>
                                                    <i class="bi bi-badge-tm"></i>
                                                    <span class="fw-bold"> Marca:</span>
                                                    {{isset($visitor->Equipment->mark)?
                                                    $visitor->Equipment->mark :'NA'}}
                                                </div>
                                                <div>
                                                    <i class="bi bi-qr-code"></i>
                                                    <span class="fw-bold"> Serial:</span>
                                                    {{isset($visitor->Equipment->serial)?
                                                    $visitor->Equipment->serial : 'NA'}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="row">
                                            <div class="col-12">
                                                <div>
                                                    <i class="bi bi-c-circle-fill"></i>
                                                    <span class="fw-bold"> Marca:</span>
                                                    {{isset($visitor->Vehicle->mark)?
                                                    $visitor->Vehicle->mark:'NA'}}
                                                </div>
                                                <div>
                                                    <i class="bi bi-badge-3d"></i>
                                                    <span class="fw-bold"> Placa:</span>
                                                    {{isset($visitor->Vehicle->placa)?
                                                    $visitor->Vehicle->placa:'NA'}}
                                                </div>
                                                <div>
                                                    <i class="bi bi-paint-bucket"></i>
                                                    <span class="fw-bold"> Color:</span>
                                                    {{isset($visitor->Vehicle->color)?
                                                    $visitor->Vehicle->color:'NA'}}
                                                </div>
                                                <div>
                                                    <i class="bi bi-car-front-fill"></i>
                                                    <span class="fw-bold"> Tipo Vehiculo:</span>
                                                    {{isset($visitor->Vehicle->VehicleType->name)?
                                                    $visitor->Vehicle->VehicleType->name:'NA'}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
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
                                @endforeach
                                @endif
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
@if (session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        icon: 'success',
        title: '¡Éxito!',
        text: ` {{ session('success') }} `,
        showConfirmButton: false,
        timer: 1500
    });
});
</script>
@elseif(session('error'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: ` {{ session('error') }} `,
            showConfirmButton: false,
            timer: 1500
        });
    });
</script>
@endif
<script src="js/collaborators/deleteCollaborator.js"></script>
@endsection