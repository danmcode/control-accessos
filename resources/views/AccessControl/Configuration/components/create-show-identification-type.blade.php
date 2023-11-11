<!-- Company Form -->
<h5 class="card-title mb-3"> {{__('Crear tipos de identificación')}} </h5>
<form class="row needs-validation" action="{{ route('tipo-indentificaciones.store') }}" method="POST" novalidate>
    @csrf

    <div class="col-auto">
        <label for="initials" class="form-label fw-bold"> Sigla: <small class="required">*</small></label>
        <input type="text" class="form-control" id="initials" name="initials" placeholder="Sigla" required>
        <span class="invalid-feedback" role="alert">
            <strong>{{ __('La sigla de la identificación es requerida') }}</strong>
        </span>
    </div>

    <div class="col-auto">
        <label for="type_identification_name" class="form-label fw-bold"> Tipo de identificación: <small class="required">*</small></label>
        <input type="text" class="form-control" id="type_identification_name" name="name" placeholder="Tipo de identificación" required>
        <span class="invalid-feedback" role="alert">
            <strong>{{ __('El Tipo de identificación es requerido') }}</strong>
        </span>
    </div>


    <div class="col-auto d-flex align-items-end">
        <button type="submit" class="btn btn-primary">Crear Tipo de identificación</button>
    </div>
</form>

<hr>

<div class="table-responsive p-2">
    <table class="table table-hover" id="dataTableLocations">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Sigla</th>
                <th scope="col">Tipo de indentificación</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if( isset($identificationTypes) && sizeof($identificationTypes) > 0 )
            @foreach( $identificationTypes as $key => $identificationType )

            <tr>
                <th scope="row"> {{ $key + 1 }} </th>
                <td> {{ $identificationType->initials }} </td>
                <td> {{ $identificationType->name }}</td>
                <td>
                    <div class="row">
                        <div class="col-4">
                            <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalUpdateIdentificationType"
                                data-bs-identification-type-id="{{ $identificationType->id }}"
                                data-bs-identification-type-initials="{{ $identificationType->initials }}"
                                data-bs-identification-type-name="{{ $identificationType->name }}"
                                >
                                <i class="bi bi-pencil-fill"></i>
                                {{ __('Editar') }}
                            </a>
                        </div>
                        <div class="col-4">
                            <form action="{{ route('tipo-indentificaciones.destroy', $identificationType->id) }}" method="post">
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
<div class="modal fade" id="modalUpdateIdentificationType" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    @include('AccessControl.Configuration.components.modals.edit-identification-type-modal')
</div>
