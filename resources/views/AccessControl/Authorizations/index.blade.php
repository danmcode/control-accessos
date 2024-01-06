@extends('layouts.app')
@section('title', 'Autorizaciones')
@section('content')
<div class="pagetitle">
    <h1>Equipos de prestamo</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Equipos de prestamo</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body pt-3">
        <h5 class="card-title mb-3"> {{__('Equipos de prestamo')}} </h5>
        <form class="row needs-validation" action="{{route('prestamos-computadoras.store')}}" method="POST" novalidate>
            @csrf
            <div class="col-auto">
                <label for="computer_name" class="form-label fw-bold"> Nombre del computador: <small class="required">*</small></label>
                <input type="text" class="form-control" id="computer_name" name="computer_name" placeholder="Nombre del computador" required>
                <span class="invalid-feedback" role="alert">
                    <strong>{{ __('El Campo nombre del computador es requerido') }}</strong>
                </span>
            </div>

            <div class="col-auto">
                <label for="brand" class="form-label fw-bold"> Marca: <small class="required">*</small></label>
                <input type="text" class="form-control" id="brand" name="brand" placeholder="Marca" required>
                <span class="invalid-feedback" role="alert">
                    <strong>{{ __('El Campo marca es Requerido') }}</strong>
                </span>
            </div>

            <div class="col-auto">
                <label for="serial" class="form-label fw-bold"> Serial: <small class="required">*</small></label>
                <input type="text" class="form-control" id="serial" name="serial" placeholder="Serial" required>
                <span class="invalid-feedback" role="alert">
                    <strong>{{ __('El Campo serial es Requerido') }}</strong>
                </span>
            </div>

            <div class="col-auto d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </form>

        <hr>

        <div class="table-responsive p-2">
            <table class="table table-hover" id="dataTableLocations">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Equipo</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Serial</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if( isset($loanComputers) && sizeof($loanComputers) > 0 )
                    @foreach( $loanComputers as $key => $loanComputer)
                    <tr>
                        <th scope="row"> {{ $key + 1 }} </th>
                        <td> {{ $loanComputer->computer_name }}</td>
                        <td> {{ $loanComputer->brand }}</td>
                        <td> {{ $loanComputer->serial}}</td>
                        <td> 
                            @if( $loanComputer->on_loan)
                            <span class="badge text-bg-warning">{{__('En prestamo')}}</span>
                            @else
                            <span class="badge text-bg-success"> {{__('Disponible')}} </span>
                            @endif
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-auto">
                                    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalUpdateLoanComputer" 
                                        data-bs-loanComputer-id="{{ $loanComputer->id }}"
                                        data-bs-loanComputer-name="{{ $loanComputer->computer_name }}"
                                        data-bs-loanComputer-brand="{{ $loanComputer->brand }}"
                                        data-bs-loanComputer-serial="{{ $loanComputer->serial }}">
                                        <i class="bi bi-pencil-fill"></i>
                                        {{ __('Editar') }}
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalLoanComputer" 
                                        data-bs-loanComputer-id="{{ $loanComputer->id }}"
                                        data-bs-loanComputer-id="{{ $loanComputer->computer_name }}">
                                        <i class="bi bi-check-circle"></i>
                                        {{ __('Prestar') }}

                                    </a>
                                </div>
                                <div class="col-auto">
                                    <form action="{{ route('prestamos-computadoras.destroy', $loanComputer->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm" type="submit"
                                            onclick="return confirm('¿Desea eliminar...?')">
                                            <i class="bi bi-trash-fill"></i>
                                            {{ __('Eliminar') }}

                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif()
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal update Loan Computer -->
<div class="modal fade" id="modalUpdateLoanComputer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    @include('AccessControl.Authorizations.components.modals.update-loan-computer-modal')
</div>

<!-- Modal loan computer -->
<div class="modal fade" id="modalLoanComputer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    @include('AccessControl.Authorizations.components.modals.loan-computer-modal')
</div>

@endsection

@section('scripts')
<script src="js/modals/updateLoanComputersModal.js"></script>
<script src="js/modals/loanComputerModal.js"></script>
@endsection