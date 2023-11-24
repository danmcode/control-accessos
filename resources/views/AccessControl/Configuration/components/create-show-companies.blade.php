<!-- Company Form -->

<h5 class="card-title"> {{__('Crear empresa')}} </h5>
<form class="row needs-validation" action="{{ route('empresas.store') }}" method="POST" novalidate>
    @csrf
    <div class="col-auto">
        <label for="nit" class="form-label fw-bold"> Nit: <small class="required">*</small></label>
        <input type="text" class="form-control" id="nit" name="nit" placeholder="Nit" required>
        <span class="invalid-feedback" role="alert">
            <strong>{{ __('El nit es requerido') }}</strong>
        </span>
    </div>

    <div class="col-auto">
        <label for="name" class="form-label fw-bold"> Nombre de la empresa:
            <small class="required">*</small></label>
        <input type="text" class="form-control" id="company_create" name="name" name="name" placeholder="Nombre de la empresa"
            required>
        <span class="invalid-feedback" role="alert">
            <strong>{{ __('El nombre de la empresa es requerido') }}</strong>
        </span>
    </div>

    <div class="col-auto d-flex align-items-end">
        <button type="submit" class="btn btn-primary">Crear empresa</button>
    </div>
</form>

<hr>

<div class="table-responsive p-2">
    <table class="table table-hover table responsive">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nit</th>
                <th scope="col">Empresa</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if( isset($companies) && sizeof($companies) > 0 )
            @foreach( $companies as $key => $company )

            <tr>
                <th scope="row"> {{ $key + 1 }} </th>
                <td> {{ $company->nit }}</td>
                <td> {{ $company->name }} </td>
                <td>
                    <div class="row">
                        <div class="col-4">
                            <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalUpdateCompany" data-bs-id="{{ $company->id }}"
                                data-bs-name="{{ $company->name }}" data-bs-nit="{{ $company->nit }}">
                                <i class="bi bi-pencil-fill"></i>
                                {{ __('Editar') }}
                            </a>
                        </div>
                        <div class="col-4">
                            <form action="{{ route('empresas.destroy', $company->id) }}" method="post">
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

<!-- Company Form -->
