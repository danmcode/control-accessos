<!-- Company Form -->
<h5 class="card-title mb-3"> {{__('Crear tipo de visitante')}} </h5>
<form class="row needs-validation" action="{{ route('tipo-visitantes.store') }}" method="POST" novalidate>
    @csrf

    <div class="col-auto">
        <label for="name" class="form-label fw-bold"> Tipo de visitante: <small class="required">*</small></label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Tipo de visitante" required>
        <span class="invalid-feedback" role="alert">
            <strong>{{ __('El Tipo de visitante es requerido') }}</strong>
        </span>
    </div>

    <div class="col-auto d-flex align-items-end">
        <button type="submit" class="btn btn-primary">Crear Tipo de visitante </button>
    </div>
</form>

<hr>

<div class="table-responsive p-2">
    <table class="table table-hover" id="dataTableLocations">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tipo de visitante</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if( isset($visitorTypes) && sizeof($visitorTypes) > 0 )
            @foreach( $visitorTypes as $key => $visitorType )
            <tr>
                <th scope="row"> {{ $key + 1 }} </th>
                <td> {{ $visitorType->name }}</td>
                <td>
                    <div class="row">
                        <div class="col-4">
                            <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalUpdateVisitor" data-bs-visitor-type-id="{{ $visitorType->id }}"
                                data-bs-visitor-type-name="{{ $visitorType->name }}">
                                <i class="bi bi-pencil-fill"></i>
                                {{ __('Editar') }}
                            </a>
                        </div>
                        <div class="col-4">
                            <form action="{{ route('tipo-visitantes.destroy', $visitorType->id) }}" method="post">
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

<!-- Modal update type Visitor -->
<div class="modal fade" id="modalUpdateVisitor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    @include('AccessControl.Configuration.components.modals.edit-type-visitor-modal')
</div>