/**
 * Code for modals
 * dmr
 */
let modalUpdateArl = document.getElementById('modalUpdateArl')
modalUpdateArl.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    let button = event.relatedTarget
    // Extract info from data-bs-* attributes

    let arlId = button.getAttribute('data-bs-arl-id');
    let arlName = button.getAttribute('data-bs-arl-name');

    let modalTitle = modalUpdateArl.querySelector('.modal-title');

    let inputArlName = modalUpdateArl.querySelector('#name');

    modalTitle.textContent = `Editar Arl: ${arlName}`;

    inputArlName.value = arlName;

    let getFormUpdate = modalUpdateArl.querySelector('.update-arl-form');
    getFormUpdate.action = `arls/${arlId}`;
});