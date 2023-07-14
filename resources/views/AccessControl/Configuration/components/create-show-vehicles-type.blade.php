<!-- Company Form -->
<h5 class="card-title mb-3"> {{__('Crear tipo de vehiculo')}} </h5> 
<form class="row needs-validation" action="{{route('tipo-vehiculos.store')}}" method="POST" novalidate>
    @csrf
    
    <div class="col-auto">
        <label for="name" class="form-label fw-bold"> Tipo de vehiculo: <small class="required">*</small></label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Tipo de vehiculo" required>
        <span class="invalid-feedback" role="alert">
            <strong>{{ __('El Tipo de vehiculo es requerido') }}</strong>
        </span>
    </div>

    <div class="col-auto d-flex align-items-end">
        <button type="submit" class="btn btn-primary">Crear Tipo de vehiculo </button>
    </div>
</form>

<hr>

<div class="table-responsive p-2">
    <table class="table table-hover" id="dataTableLocations">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tipo de vehiculo</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if( isset($vehiclestypes) && sizeof($vehiclestypes) > 0 )
            @foreach( $vehiclestypes as $key => $VehiclesTypes )
            <tr>
                <th scope="row"> {{ $key + 1 }} </th>
                <td> {{ $VehiclesTypes->name }}</td>
                <td>
                    <div class="row">
                        <div class="col-4">
                            <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalUpdateVehiclesTypes" 
                                data-bs-id="{{ $VehiclesTypes->id }}"
                                data-bs-name="{{ $VehiclesTypes->name }}"
                                >
                                <i class="bi bi-pencil-fill"></i>
                                {{ __('Editar') }}
                            </a>
                        </div>
                        <div class="col-4">
                            <form action="#" method="post">
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