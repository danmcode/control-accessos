<form action="#" method="post" class="delete-collaborator-form">
    @csrf
    @method('DELETE')
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar colaborador</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Está seguro de eliminar el colaborador? <br>
                <span class="title-sm" id="collaborator-name"> </span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash"></i>
                    {{ __('Eliminar') }}
                </button>
            </div>
        </div>
    </div>
</form>