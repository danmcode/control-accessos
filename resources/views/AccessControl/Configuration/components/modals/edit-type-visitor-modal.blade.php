<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Editar Tipo de Visitante </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <form class="update-tipo-visitante-form needs-validation" method="POST" novalidate>
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-6">
                        <label for="type_visitors" class="form-label fw-bold"> Tipo de visitante: <small class="required">*</small></label>
                        <input type="text" class="form-control" id="type_visitors" name="type_visitors" placeholder="Tipo de Visitante" required>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __('El tipo de visitante es requerido') }}</strong>
                        </span>
                    </div>
                </div>

                <hr>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary btn-form">
                        {{ __('Editar tipo visitante') }}
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>