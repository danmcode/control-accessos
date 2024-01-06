let modalUpdateLoanComputers = document.getElementById('modalUpdateLoanComputer')
modalUpdateLoanComputers.addEventListener('show.bs.modal', function(event) {
    let button = event.relatedTarget;


    let loanComputerId = button.getAttribute('data-bs-loanComputer-id');
    let loanComputerName  = button.getAttribute('data-bs-loanComputer-name');
    let loanComputerBrand = button.getAttribute('data-bs-loanComputer-brand');
    let loanComputerSerial  = button.getAttribute('data-bs-loanComputer-serial');

    let modalTitle = modalUpdateLoanComputers.querySelector('.modal-title');
    modalTitle.textContent = `Editar equipo de prestamo: ${loanComputerName}`;

    let inputLoanComputerName = modalUpdateLoanComputers.querySelector('#computer_name');
    let inputLoanComputerBrand = modalUpdateLoanComputers.querySelector('#brand');
    let inputLoanComputerSerial = modalUpdateLoanComputers.querySelector('#serial');

    inputLoanComputerName.value = loanComputerName;
    inputLoanComputerBrand.value = loanComputerBrand;
    inputLoanComputerSerial.value = loanComputerSerial;

    let getFormUpdate = modalUpdateLoanComputers.querySelector('.update-loan-computer');
    getFormUpdate.action = `prestamos-computadoras/${loanComputerId}`;
});