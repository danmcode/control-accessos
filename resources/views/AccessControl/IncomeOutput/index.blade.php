@extends('layouts.app')
@section('title', 'Inicio')
@section('content')
<div class="pagetitle">
    <h1>Ingreso y salida de colaboradores</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Ingreso y salida de colaboradores</li>
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
            </div>
            <hr>

            <div class="table-responsive">
                <table class="table table-hover table-colaborator" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th></th>
                            <th scope="col">Colaborador</th>
                            <th scope="col">Informacion del colaborador</th>
                            <th scope="col">Hora de ingreso</th>
                            <th scope="col">Hora de salida</th>
                            <th scope="col">Observaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if( isset($incomeOutputs) && sizeof($incomeOutputs) > 0 )
                        @foreach( $incomeOutputs as $key => $incomeOutput )
                        <tr>
                            <th scope="row"> {{ $key + 1 }}</th>

                            <th>
                                <img src="{{ $incomeOutput->collaborator->user->photo_path }}" alt="" srcset="">
                            </th>

                            <td>
                                <div class="title-sm">
                                    {{ $incomeOutput->collaborator->user->name }}
                                    {{ $incomeOutput->collaborator->user->last_name }}
                                </div>
                                {{ $incomeOutput->collaborator->jobTitle->name }}
                            </td>
                            <td>
                                <div>
                                    {{ $incomeOutput->collaborator->location->name }} -
                                    {{ $incomeOutput->collaborator->company->name }}
                                </div>
                                {{ $incomeOutput->collaborator->area->name }}

                            </td>
                            <td>
                                {{ $incomeOutput->date_time_in }}
                            </td>
                            <td>
                                @if($incomeOutput->date_time_out)
                                {{$incomeOutput->date_time_out}}
                                @else
                                <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalOutCollaborator" id="btnOutCollaborator"
                                    data-id="{{ $incomeOutput->collaborator->id }}"
                                    data-full-name="{{ $incomeOutput->collaborator->user->name }} {{ $incomeOutput->collaborator->user->last_name }}">
                                    {{ __('Registrar Salida') }}
                                    <i class="bi bi-box-arrow-right"></i>
                                </a>
                                @endif
                            </td>
                            <td>
                                <i class="bi bi-exclamation-circle"></i>
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

<!-- Modal -->
<div class="modal fade" id="modalOutCollaborator" tabindex="-1" aria-labelledby="modalTitle" data-type="outcome"
    aria-hidden="true">

    <form id="form-out-collaborator" class="form-out-collaborator" method="POST" action="#">
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cerrar') }}</button>
                    <button type="submit" class="btn btn-primary"> {{ __('Registrar Salida') }} </button>
                </div>
            </div>
        </div>
    </form>
</div>
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
<script src="{{ asset('js/modals/outputCollaboratorModal.js') }}"></script>
@endsection