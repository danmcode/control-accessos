/**
 * Code for modals
 * dmr
 */
let modalUpdateUser = document.getElementById('modalUpdateCompany')
modalUpdateCompany.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    let button = event.relatedTarget
    // Extract info from data-bs-* attributes

    let id = button.getAttribute('data-bs-id');
    let name = button.getAttribute('data-bs-name');
    let nit = button.getAttribute('data-bs-nit');

    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    let modalTitle = modalUpdateCompany.querySelector('.modal-title');
    let inputName = modalUpdateCompany.querySelector('#company_modal');
    let inputNit = modalUpdateCompany.querySelector('#nit_modal');

    modalTitle.textContent = `Editar empresa: ${name}`;

    inputNit.value = nit;
    inputName.value = name;

    let getFormUpdate = modalUpdateCompany.querySelector('.update-empresa-form');
    getFormUpdate.action = `empresas/${id}`;


});