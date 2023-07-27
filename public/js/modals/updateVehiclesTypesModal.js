/**
 * Code for modals
 * gmrj
 */
let modalUpdateTypeVehicle = document.getElementById('modalUpdatetypeVehicle')
modalUpdateTypeVehicle.addEventListener('show.bs.modal',function(event){
    let button = event.relatedTarget

    let id =  button.getAttribute('data-bs-id');
    let type_vehicle = button.getAttribute('data-bs-name');

    let modalTitle = modalUpdateTypeVehicle.querySelector('.modal-title');
    let inputname = modalUpdateTypeVehicle.querySelector('#name');

    modalTitle.textContent = `Editar tipo de vehiculo: ${type_vehicle}`

    inputname.value = type_vehicle;

    let getFormUpdate = modalUpdateTypeVehicle.querySelector('.update-vehicle-form');
    getFormUpdate.action = `tipo-vehiculos/${id}`;

    
})