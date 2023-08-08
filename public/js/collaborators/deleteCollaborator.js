/**
 * Code for modals
 * dmr
 */
let modalDeleteCollaborator = document.getElementById('modalDeleteCollaborator')
modalDeleteCollaborator.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    let button = event.relatedTarget
    // Extract info from data-bs-* attributes

    let collaboratorId = button.getAttribute('data-id');
    let collaboratorName = button.getAttribute('data-full-name');

    let modalTitle = modalDeleteCollaborator.querySelector('.modal-title');
    let collaboratoNameSpan = modalDeleteCollaborator.querySelector('#collaborator-name');
    
    modalTitle.textContent = `Eliminar colaborador`;
    collaboratoNameSpan.textContent = `${ collaboratorName }`

    let getFormDelete = modalDeleteCollaborator.querySelector('.delete-collaborator-form');
    getFormDelete.action = `colaboradores/${collaboratorId}`;
});