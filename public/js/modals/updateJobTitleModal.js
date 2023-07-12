/**
 * Code for modals
 * dmr
 */
let modalUpdateJobTitle = document.getElementById('modalUpdateJobTitle')
modalUpdateJobTitle.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    let button = event.relatedTarget
    // Extract info from data-bs-* attributes
    let jobTitleId = button.getAttribute('data-bs-job-title-id');
    let jobTitleName = button.getAttribute('data-bs-job-title-name');
    let areaId = button.getAttribute('data-bs-area-id');
    let areaName = button.getAttribute('data-bs-area-name');
    let companyId = button.getAttribute('data-bs-company-id');
    let companyName = button.getAttribute('data-bs-company-name');

    let modalTitle = modalUpdateJobTitle.querySelector('.modal-title');

    let inputJobTitleName = modalUpdateJobTitle.querySelector('#name');
    let selectArea = modalUpdateJobTitle.querySelector('#area_id');
    let selectCompany = modalUpdateJobTitle.querySelector('#company_id');

    // Area
    selectArea[0].value = areaId;
    selectArea[0].innerText = areaName;

    // Company
    selectCompany[0].value = companyId;
    selectCompany[0].innerText = companyName;

    modalTitle.textContent = `Editar cargo: ${areaName}`;

    inputJobTitleName.value = jobTitleName;

    let getFormUpdate = modalUpdateJobTitle.querySelector('.update-job-title-form');
    getFormUpdate.action = `cargos/${jobTitleId}`;


});