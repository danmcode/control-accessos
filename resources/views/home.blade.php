@extends('layouts.app')
@section('title', 'Inicio')
@section('content')
<div class="pagetitle">
    <h1>Inicio</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
            <li class="breadcrumb-item active">Inicio</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        <!--  -->

        <div class="row">
            <!-- Visitors Card -->
            <div class="col-xxl-3 col-md-6">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Visitantes<span>|
                                Hoy</span></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                @if(isset($count))
                                <h6>{{$count}}
                                    <span class="text-muted small pt-2 ps-1">
                                        @choice('Visitante|Visitantes',$count)
                                    </span>
                                </h6>
                                @else
                                <h6>0
                                    <span class="text-muted small pt-2 ps-1">
                                        Visitantes
                                    </span>
                                </h6>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End visitors Card -->

            <!--  permissions -->
            <div class="col-xxl-3 col-md-6">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Permisos <span>| Hoy</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-person-check"></i>
                            </div>
                            <div class="ps-3">
                                <h6> 5 <span class="text-muted small pt-2 ps-1"> Permisos </span></h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End permissions Card -->

            <!-- Autorizations Card -->
            <div class="col-xxl-3 col-md-6">
                <div class="card info-card revenue-card">

                    <div class="card-body">
                        <h5 class="card-title">Autorizaciones <span>| Hoy</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-building-add"></i>
                            </div>
                            <div class="ps-3">
                                <h6>3 <span class="text-muted small pt-2 ps-1"> de salida de equipos </span></h6>

                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Autorizations Card -->

            <!-- Customers Card -->
            <div class="col-xxl-3 col-md-6">

                <div class="card info-card customers-card">

                    <div class="card-body">
                        <h5 class="card-title">Permisos <span>| por aprobar </span></h5>

                        <div class="info-card-body d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-clock"></i>
                            </div>
                            <div class="ps-3">
                                <h6>5 <span class="text-muted small pt-2 ps-1"> permisos</span></h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- End Customers Card -->
        </div>
        <!--  -->

        <!-- Left side columns -->
        <div class="container col-6 col-lg-6 col-md-12 col-sm-12">
            <div class="row">
                <!-- Main panel -->
                <div class="card">
                    <div class="card-body card-main px-5">
                        <h5 class="card-title"> {{ __('Panel de control') }}
                            <span>| {{ __('Colaboradores') }}</span>
                        </h5>
                        <hr>
                        <div class="activity">

                            <div class="search">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <img src="{{ asset('images/pisa.png') }}" class="company-logo">
                                    </span>

                                    <input class="form-control" list="collaborators" id="search"
                                        placeholder="Buscar colaborador..">

                                    <datalist id="collaborators">
                                        @if( isset($users) && sizeof($users) > 0 )
                                        @foreach( $users as $user )
                                        <option id="collaboratorList" value="{{ $user->name }} {{ $user->last_name }}"
                                            data-id="{{ $user->collaborators->id }}"
                                            data-full-name="{{ $user->name }} {{ $user->last_name }}"
                                            data-identification="{{ $user->identification }}"
                                            data-area="{{ $user->collaborators->area->name }}"
                                            data-job-title="{{ $user->collaborators->jobTitle->name }}"
                                            data-location="{{ $user->collaborators->location->name }}"
                                            data-photo-path="{{ $user->photo_path }}">
                                            @endforeach
                                            @endif
                                    </datalist>

                                    <span class="input-group-text">
                                        <i class="bi bi-search"></i>
                                    </span>
                                </div>
                                <!-- User Information -->
                                <div class="collaborator-info" id="collaborator-info">
                                    <div class="row">
                                        <div class="col-4 mt-4">
                                            <div class="user-image">
                                                <img id="photo" src="{{ asset('images/daniel_muelas.jpg') }}" alt="">
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div id="full-name" class="card-title mt-4">
                                                DANIEL ALEXANDER MUELAS RIVERA
                                            </div>
                                            <div>
                                                <i class="bi bi-person-vcard-fill"></i> <span id="identification">
                                                    1144097956 </span>
                                            </div>
                                            <div>
                                                <i class="bi bi-geo-alt-fill"></i> <span id="location"> Técnologia,
                                                    Edificio Antiguo
                                                </span>
                                            </div>
                                            <div>
                                                <i class="bi bi-person-fill"></i> <span id="job-title"> Coordinador de
                                                    Técnologia
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-4 align-self-center">
                                            <a href="#" class="dashboard-user-door door-in" data-bs-toggle="modal"
                                                data-bs-target="#modalInCollaborator" id="btnInCollaborator">
                                                <div class="content-icon"> <i class="bi bi-box-arrow-right"></i> </div>
                                                <div class="content-text"> {{ __('Ingreso peatonal') }} </div>
                                            </a>

                                            <a href="#" class="dashboard-user-door door-out mt-2" data-bs-toggle="modal"
                                                data-bs-target="#modalOutCollaborator" id="btnOutCollaborator">
                                                <div class="content-icon"> <i class="bi bi-box-arrow-left"></i> </div>
                                                <div class="content-text"> {{ __('Salida peatonal') }} </div>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End user information -->
                                    <hr>
                                    <div class="d-flex justify-content-center">

                                        <a class="dashboard-user-action user-action-primary m-1" data-bs-toggle="modal"
                                            data-bs-target="#modalValidate" href="#" id="btnCreateVisitor">
                                            <div class="content-icon"> <i class="bi bi-person-fill-add"></i> </div>
                                            <div class="content-text"> {{ __('Registrar visitante') }} </div>
                                        </a>


                                        <a href="" class="dashboard-user-action user-action-warning m-1">
                                            <div class="content-icon"> <i class="bi bi-person-video"></i> </div>
                                            <div class="content-text"> {{ __('Ver colaborador') }} </div>
                                        </a>

                                        <a href="" class="dashboard-user-action user-action-success m-1">
                                            <div class="content-icon"> <i class="bi bi-person-fill-check"></i> </div>
                                            <div class="content-text"> {{ __('Ver permisos') }} </div>
                                        </a>

                                    </div>
                                </div>

                                <div class="collaborator-create">
                                    <div class="d-flex justify-content-center">
                                        <div id="full-name" class="card-title mt-4">
                                            El colaborador que buscas aún no esta registrado
                                        </div>
                                    </div>
                                    <!-- End user information -->

                                    <div class="d-flex justify-content-center">
                                        <a href="#" class="dashboard-user-action user-action-primary m-1">
                                            <div class="content-icon"> <i class="bi bi-person-fill-add"></i> </div>
                                            <div class="content-text"> {{ __('Crear Colaborador') }} </div>
                                        </a>

                                    </div>
                                </div>

                                <div class="collaborator-default" id="collaborator-default">
                                    <div class="d-flex justify-content-center">
                                        <div id="full-name" class="card-title mt-4">
                                            Realiza la busqueda de un colaborador <i class="bi bi-search"></i>
                                        </div>
                                    </div>
                                    <!-- End user information -->
                                </div>
                            </div>

                        </div>
                        <hr>
                        <!-- End User search -->
                    </div>
                </div>
                <!-- End main Panel-->
            </div>
        </div>
        <!-- End Left side columns -->
        <!-- Right side columns -->
        <div class="container col-6 col-lg-6 col-md-12 col-sm-12">
            <!-- Visitors today -->
            <div class="card">
                <div class="card-body card-summary">
                    <h5 class="card-title"> {{ __('Visitantes') }} <span>| {{ __('Hoy') }}</span></h5>
                    <hr>
                    <div class="activity">
                        @if (isset($incomeExitVisitors) && sizeof($incomeExitVisitors) > 0)
                        @foreach($incomeExitVisitors as $incomeExitVisitor)
                        <!-- visitors-card -->
                        <div class="visitor-card">
                            <div class="row">
                                <div class="col-2 visitor-card-img">
                                    <img src="{{ asset($incomeExitVisitor->visitor->photo_path) }}">
                                </div>

                                <div class="col-8">
                                    <div class="title-sm">
                                        {{$incomeExitVisitor->visitor->name}} {{$incomeExitVisitor->visitor->last_name}}
                                    </div>

                                    <div class="row card-visitor-body">
                                        <div class="col-7">
                                            <div>
                                                <i class="bi bi-person-vcard-fill"></i> <span>
                                                    {{$incomeExitVisitor->visitor->identification}} </span>
                                            </div>
                                            <div>
                                                <i class="bi bi-box-arrow-right visitor-in"></i> <span>
                                                    {{$incomeExitVisitor->date_time_in}}
                                                </span>
                                            </div>
                                            @if($incomeExitVisitor->date_time_out)
                                            <div>
                                                <i class="bi bi-box-arrow-left"></i> <span>
                                                    {{$incomeExitVisitor->date_time_out}}
                                                </span>
                                            </div>
                                            @endif
                                        </div>

                                        <div class="col-5">
                                            <div>
                                                <i class="bi bi-building"></i>{{$incomeExitVisitor->company}}</span>
                                            </div>

                                            <div>
                                                <i class="bi bi-car-front-fill"></i>
                                                <span>
                                                    {{isset($incomeExitVisitor->Vehicle->VehicleType->name)?
                                                    $incomeExitVisitor->Vehicle->VehicleType->name:'NA'}}
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <i class="bi bi-person-fill-lock"></i>
                                            <span>
                                                {{ $incomeExitVisitor->collaborator->user->name }}
                                                {{ $incomeExitVisitor->collaborator->user->last_name }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @if(!isset($incomeExitVisitor->date_time_out))
                                <div class="col-2 btn-visitor-out">
                                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalOutvisitor" id="btnOutVisitor"
                                        data-id="{{$incomeExitVisitor->visitor_id}}"
                                        data-bs-full-name="{{$incomeExitVisitor->visitor->name.' '.$incomeExitVisitor->visitor->last_name}}">
                                        <i class="bi bi-box-arrow-right"></i>
                                        {{ __('Salida') }}
                                    </a>
                                </div>
                                @endif
                            </div>
                            <hr>
                        </div>
                        @endforeach
                        @else
                        <div class="text-center">
                            <span class="fw-bold">
                                No hay visitantes para el día de hoy
                            </span>
                        </div>
                        @endif

                        <!-- end visitors-card -->
                    </div>
                </div>
            </div>
            <!-- End  Visitors Today-->
        </div>
        <!-- End Right side columns -->
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalInCollaborator" tabindex="-1" aria-labelledby="modalTitle" data-type="income"
        aria-hidden="true">

        <form id="form-in-collaborator" method="POST" action="#">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalTitle">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="observation" class="form-label">Observaciones de ingreso: </label>
                            <textarea class="form-control" id="observation" name="observation" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cerrar')
                            }}</button>
                        <button type="submit" class="btn btn-primary"> {{ __('Registrar Ingreso') }} </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalOutCollaborator" tabindex="-1" aria-labelledby="modalTitle" data-type="outcome"
        aria-hidden="true">

        <form id="form-out-collaborator" method="POST" action="#">
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

    <!-- Modal -->
    <div class="modal fade" id="modalValidate" tabindex="-1" aria-labelledby="modalTitle" data-type="validate"
        aria-hidden="true">

        <!-- Modal -->
        <form id="form-validate-visitor" class="form-validate-visitor" method="POST" action="#">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalTitle">Consulta de registro del visitante</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="validate_identification" class="form-label">Numero del documento de identidad:
                            </label>
                            <input class="form-control" type="number" id="validate_identification"
                                name="validate_identification" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{
                            __('Cerrar')}}</button>
                        <button type="submit" class="btn btn-primary"> {{ __('Consultar') }} </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @endsection

    @section('scripts')
    <script src="{{asset('js/modals/outputVisitorModal.js')}}"></script>
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
    @elseif( session('error') )
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: '¡Error!',
            text: ` {{ session('error') }} `,
            showConfirmButton: true,
            confirmButtonColor: '#0d489a',
            confirmButtonText: 'Aceptar'
        });
    });
    </script>
    @endif


    <script src="{{ asset('js/collaborators/homeCollaborators.js') }}"></script>
    @endsection