<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Editar equipo de prestamo </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <form class="update-loan-computer row needs-validation" method="POST" novalidate>
                @csrf
                @method('PATCH')

                <div class="col-auto">
                    <label for="computer_name" class="form-label fw-bold"> Nombre del computador: <small
                            class="required">*</small></label>
                    <input type="text" class="form-control" id="computer_name" name="computer_name"
                        placeholder="Nombre del computador" required>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __('El Campo nombre del computador es requerido') }}</strong>
                    </span>
                </div>

                <div class="col-auto">
                    <label for="brand" class="form-label fw-bold"> Marca: <small class="required">*</small></label>
                    <input type="text" class="form-control" id="brand" name="brand" placeholder="Marca" required>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __('El Campo marca es Requerido') }}</strong>
                    </span>
                </div>

                <div class="col-auto">
                    <label for="serial" class="form-label fw-bold"> Serial: <small class="required">*</small></label>
                    <input type="text" class="form-control" id="serial" name="serial" placeholder="Serial" required>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __('El Campo serial es Requerido') }}</strong>
                    </span>
                </div>

                <hr class="mt-2">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary btn-form">
                        {{ __('Editar equipo de prestamo') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>