<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Editar Equipo </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <form class="update-equipment-form needs-validation" method="POST" novalidate>
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-auto">
                        <label for="name" class="form-label fw-bold"> Nombre del equipo: <small
                                class="required">*</small></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Equipo" required>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __('El nombre del equipo es requerido') }}</strong>
                        </span>
                    </div>
                </div>

                <hr>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary btn-form">
                        {{ __('Editar Equipo') }}
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>