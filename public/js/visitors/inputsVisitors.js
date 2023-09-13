//Input text and label

//inputs of visitors
const inputName_Visitor = document.getElementById("name_Visitor");
const inputLastName_Visitor = document.getElementById("lastname_Visitor");
const input_date_arl = document.getElementById("date_arl");
const mark_car = document.getElementById("mark_car");
const Placa = document.getElementById("Placa");
const color = document.getElementById("color");
const mark = document.getElementById("mark");
const description = document.getElementById("description");
const serial = document.getElementById("serial");

//labels of visitors
const labelName_Visitor = document.getElementById("labelName_Visitor");
const labelLastName_Visitor = document.getElementById("labelLastName_Visitor");

//div of visitors
const block_arl = document.getElementById("block_arl");
const block_date_arl = document.getElementById("block_date_arl");
const block_remission = document.getElementById("block_remission");
const block_vehicle = document.getElementById("vehicle");

//select of visitors
const typeVisitor = document.getElementById("typeVisitor");
const select_arl = document.getElementById("arl");
const vehicle_type = document.getElementById("vehicle_type");
const equipment_type = document.getElementById("equipment_type");

//TextArea of visitors
const remission = document.getElementById("remission");

//Use text entered by the input
labelName_Visitor.textContent = inputName_Visitor.value
    ? inputName_Visitor.value
    : "Nombre";
labelLastName_Visitor.textContent = inputLastName_Visitor.value
    ? inputLastName_Visitor.value
    : "Visitante";

//Events for click in visitors
inputName_Visitor.addEventListener("click", (event) => {
    if (labelName_Visitor.textContent == "Nombre") {
        labelName_Visitor.textContent = "";
    }
});

inputLastName_Visitor.addEventListener("click", (event) => {
    if (labelLastName_Visitor.textContent == "Visitante") {
        labelLastName_Visitor.textContent = "";
    }
});

//Events for input in visitors
inputName_Visitor.addEventListener("input", (event) => {
    const inputvalue = event.target.value;
    labelName_Visitor.textContent = inputvalue;
});

inputLastName_Visitor.addEventListener("input", (event) => {
    const inputvalue = event.target.value;
    labelLastName_Visitor.textContent = inputvalue;
});

//Events for div in visitors

//disable content
block_arl.style.visibility = "hidden";
block_date_arl.style.visibility = "hidden";
block_remission.style.visibility = "hidden";

//to hide content
block_arl.style.display = "none";
block_date_arl.style.display = "none";
block_remission.style.display = "none";

//inputs not obligatory
input_date_arl.required = false;
select_arl.required = false;
remission.required = false;
mark_car.required = false;
Placa.required = false;
color.required = false;
vehicle_type.required = false;

typeVisitor.addEventListener("change", (e) => {
    const name = typeVisitor.options[typeVisitor.selectedIndex].text;

    if (name === "Contratista") {
        block_arl.style.visibility = "visible";
        block_date_arl.style.visibility = "visible";
        block_arl.style.display = "";
        block_date_arl.style.display = "";
        input_date_arl.required = true;
        select_arl.required = true;

        block_remission.style.visibility = "hidden";
        block_remission.style.display = "none";
        remission.required = false;

        mark_car.required = false;
        Placa.required = false;
        color.required = false;
        vehicle_type.required = false;
    } else if (name === "Conductor") {
        let enable = confirm("¿Desea agregar una remisión para el Conductor?");
        if (enable == true) {
            block_remission.style.visibility = "visible";
            block_remission.style.display = "";
            remission.required = true;

            block_arl.style.visibility = "hidden";
            block_date_arl.style.visibility = "hidden";
            block_arl.style.display = "none";
            block_date_arl.style.display = "none";
            input_date_arl.required = false;
            select_arl.required = false;

            mark_car.required = true;
            Placa.required = true;
            color.required = true;
            vehicle_type.required = true;
        } else {
            block_remission.style.visibility = "hidden";
            block_remission.style.display = "none";
            remission.required = false;

            block_arl.style.visibility = "hidden";
            block_date_arl.style.visibility = "hidden";
            block_arl.style.display = "none";
            block_date_arl.style.display = "none";
            input_date_arl.required = false;
            select_arl.required = false;

            mark_car.required = true;
            Placa.required = true;
            color.required = true;
            vehicle_type.required = true;
        }
    } else {
        //desable content
        block_arl.style.visibility = "hidden";
        block_date_arl.style.visibility = "hidden";
        block_remission.style.visibility = "hidden";

        //to hide content
        block_arl.style.display = "none";
        block_date_arl.style.display = "none";
        block_remission.style.display = "none";

        //inputs not obligatory
        input_date_arl.required = false;
        select_arl.required = false;
        remission.required = false;
    }
});

equipment_type.addEventListener("change", (event) => {
    const name = equipment_type.options[equipment_type.selectedIndex].text;

    if (name === "Seleccione...") {
        mark.required = false;
        description.required = false;
        serial.required = false;
    } else {
        mark.required = true;
        description.required = true;
        serial.required = true;
    }
});
