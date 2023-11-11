<!-- Company Form -->
<h5 class="card-title"> {{__('Crear Ubicaciones')}} </h5>
<form class="row needs-validation" action="{{ route('ubicaciones.store') }}" method="POST" novalidate>
    @csrf
    <div class="col-auto">
        <label for="name" class="form-label fw-bold"> Nombre de la ubicación: <small class="required">*</small></label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Ubicación" required>
        <span class="invalid-feedback" role="alert">
            <strong>{{ __('El nombre de la ubicación es requerido') }}</strong>
        </span>
    </div>

    <div class="col-auto">
        <label for="company_id_locations" class="form-label fw-bold"> Empresa:
            <small class="required">*</small>
        </label>
        <select name="company_id" id="company_id_locations" class="form-select" required>
            <option value="" selected>Seleccione...</option>
            @if( isset($companies) && sizeof($companies) > 0 )
            @foreach( $companies as $key => $company )
            <option value="{{ __($company->id) }}">{{ $company->name }}</option>
            @endforeach
            @endif
        </select>
        <span class="invalid-feedback" role="alert">
            <strong>{{ __('La empresa es requerido') }}</strong>
        </span>
    </div>

    <div class="col-auto d-flex align-items-end">
        <button type="submit" class="btn btn-primary">Crear ubicación</button>
    </div>
</form>

<hr>

<div class="table-responsive p-2">
    <table class="table table-hover" id="dataTableLocations">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Ubicación</th>
                <th scope="col">Empresa</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if( isset($locations) && sizeof($locations) > 0 )
            @foreach( $locations as $key => $location )

            <tr>
                <th scope="row"> {{ $key + 1 }} </th>
                <td> {{ $location->name }}</td>
                <td> {{ $location->company->name }} </td>
                <td>
                    <div class="row">
                        <div class="col-4">
                            <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalUpdateLocation" data-bs-location-id="{{ $location->id }}"
                                data-bs-location-name="{{ $location->name }}"
                                data-bs-company-id="{{ $location->company_id }}"
                                data-bs-company-name="{{ $location->company->name}}">
                                <i class="bi bi-pencil-fill"></i>
                                {{ __('Editar') }}
                            </a>
                        </div>
                        <div class="col-4">
                            <form action="{{ route('ubicaciones.destroy', $location->id) }}" method="post">
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

<!-- Modal update Job Title -->
<div class="modal fade" id="modalUpdateLocation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    @include('AccessControl.Configuration.components.modals.edit-locations-modal')
</div>
