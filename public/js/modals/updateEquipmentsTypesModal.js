let modalUpdatetypeEquipment = document.getElementById('modalUpdatetypeEquipment')
modalUpdatetypeEquipment.addEventListener('show.bs.modal', function(event) {
    let button = event.relatedTarget
    let id = button.getAttribute('data-bs-id');
    let name = button.getAttribute('data-bs-name');

    let modalTitle = modalUpdatetypeEquipment.querySelector('.modal-title');
    let inputName = modalUpdatetypeEquipment.querySelector('#equipment_name');

    modalTitle.textContent = `Editar Tipo de Equipo: ${name}`;

    inputName.value = name;

    let getFormUpdate = modalUpdatetypeEquipment.querySelector('.update-equipment-form');
    getFormUpdate.action = `tipo-equipos/${id}`;
});