<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Editar tipo Vehiculo </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <form class="update-vehicle-form needs-validation" method="POST" novalidate>
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-auto">
                        <label for="name" class="form-label fw-bold"> Nombre del tipo de vehiculo: <small
                                class="required">*</small></label>
                        <input type="text" class="form-control" id="vehicle_name" name="name" placeholder="A" required>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __('El nombre del tipo vehiculo es requerido') }}</strong>
                        </span>
                    </div>
                </div>

                <hr>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary btn-form">
                        {{ __('Editar vehiculo') }}
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>