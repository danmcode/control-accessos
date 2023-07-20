//Input text and label

//inputs of visitors
const inputName_Visitor = document.getElementById('name_Visitor');
const inputLastName_Visitor = document.getElementById('lastname_Visitor');

//labels of visitors
const labelName_Visitor = document.getElementById('labelName_Visitor');
const labelLastName_Visitor = document.getElementById('labelLastName_Visitor');

//Use text entered by the input
labelName_Visitor.textContent = (inputName_Visitor.value)? inputName_Visitor.value :"Nombre";
labelLastName_Visitor.textContent = (inputLastName_Visitor.value)? inputLastName_Visitor.value :"Visitante";

//Events for click in visitors

inputName_Visitor.addEventListener('click',(event)=>{
    if(labelName_Visitor.textContent == "Nombre"){
        labelName_Visitor.textContent = "";
    }
});

inputLastName_Visitor.addEventListener('click',(event)=>{
    if(labelLastName_Visitor.textContent == "Visitante"){
        labelLastName_Visitor.textContent = "";
    }
});




//Events for input in visitors

inputName_Visitor.addEventListener('input',(event)=>{
    const inputvalue = event.target.value;
    labelName_Visitor.textContent = inputvalue;
});

inputLastName_Visitor.addEventListener('input',(event)=>{
    const inputvalue = event.target.value;
    labelLastName_Visitor.textContent = inputvalue;
});




