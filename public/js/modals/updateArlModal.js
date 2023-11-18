let modalUpdateArl = document.getElementById('modalUpdateArl')
modalUpdateArl.addEventListener('show.bs.modal', function(event) {
    let button = event.relatedTarget

    let arlId = button.getAttribute('data-bs-arl-id');
    let arlName = button.getAttribute('data-bs-arl-name');

    let modalTitle = modalUpdateArl.querySelector('.modal-title');

    let inputArlName = modalUpdateArl.querySelector('#arl_name');

    modalTitle.textContent = `Editar Arl: ${arlName}`;

    inputArlName.value = arlName;

    let getFormUpdate = modalUpdateArl.querySelector('.update-arl-form');
    getFormUpdate.action = `arls/${arlId}`;
});