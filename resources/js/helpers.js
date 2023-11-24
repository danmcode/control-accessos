window.InterfaceHelper = {
    deleteSelectOptionById: function (select, id) {
        if (select) {
            for (let i = 0; i < select.options.length; i++) {
                if(select.options[i].value === id){
                    select.remove(i);
                }
            }
        }
    }
}