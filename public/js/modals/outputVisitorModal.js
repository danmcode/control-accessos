let modalOutVisitor = document.getElementById('modalOutVisitor')
const btnOut = document.getElementById('btnOutVisitor');

btnOut.addEventListener('click', ()=>{
            
    let modalTitle = modalOutcome.querySelector('.modalTitle');
    let getFormOut = modalOutcome.querySelector('#form-out-visitor');

    modalTitle.textContent = `Registrar la salida a: ${ collaboratorFullName }`;
    getFormOut.action = `registrar-salida/${collaboratorId}`;
    
});

modalOutVisitor.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    let button = event.relatedTarget
    // Extract info from data-bs-* attributes

    let visitorId = button.getAttribute('data-bs-id');
    let fullName = button.getAttribute('data-bs-full-name');

    let modalTitle = modalOutCollaborator.querySelector('.modalTitle');

    modalTitle.textContent = `Registrar la salida : ${fullName}`;

    let getFormUpdate = modalOutVisitor.querySelector('.form-out-visitor');
    getFormUpdate.action = `registrar-salida-visitante/${visitorId}`;
});