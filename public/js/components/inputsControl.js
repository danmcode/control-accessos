//input text and label
const inputName = document.getElementById('name');
const inputLastName = document.getElementById('last_name');
const labelName = document.getElementById('labelName');
const labelLastName = document.getElementById('labelLastName');




//Select and Job Title indicator
const selectJobTitle = document.getElementById('job_title_id');
const labelJobTitle = document.getElementById('job_title_label');

labelName.textContent = (inputName.value) ? inputName.value : "Nombre";
labelLastName.textContent = (inputLastName.value) ? labelLastName.value : "Colaborador";


labelJobTitle.textContent = (selectJobTitle.value) ? selectJobTitle[selectJobTitle.selectedIndex].innerText  : "Cargo";

inputName.addEventListener('click', (event) =>{
    if( labelName.textContent == "Nombre" ){
        labelName.textContent = "";
    }
});

inputLastName.addEventListener('click', (event) =>{
    if( labelLastName.textContent == "Colaborador" ){
        labelLastName.textContent = "";
    }
});
inputLastName.addEventListener('click', (event) =>{
    if( labelLastName.textContent == "Colaborador" ){
        labelLastName.textContent = "";
    }
});

// Agregar un evento 'input' al inputText
inputName.addEventListener('input', (event) => {
    const inputValue = event.target.value;
    labelName.textContent = inputValue;
});

// Agregar un evento 'input' al inputText
inputLastName.addEventListener('input', (event) => {
    const inputValue = event.target.value;
    labelLastName.textContent = inputValue;
});

selectJobTitle.addEventListener('change', () =>{
    let selected = selectJobTitle.options[selectJobTitle.selectedIndex].innerText;
    
    if (selectJobTitle.selectedIndex != 0) {
        labelJobTitle.textContent = selected;
    }
});

