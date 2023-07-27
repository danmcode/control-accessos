/**
 * Code for modals
 * dmr
 */
let modalUpdatetypeEquipment = document.getElementById('modalUpdatetypeEquipment')
modalUpdatetypeEquipment.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    let button = event.relatedTarget
    // Extract info from data-bs-* attributes

    let id = button.getAttribute('data-bs-id');
    let name = button.getAttribute('data-bs-name');

    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    let modalTitle = modalUpdatetypeEquipment.querySelector('.modal-title');
    let inputName = modalUpdatetypeEquipment.querySelector('#name');


    modalTitle.textContent = `Editar Tipo de Equipo: ${name}`;

    inputName.value = name;

    let getFormUpdate = modalUpdatetypeEquipment.querySelector('.update-equipment-form');
    getFormUpdate.action = `tipo-equipos/${id}`;


});