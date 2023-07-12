<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Editar compañia </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <form class="update-empresa-form needs-validation" method="POST" novalidate>
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-6">
                        <label for="nit" class="form-label fw-bold"> Nit: <small class="required">*</small></label>
                        <input type="text" class="form-control" id="nit" name="nit" placeholder="Nit" required>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __('El nit es requerido') }}</strong>
                        </span>
                    </div>

                    <div class="col-6">
                        <label for="name" class="form-label fw-bold"> Nombre de la empresa: <small
                                class="required">*</small></label>
                        <input type="text" class="form-control" id="name" name="name" name="name"
                            placeholder="Nombre de la empresa" required>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __('El nombre de la empresa es requerido') }}</strong>
                        </span>
                    </div>

                </div>

                <hr>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary btn-form">
                        {{ __('Editar Empresa') }}
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>