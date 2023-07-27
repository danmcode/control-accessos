/**
 * Code for modals
 * gmrj
 */
let modalUpdateTypeVisitor = document.getElementById('modalUpdateVisitor')
modalUpdateTypeVisitor.addEventListener('show.bs.modal',function(event){
    let button = event.relatedTarget

    let id =  button.getAttribute('data-bs-visitor-type-id');
    let type_visitor = button.getAttribute('data-bs-visitor-type-name');

    let modalTitle = modalUpdateTypeVisitor.querySelector('.modal-title');
    let inputname = modalUpdateTypeVisitor.querySelector('#type_visitors');

    modalTitle.textContent = `Editar tipo de visitante: ${type_visitor}`

    inputname.value = type_visitor;

    let getFormUpdate = modalUpdateTypeVisitor.querySelector('.update-tipo-visitante-form');
    getFormUpdate.action = `tipo-visitantes/${id}`;

    
})