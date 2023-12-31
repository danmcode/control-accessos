const input = document.getElementById('search');
const dataList = document.getElementById('collaborators');
// identification
const fullNameDiv =document.getElementById('full-name');
const identificationDiv =document.getElementById('identification');
const locationDiv = document.getElementById('location');
const jobTitleDiv =document.getElementById('job-title');
const photo =document.getElementById('photo');

const divUserInfo = document.getElementById('collaborator-info');
const divUserDefault = document.getElementById('collaborator-default');

input.addEventListener('input', () => {
    let selectedOption = null;
    let inputValue = input.value.toLowerCase();

    for (let i = 0; i < dataList.options.length; i++) {
        const option = dataList.options[i];

        if (option.value.toLowerCase() === inputValue) {
            selectedOption = option;
        }
    }

    if (selectedOption) {
        divUserDefault.style.display = 'none';
        const collaboratorId = selectedOption.getAttribute('data-id');
        const collaboratorFullName = selectedOption.getAttribute('data-full-name');
        const collaboratorIdentification = selectedOption.getAttribute('data-identification');
        const collaboratorLocation = selectedOption.getAttribute('data-location');
        const collaboratorJobTile = selectedOption.getAttribute('data-job-title');
        const collaboratorArea = selectedOption.getAttribute('data-area');
        const collaboratorPhoto = selectedOption.getAttribute('data-photo-path');

        fullNameDiv.innerText = collaboratorFullName.toUpperCase();
        identificationDiv.innerText = collaboratorIdentification;
        locationDiv.innerText = `${collaboratorArea}, ${collaboratorLocation}`;
        jobTitleDiv.innerText = collaboratorJobTile;
        photo.src = collaboratorPhoto;
        divUserInfo.style.display = 'block';
    }else{

    }
});