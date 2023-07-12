/**
 * Code for modals
 * dmr
 */
let modalUpdateIdentificationType = document.getElementById('modalUpdateIdentificationType')
modalUpdateIdentificationType.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    let button = event.relatedTarget
    // Extract info from data-bs-* attributes

    let identificationTypeId = button.getAttribute('data-bs-identification-type-id');
    let identificationTypeInitials = button.getAttribute('data-bs-identification-type-initials');
    let identificationTypeName = button.getAttribute('data-bs-identification-type-name');

    let modalTitle = modalUpdateIdentificationType.querySelector('.modal-title');

    let inputidentificationTypeName = modalUpdateIdentificationType.querySelector('#name');
    let inputidentificationTypeInitials = modalUpdateIdentificationType.querySelector('#initials');

    modalTitle.textContent = `Editar tipo de identificación: ${identificationTypeName}`;

    inputidentificationTypeName.value = identificationTypeName;
    inputidentificationTypeInitials.value = identificationTypeInitials;

    let getFormUpdate = modalUpdateIdentificationType.querySelector('.update-identification-type-form');
    getFormUpdate.action = `tipo-indentificaciones/${identificationTypeId}`;
});