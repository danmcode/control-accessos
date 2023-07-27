<!-- Company Form -->
<h5 class="card-title mb-3"> {{__('Crear tipo de equipo')}} </h5> 
<form class="row needs-validation" action="{{ route('tipo-equipos.store') }}" method="POST" novalidate>
    @csrf
    
    <div class="col-auto">
        <label for="name" class="form-label fw-bold"> Tipo de equipo: <small class="required">*</small></label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Tipo de equipo" required>
        <span class="invalid-feedback" role="alert">
            <strong>{{ __('El Tipo de equipo es requerido') }}</strong>
        </span>
    </div>

    <div class="col-auto d-flex align-items-end">
        <button type="submit" class="btn btn-primary">Crear Tipo de equipo </button>
    </div>
</form>

<hr>

<div class="table-responsive p-2">
    <table class="table table-hover" id="dataTableLocations">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tipo de equipo</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if( isset($equipmentstypes) && sizeof($equipmentstypes) > 0 )
            @foreach( $equipmentstypes as $key => $EquipmentTypes )
            <tr>
                <th scope="row"> {{ $key + 1 }} </th>
                <td> {{ $EquipmentTypes->name }}</td>
                <td>
                    <div class="row">
                        <div class="col-4">
                            <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalUpdatetypeEquipment" 
                                data-bs-id="{{ $EquipmentTypes->id }}"
                                data-bs-name="{{ $EquipmentTypes->name }}"
                                >
                                <i class="bi bi-pencil-fill"></i>
                                {{ __('Editar') }}
                            </a>
                        </div>
                        <div class="col-4">
                            <form action="{{ route('tipo-equipos.destroy', $EquipmentTypes->id) }}" method="post">
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

<!-- Modal update type equipment -->
<div class="modal fade" id="modalUpdatetypeEquipment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    @include('AccessControl.Configuration.components.modals.edit-equipment-modal')
</div>