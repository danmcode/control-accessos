<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Editar compañia </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <form class="update-identification-type-form needs-validation" method="POST" novalidate>
                @csrf
                @method('PATCH')
                <div class="row">

                    <div class="col-auto">
                        <label for="initials" class="form-label fw-bold"> Sigla: <small
                                class="required">*</small></label>
                        <input type="text" class="form-control" id="initials_modal" name="initials" placeholder="Sigla"
                            required>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __('La sigla de la identificación es requerida') }}</strong>
                        </span>
                    </div>

                    <div class="col-auto">
                        <label for="name" class="form-label fw-bold"> Tipo de identificación: <small
                                class="required">*</small></label>
                        <input type="text" class="form-control" id="identification_name" name="name"
                            placeholder="Tipo de identificación" required>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __('El Tipo de identificación es requerido') }}</strong>
                        </span>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary btn-form">
                        {{ __('Editar tipo de identificación') }}
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>