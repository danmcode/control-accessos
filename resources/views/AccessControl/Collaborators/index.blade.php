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

                    <a href="" class="btn btn-success">
                        <i class="bi bi-file-earmark-excel"></i> {{__('Exportar a excel')}}
                    </a>
                </div>
            </div>
            <hr>
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
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
                            <th scope="row"> 1 </th>
                            <td>
                                <img src="{{ asset($user->photo_path) }}">
                            </td>
                            <td>
                                <div class="card-title">
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
                                <a href="" class="btn btn-primary">
                                    <i class="bi bi-eye"></i>
                                    {{ __('Ver más') }}
                                </a>

                                <a href="{{ route('colaboradores.edit', '1') }}" class="btn btn-secondary">
                                    <i class="bi bi-pencil"></i>
                                    {{ __('Editar') }}
                                </a>

                                <a href="" class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                    {{ __('Eliminar') }}
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

@endsection

@section('scripts')

@endsection