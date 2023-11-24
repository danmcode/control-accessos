<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Editar compañia </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <form class="update-arl-form needs-validation" method="POST" novalidate>
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-auto">
                        <label for="name" class="form-label fw-bold"> Nombre de la ARL: <small
                                class="required">*</small></label>
                        <input type="text" class="form-control" id="arl_name" name="name" placeholder="ARL" required>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __('El nombre de la ARL es requerido') }}</strong>
                        </span>
                    </div>
                </div>

                <hr>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary btn-form">
                        {{ __('Editar ARL') }}
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>