let modalUpdateLocation = document.getElementById('modalUpdateLocation')
modalUpdateLocation.addEventListener('show.bs.modal', function(event) {
    let button = event.relatedTarget

    let locationId = button.getAttribute('data-bs-location-id');
    let locationName = button.getAttribute('data-bs-location-name');
    let companyId = button.getAttribute('data-bs-company-id');
    let companyName = button.getAttribute('data-bs-company-name');

    let modalTitle = modalUpdateLocation.querySelector('.modal-title');

    let inputLocationName = modalUpdateLocation.querySelector('#location_name');
    let selectCompany = modalUpdateLocation.querySelector('#company_id_locations');
    
    InterfaceHelper.deleteSelectOptionById(selectCompany, companyId);

    selectCompany[0].value = companyId;
    selectCompany[0].innerText = companyName;

    modalTitle.textContent = `Editar ubicación: ${locationName}`;

    inputLocationName.value = locationName;

    let getFormUpdate = modalUpdateLocation.querySelector('.update-location-form');
    getFormUpdate.action = `ubicaciones/${locationId}`;
});