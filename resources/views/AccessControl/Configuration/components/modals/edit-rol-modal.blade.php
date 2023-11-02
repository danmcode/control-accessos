<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Editar Rol </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <form class="update-rol-form needs-validation" method="POST" novalidate>
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-6">
                        <label for="name_rol" class="form-label fw-bold"> Rol: <small class="required">*</small></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del Rol"
                            required>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __('El campo Rol es requerido') }}</strong>
                        </span>
                    </div>
                </div>

                <hr>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary btn-form">
                        {{ __('Editar Rol') }}
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>