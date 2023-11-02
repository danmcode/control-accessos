<!-- Permissions Form -->
<h5 class="card-title mb-3"> {{__('Crear Roles')}} </h5>
<form class="row needs-validation" action="{{route('rols.store')}}" method="POST" novalidate>
    @csrf
    <div class="col-auto">
        <label for="name" class="form-label fw-bold"> Rol: <small class="required">*</small></label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del Rol" required>
        <span class="invalid-feedback" role="alert">
            <strong>{{ __('El Campo Rol es Requerido') }}</strong>
        </span>
    </div>

    <div class="col-auto d-flex align-items-end">
        <button type="submit" class="btn btn-primary">Crear Rol</button>
    </div>
</form>

<hr>

<div class="table-responsive p-2">
    <table class="table table-hover" id="dataTableLocations">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Rol</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if( isset($rols) && sizeof($rols) > 0 )
            @foreach( $rols as $key => $rol )
            <tr>
                <th scope="row"> {{ $key + 1 }} </th>
                <td> {{ $rol->name }}</td>
                <td>
                    <div class="row">
                        <div class="col-4">
                            <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalUpdateRol" data-bs-rol-id="{{ $rol->id }}"
                                data-bs-rol-name="{{ $rol->name }}">
                                <i class="bi bi-pencil-fill"></i>
                                {{ __('Editar') }}
                            </a>
                        </div>
                        <div class="col-4">
                            <form action="{{ route('rols.destroy', $rol->id) }}" method="post">
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

<!-- Modal update Roles -->
<div class="modal fade" id="modalUpdateRol" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    @include('AccessControl.Configuration.components.modals.edit-rol-modal')
</div>