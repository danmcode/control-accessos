@extends('layouts.app')
@section('title', 'Colaboradores')
@section('content')
<div class="pagetitle">
    <h1>Colaboradores</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Colaboradores</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section profile">

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h5 class="card-title"> {{__('Colaboradores')}} </h5>
                </div>
                <div>
                    <a href="{{ route('colaboradores.create') }}" class="btn btn-primary">
                        <i class="bi bi-person-add"></i> {{__('Crear colaborador')}}
                    </a>

                    <!-- <a href="" class="btn btn-success">
                        <i class="bi bi-file-earmark-excel"></i> {{__('Exportar a excel')}}
                    </a> -->
                </div>
            </div>
            <hr>

            <div class="table-responsive">
                <table class="table table-hover table-colaborator" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"></th>
                            <th scope="col">Colaborador</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Área</th>
                            <th scope="col">Cargo</th>
                            <th scope="col">Ubicación</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if( isset($users) && sizeof($users) > 0 )
                        @foreach( $users as $key => $user )
                        <tr>
                            <th scope="row"> {{ $key + 1 }}</th>
                            <td>
                                <img src="{{ asset($user->photo_path) }}">
                            </td>
                            <td>
                                <div class="title-sm">
                                    {{ strtoupper($user->name) }} {{ strtoupper($user->last_name) }}
                                </div>
                                {{ $user->identificationTypes->initials }} {{ $user->identification }}
                            </td>
                            <td>
                                {{ $user->collaborators->company->name  }}
                            </td>
                            <td>
                                {{ $user->collaborators->area->name }}
                            </td>
                            <td>
                                {{ $user->collaborators->jobTitle->name }}
                            </td>
                            <td>
                                {{$user->collaborators->location->name}}
                            </td>
                            <td>
                                <!-- <a href="" class="btn btn-primary">
                                    <i class="bi bi-eye"></i>
                                </a> -->

                                <a href="{{ route('colaboradores.edit', $user->id) }}" class="btn btn-secondary">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <a href="" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteCollaborator"
                                    data-full-name="{{ strtoupper($user->name) }} {{ strtoupper($user->last_name) }}"
                                    data-id="{{$user->id}}">

                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Modal delete collaborator -->
<div class="modal fade" id="modalDeleteCollaborator" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    @include('AccessControl.Collaborators.components.delete-collaborator-modal')
</div>
<!--  -->
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
@endif
<script src="js/collaborators/deleteCollaborator.js"></script>
@endsection