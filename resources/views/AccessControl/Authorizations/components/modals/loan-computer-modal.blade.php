<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Editar compañia </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <form class="row update-loan-computer-form needs-validation" method="POST" novalidate>
                @csrf
                <div class="col-6">
                    <label for="search" class="form-label fw-bold"> Prestar equipo a: <small
                            class="required">*</small></label>
                    <input class="form-control" list="collaborators" id="search" placeholder="Buscar colaborador..">
                    <datalist id="collaborators">
                        @if( isset($users) && sizeof($users) > 0 )
                        @foreach( $users as $user )
                        <option id="collaboratorList" value="{{ $user->name }} {{ $user->last_name }}"
                            data-id="{{ $user->collaborators->id }}">
                            @endforeach
                            @endif
                    </datalist>
                </div>

                <div class="col-6">
                    <label for="search" class="form-label fw-bold"> Fecha de entrega: <small
                            class="required">*</small></label>
                    <input type="date" name="date_permission" id="date_permission" class="form-control" required>
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __('La fecha del permiso es requerida') }}</strong>
                    </span>
                </div>

                <hr class="mt-2">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary btn-form">
                        {{ __('Prestar equipo') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>