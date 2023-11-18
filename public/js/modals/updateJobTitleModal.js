let modalUpdateJobTitle = document.getElementById('modalUpdateJobTitle')
modalUpdateJobTitle.addEventListener('show.bs.modal', function(event) {
    let button = event.relatedTarget
    let jobTitleId = button.getAttribute('data-bs-job-title-id');
    let jobTitleName = button.getAttribute('data-bs-job-title-name');
    let areaId = button.getAttribute('data-bs-area-id');
    let areaName = button.getAttribute('data-bs-area-name');
    let companyId = button.getAttribute('data-bs-company-id');
    let companyName = button.getAttribute('data-bs-company-name');

    let modalTitle = modalUpdateJobTitle.querySelector('.modal-title');

    let inputJobTitleName = modalUpdateJobTitle.querySelector('#job_title_name');
    let selectArea = modalUpdateJobTitle.querySelector('#area_id_modal');
    let selectCompany = modalUpdateJobTitle.querySelector('#company_id_job_title_modal');

    InterfaceHelper.deleteSelectOptionById(selectArea, areaId);
    InterfaceHelper.deleteSelectOptionById(selectCompany, companyId);

    selectArea[0].value = areaId;
    selectArea[0].innerText = areaName;

    selectCompany[0].value = companyId;
    selectCompany[0].innerText = companyName;

    modalTitle.textContent = `Editar cargo: ${areaName}`;

    inputJobTitleName.value = jobTitleName;

    let getFormUpdate = modalUpdateJobTitle.querySelector('.update-job-title-form');
    getFormUpdate.action = `cargos/${jobTitleId}`;
});