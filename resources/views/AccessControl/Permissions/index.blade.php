@extends('layouts.app')
@section('title', 'Permisos')
@section('content')
<div class="pagetitle">
    <h1>Permisos</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                @can('accessJCDJAC',Auth::user())
                <a href="{{ route('permission')  }}">Permisos</a>
                @endcan
                @can('accessAGSJC',Auth::user())
                <a href="{{ route('home')  }}">Permisos</a>
                @endcan
            </li>
            <li class="breadcrumb-item active">Permisos</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section profile">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center"> {{ __('Informacion de Permisos') }} </h5>
                <hr>

                <div class="table-responsive">
                    <table class="table table-hover table-colaborator" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Fecha del permiso</th>
                                <th scope="col">Personal</th>
                                <th scope="col">Tiempo Solicitado</th>
                                <th scope="col">Motivo del Permiso</th>
                                <th scope="col">Estado</th>
                                @if(session('accion_realizada'))
                                @can('accessAGSJCDJA',Auth::user())
                                <th scope="col">Acciones</th>
                                @endcan
                                @endif
                                <th scope="col">Observaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if( isset($permissions) && sizeof($permissions) > 0 )
                            @foreach( $permissions as $key => $permission )
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td><i class="bi bi-calendar2-check"></i>
                                    <span class="title-sm">{{$permission->date_permission}}</span>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-12">
                                            <div>
                                                <i class="bi bi-person-badge"></i>
                                                <span class="fw-bold">Encargado:</span>
                                                {{$permission->UserJ->name.' '.$permission->UserJ->last_name}}
                                            </div>
                                            <div>
                                                <i class="bi bi-person-bounding-box"></i>
                                                <span class="fw-bold">Colaborador:</span>
                                                {{$permission->UserC->name.' '.$permission->UserC->last_name}}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-12">
                                            <div>
                                                <i class="bi bi-hourglass-top"></i>
                                                <span class="fw-bold">Hora Inicio:</span>
                                                {{$permission->start_hour}}
                                            </div>
                                            <div>
                                                <i class="bi bi-hourglass-bottom"></i>
                                                <span class="fw-bold">Hora Final:</span>
                                                {{$permission->final_hour}}
                                            </div>
                                            <div>
                                                <i class="bi bi-alarm"></i>
                                                <span class="fw-bold">Duracion:</span>
                                                <span>{{$permission->diff_hours.' min'}}</span>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                                <td>
                                    <span>{{$permission->reason_permission}}</span>
                                </td>

                                <td>
                                    @if($permission->status_auth===0)
                                    <span class="badge bg-danger"><i class="bi bi-x-octagon"></i> Rechazado</span>
                                    @elseif ($permission->status_auth===1)
                                    <span class="badge bg-success"><i class="bi bi-check2-all"></i> Aceptado</span>
                                    @else
                                    <span class=" badge bg-warning text-dark rounded-pill"><i
                                            class="bi bi-pause-circle"></i>Pendiente</span>
                                    @endif
                                </td>
                                @if(session('accion_realizada'))
                                @can('accessAGSJCDJA',Auth::user())
                                <td>
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <form action="{{route('permission.update')}}" method="POST">
                                                @csrf

                                                <input type="hidden" name="id_permission" id="id_permission"
                                                    class="form-control" value="{{$permission->id}}"></input>
                                                <div>
                                                    <button type="submit" name="action" value="Aceptar"
                                                        class="btn btn-success btn-sm">Aceptar</button>
                                                </div>
                                                <hr>
                                                <div>
                                                    <button type="submit" name="action" value="Rechazar"
                                                        class="btn btn-danger btn-sm">Rechazar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                @endcan
                                @endif
                                <td>
                                    <div class="text-center"><a href="#" id="MostrarObservaciones" data-mensaje="#"><i
                                                class="bi bi-exclamation-circle"></i></a> </div>
                                </td>
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