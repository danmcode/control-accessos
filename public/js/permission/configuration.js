// Obtiene el elemento de input con id 'date_permission'
let dateInput = document.getElementById("date_permission");

// Configura la fecha mínima como hoy
let today = new Date();
let minDate = today.toISOString().split("T")[0]; // Formato YYYY-MM-DD
dateInput.setAttribute("min", minDate);
