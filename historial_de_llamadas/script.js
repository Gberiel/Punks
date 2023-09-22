// script.js
document.addEventListener("DOMContentLoaded", function() {
    const historialTable = document.getElementById("historial-table");

    // Ejemplo de un arreglo de historial de llamadas ];

    // Recorre el arreglo de llamadas y crea filas en la tabla
    llamadas.forEach(llamada => {
        const row = historialTable.insertRow();
        row.innerHTML = `
            <td>${llamada.id}</td>
            <td>${llamada.fecha}</td>
            <td>${llamada.hora}</td>
            <td>${llamada.tiempoRespuesta}</td>
            <td>${llamada.respuesta}</td>
            <td>${llamada.tipoLlamada}</td>
        `;
    });
});