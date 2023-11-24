<!-- Company Form -->
<h5 class="card-title"> {{__('Registrar ARL')}} </h5>
<form class="row needs-validation" action="{{ route('arls.store') }}" method="POST" novalidate>
    @csrf
    <div class="col-auto">
        <label for="name" class="form-label fw-bold"> Nombre de la ARL: <small class="required">*</small></label>
        <input type="text" class="form-control" id="arl" name="name" placeholder="ARL" required>
        <span class="invalid-feedback" role="alert">
            <strong>{{ __('El nombre de la ARL es requerido') }}</strong>
        </span>
    </div>

    <div class="col-auto d-flex align-items-end">
        <button type="submit" class="btn btn-primary">Crear ARL</button>
    </div>
</form>

<hr>

<div class="table-responsive p-2">
    <table class="table table-hover" id="dataTableLocations">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre ARL</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if( isset($arls) && sizeof($arls) > 0 )
            @foreach( $arls as $key => $arl )

            <tr>
                <th scope="row"> {{ $key + 1 }} </th>
                <td> {{ $arl->name }}</td>
                <td>
                    <div class="row">
                        <div class="col-4">
                            <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalUpdateArl" 
                                data-bs-arl-id="{{ $arl->id }}"
                                data-bs-arl-name="{{ $arl->name }}">
                                <i class="bi bi-pencil-fill"></i>
                                {{ __('Editar') }}
                            </a>
                        </div>
                        <div class="col-4">
                            <form action="{{ route('arls.destroy', $arl->id) }}" method="post">
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
<div class="modal fade" id="modalUpdateArl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    @include('AccessControl.Configuration.components.modals.edit-arl-modal')
</div>