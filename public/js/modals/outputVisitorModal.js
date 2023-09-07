let modalOutVisitor = document.getElementById('modalOutVisitor')

modalOutVisitor.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    let button = event.relatedTarget
    // Extract info from data-bs-* attributes

    let visitorId = button.getAttribute('data-id');
    let fullName = button.getAttribute('data-bs-full-name');
    let modalTitle = modalOutVisitor.querySelector('.modal-title');

    modalTitle.textContent = `Registrar la salida : ${fullName}`;

    let getFormUpdate = modalOutVisitor.querySelector('.form-out-visitor');
    getFormUpdate.action = `registrar-salida-visitante/${visitorId}`;
});
