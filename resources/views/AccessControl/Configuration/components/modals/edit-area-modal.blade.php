<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Editar compañia </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <form class="update-area-form needs-validation" method="POST" novalidate>
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-auto">
                        <label for="name" class="form-label fw-bold"> Nombre del área: <small
                                class="required">*</small></label>
                        <input type="text" class="form-control" id="area_name" name="name" placeholder="Área" required>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __('El nombre del área es requerido') }}</strong>
                        </span>
                    </div>

                    <div class="col-auto">
                        <label for="name" class="form-label fw-bold"> Empresa:
                            <small class="required">*</small></label>
                        <select name="company_id" id="company_id_modal" class="form-select" required>
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
                </div>

                <hr>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary btn-form">
                        {{ __('Editar Área') }}
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>