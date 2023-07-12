// Call the dataTables jQuery plugin
$(document).ready(function () {
    $('#dataTable').DataTable({
        ordering: true,
        searching: true,
        language: {
            lengthMenu: "Mostrar _MENU_ entradas",
            info: "Mostrando página _PAGE_ de _PAGES_",
            zeroRecords: "No se encontraron resultados",
            emptyTable: "Ningún dato disponible en esta tabla",
            infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
            search: "Buscar:",
            loadingRecords: "Cargando...",
            paginate: {
                first: "Primero",
                last: "Último",
                next: "Siguiente",
                previous: "Anterior"
            }
        },
    });
});

// Call the dataTables jQuery plugin
$(document).ready(function () {
    $('#dataTableJobTitles').DataTable({
        ordering: true,
        searching: true,
        language: {
            lengthMenu: "Mostrar _MENU_ entradas",
            info: "Mostrando página _PAGE_ de _PAGES_",
            zeroRecords: "No se encontraron resultados",
            emptyTable: "Ningún dato disponible en esta tabla",
            infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
            search: "Buscar:",
            loadingRecords: "Cargando...",
            paginate: {
                first: "Primero",
                last: "Último",
                next: "Siguiente",
                previous: "Anterior"
            }
        },
    });
});

// Call the dataTables jQuery plugin
$(document).ready(function () {
    $('#dataTableLocations').DataTable({
        ordering: true,
        searching: true,
        language: {
            lengthMenu: "Mostrar _MENU_ entradas",
            info: "Mostrando página _PAGE_ de _PAGES_",
            zeroRecords: "No se encontraron resultados",
            emptyTable: "Ningún dato disponible en esta tabla",
            infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
            search: "Buscar:",
            loadingRecords: "Cargando...",
            paginate: {
                first: "Primero",
                last: "Último",
                next: "Siguiente",
                previous: "Anterior"
            }
        },
    });
});


// form validation
window.addEventListener('load', function () {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function (form) {
        form.addEventListener('submit', function (event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
}, false);
