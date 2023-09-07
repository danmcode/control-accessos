let modalOutVisitor = document.getElementById('modalOutVisitor')
modalOutVisitor.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    let button = event.relatedTarget
    // Extract info from data-bs-* attributes

    let visitorId = button.getAttribute('data-id');
    let fullName = button.getAttribute('data-full-name');

    let modalTitle = modalOutCollaborator.querySelector('.modal-title');

    modalTitle.textContent = `Registrar la salida : ${fullName}`;

    let getFormUpdate = modalOutVisitor.querySelector('.form-out-Visitor');
    getFormUpdate.action = `registrar-salida-visitante/${visitorId}`;
});