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

    {{-- <div class="row">
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
        </div> --}}

        <div class="col-xl-12">
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
                                @if( isset($incomeExitVisitors) && sizeof($incomeExitVisitors) > 0 )
                                @foreach( $incomeExitVisitors as $key => $incomeExitVisitor )
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>
                                        <img src="{{ asset($incomeExitVisitor->visitor->photo_path) }}">
                                    </td>
                                    <td>
                                        <div>
                                            <span class="title-sm">
                                                {{$incomeExitVisitor->visitor->name.'
                                                '.$incomeExitVisitor->visitor->last_name}}
                                            </span>
                                            <div class="row">
                                                <div class="col-5">
                                                    <div>
                                                        <i class="bi bi-person-vcard-fill"></i>
                                                        <span>
                                                            {{$incomeExitVisitor->visitor->IdentificationType->initials}}
                                                        </span>
                                                        <span> {{$incomeExitVisitor->visitor->identification}} </span>
                                                    </div>
                                                    <div>
                                                        <i class="bi bi-person-workspace"></i>
                                                        <span> {{$incomeExitVisitor->VisitorType->name}}
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="col-7">
                                                    <div>
                                                        <i class="bi bi-building"></i>
                                                        <span> {{$incomeExitVisitor->company}} </span>
                                                    </div>
<<<<<<< HEAD
                                                    <div>
                                                        <i class="bi bi-person-fill-lock"></i>
                                                        <span class="fw-bold"> Responsable: </span>
                                                        {{ $incomeExitVisitor->collaborator->user->name }}
                                                        {{ $incomeExitVisitor->collaborator->user->last_name }}
                                                    </div>
=======
>>>>>>> fd41278 (fix: Organizando estilos del front)
                                                </div>
                                            </div>
                                            <div>
                                                <i class="bi bi-person-fill-lock"></i>
                                                <span class="fw-bold"> Responsable: </span>
                                                {{ $incomeExitVisitor->visitor->collaborator->user->name }}
                                                {{ $incomeExitVisitor->visitor->collaborator->user->last_name }}
                                            </div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-12">
                                                <div>
                                                    <i class="bi bi-box-seam"></i>
                                                    <span class="fw-bold"> Tipo de equipo:</span>
                                                    {{isset($incomeExitVisitor->Equipment->EquipmentType->name)?
                                                    $incomeExitVisitor->Equipment->EquipmentType->name :'NA'
                                                    }}
                                                </div>
                                                <div>
                                                    <i class="bi bi-badge-tm"></i>
                                                    <span class="fw-bold"> Marca:</span>
                                                    {{isset($incomeExitVisitor->Equipment->mark)?
                                                    $incomeExitVisitor->Equipment->mark :'NA'}}
                                                </div>
                                                <div>
                                                    <i class="bi bi-qr-code"></i>
                                                    <span class="fw-bold"> Serial:</span>
                                                    {{isset($incomeExitVisitor->Equipment->serial)?
                                                    $incomeExitVisitor->Equipment->serial :'NA'}}
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
                                                    {{isset($incomeExitVisitor->Vehicle->mark)?
                                                    $incomeExitVisitor->Vehicle->mark:'NA'}}
                                                </div>
                                                <div>
                                                    <i class="bi bi-badge-3d"></i>
                                                    <span class="fw-bold"> Placa:</span>
                                                    {{isset($incomeExitVisitor->Vehicle->placa)?
                                                    $incomeExitVisitor->Vehicle->placa:'NA'}}
                                                </div>
                                                <div>
                                                    <i class="bi bi-paint-bucket"></i>
                                                    <span class="fw-bold"> Color:</span>
                                                    {{isset($incomeExitVisitor->Vehicle->color)?
                                                    $incomeExitVisitor->Vehicle->color:'NA'}}
                                                </div>
                                                <div>
                                                    <i class="bi bi-car-front-fill"></i>
                                                    <span class="fw-bold"> Tipo Vehiculo:</span>
                                                    {{isset($incomeExitVisitor->Vehicle->VehicleType->name)?
                                                    $incomeExitVisitor->Vehicle->VehicleType->name:'NA'}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>

                                        <div class="row">
                                            <div class="col-12">
                                                <div>
                                                    <i class="bi bi-box-arrow-right visitor-in"></i>
                                                    <span class="fw-bold">
                                                        Entrada:
                                                    </span>
                                                </div>
                                                {{$incomeExitVisitor->date_time_in}}

                                                @if($incomeExitVisitor->date_time_out)
                                                <div>
                                                    <i class="bi bi-box-arrow-left"></i>
                                                    <span class="fw-bold">
                                                        Salida:
                                                    </span>
                                                </div>
                                                {{$incomeExitVisitor->date_time_out}}
                                                @else
                                                <div class="row">
                                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#modalOutvisitor" id="btnOutvisitor"
                                                        data-id="{{$incomeExitVisitor->visitor_id}}"
                                                        data-bs-full-name="{{$incomeExitVisitor->visitor->name.' '.$incomeExitVisitor->visitor->last_name}}">
                                                        <i class="bi bi-box-arrow-left visitor-out"></i>
                                                        {{ __('Registrar salida') }}
                                                    </a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td> <a href="#" id="MostrarObservaciones"
                                            data-mensaje="{{$incomeExitVisitor->observation}}"><i
                                                class="bi bi-exclamation-circle"></i></a> </td>
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


    <!-- Modal -->
    <div class="modal fade" id="modalOutvisitor" tabindex="-1" aria-labelledby="modalTitle" data-type="outcome"
        aria-hidden="true">

        <!-- Modal -->
        <form id="form-out-visitor" class="form-out-visitor" method="POST" action="#">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalTitle">Registrar salida</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="observation" class="form-label">Observaciones de salida: </label>
                            <textarea class="form-control" id="observation" name="observation" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cerrar')
                            }}</button>
                        <button type="submit" class="btn btn-primary"> {{ __('Registrar Salida') }} </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</section>

@endsection


@section('scripts')
<script src="js/modals/outputVisitorModal.js"></script>
@if (session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        icon: 'success',
        title: '¡Éxito!',
        text: ` {{ session('success') }} `,
        showConfirmButton: false,
        timer: 2500
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
            timer: 2500
        });
    });
</script>
@endif
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('MostrarObservaciones').addEventListener('click', function(e) {
            e.preventDefault();
            var  mensaje = this.getAttribute('data-mensaje');
        Swal.fire({
            icon: 'info',
            title: 'Observaciones',
            text: mensaje,
            showConfirmButton: false,
            timer: 2000
        });
    })
    });
</script> --}}

@endsection