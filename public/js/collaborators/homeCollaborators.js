const input = document.getElementById("search");
const dataList = document.getElementById("collaborators");
// identification
const fullNameDiv = document.getElementById("full-name");
const identificationDiv = document.getElementById("identification");
const locationDiv = document.getElementById("location");
const jobTitleDiv = document.getElementById("job-title");
const photo = document.getElementById("photo");

const divUserInfo = document.getElementById("collaborator-info");
const divUserDefault = document.getElementById("collaborator-default");

const btnIn = document.getElementById("btnInCollaborator");
const btnOut = document.getElementById("btnOutCollaborator");

const modalIncome = document.getElementById("modalInCollaborator");
const modalOutcome = document.getElementById("modalOutCollaborator");

let formModalVisitorIn = document.getElementById("FormVisitorIn");

let modalValidate = document.getElementById("modalValidate");

const btnVisitor = document.getElementById("btnCreateVisitor");

input.addEventListener("input", () => {
    let selectedOption = null;
    let inputValue = input.value.toLowerCase();

    for (let i = 0; i < dataList.options.length; i++) {
        const option = dataList.options[i];

        if (option.value.toLowerCase() === inputValue) {
            selectedOption = option;
        }
    }

    if (selectedOption) {
        divUserDefault.style.display = "none";
        const collaboratorId = selectedOption.getAttribute("data-id");
        const collaboratorFullName =
            selectedOption.getAttribute("data-full-name");
        const collaboratorIdentification = selectedOption.getAttribute(
            "data-identification"
        );
        const collaboratorLocation =
            selectedOption.getAttribute("data-location");
        const collaboratorJobTile =
            selectedOption.getAttribute("data-job-title");
        const collaboratorArea = selectedOption.getAttribute("data-area");
        const collaboratorPhoto =
            selectedOption.getAttribute("data-photo-path");

        fullNameDiv.innerText = collaboratorFullName.toUpperCase();
        identificationDiv.innerText = collaboratorIdentification;
        locationDiv.innerText = `${collaboratorArea}, ${collaboratorLocation}`;
        jobTitleDiv.innerText = collaboratorJobTile;
        photo.src = collaboratorPhoto;
        divUserInfo.style.display = "block";

        btnIn.addEventListener("click", () => {
            let modalTitle = modalIncome.querySelector(".modal-title");
            let getFormIn = modalIncome.querySelector("#form-in-collaborator");

            modalTitle.textContent = `Registrar el ingreso a: ${collaboratorFullName}`;

            getFormIn.action = `registrar-ingreso/${collaboratorId}`;
        });

        btnOut.addEventListener("click", () => {
            let modalTitle = modalOutcome.querySelector(".modal-title");
            let getFormOut = modalOutcome.querySelector(
                "#form-out-collaborator"
            );

            modalTitle.textContent = `Registrar la salida a: ${collaboratorFullName}`;
            getFormOut.action = `registrar-salida/${collaboratorId}`;
        });

        //Visitors
        //btnVisitor.setAttribute("href", `crear-visitante/${collaboratorId}`);
        modalValidate.addEventListener("show.bs.modal", function (evet) {
            let getForm = modalValidate.querySelector(".form-validate-visitor");
            getForm.action = `validar-visitante/${collaboratorId}`;
        });
    } else {
    }
});
