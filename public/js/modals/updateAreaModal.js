/**
 * Code for modals
 * dmr
 */
let modalUpdateArea = document.getElementById('modalUpdateArea')
modalUpdateArea.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    let button = event.relatedTarget
    // Extract info from data-bs-* attributes

    let areaId = button.getAttribute('data-bs-area-id');
    let areaName = button.getAttribute('data-bs-area-name');
    let companyId = button.getAttribute('data-bs-company-id');
    let companyName = button.getAttribute('data-bs-company-name');

    let modalTitle = modalUpdateArea.querySelector('.modal-title');

    let inputAreaName = modalUpdateArea.querySelector('#area_name');
    let selectCompany = modalUpdateArea.querySelector('#company_id_modal');

    InterfaceHelper.deleteSelectOptionById(selectCompany, companyId);

    selectCompany[0].value = companyId;
    selectCompany[0].innerText = companyName;

    modalTitle.textContent = `Editar area: ${areaName}`;

    inputAreaName.value = areaName;

    let getFormUpdate = modalUpdateArea.querySelector('.update-area-form');
    getFormUpdate.action = `areas/${areaId}`;
});