/**
 * Code for modals
 * gmrj
 */
let modalUpdateRol = document.getElementById("modalUpdateRol");
modalUpdateRol.addEventListener("show.bs.modal", function (event) {
    let button = event.relatedTarget;

    let id = button.getAttribute("data-bs-rol-id");
    let rol = button.getAttribute("data-bs-rol-name");

    let modalTitle = modalUpdateRol.querySelector(".modal-title");
    let inputname = modalUpdateRol.querySelector("#name");

    modalTitle.textContent = `Editar Nombre del Rol: ${rol}`;

    inputname.value = rol;

    let getFormUpdate = modalUpdateRol.querySelector(".update-rol-form");
    getFormUpdate.action = `rols/${id}`;
});
