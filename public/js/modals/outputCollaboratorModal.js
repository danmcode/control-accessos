let modalOutCollaborator = document.getElementById('modalOutCollaborator')
modalOutCollaborator.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    let button = event.relatedTarget
    // Extract info from data-bs-* attributes

    let collaboratorId = button.getAttribute('data-id');
    let fullName = button.getAttribute('data-full-name');

    let modalTitle = modalOutCollaborator.querySelector('.modal-title');

    modalTitle.textContent = `Registrar la salida peatonal a: ${fullName}`;

    let getFormUpdate = modalOutCollaborator.querySelector('.form-out-collaborator');
    getFormUpdate.action = `registrar-salida/${collaboratorId}/1`;
});