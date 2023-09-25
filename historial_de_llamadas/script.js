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

var ctx = document.getElementById('graficoDuracion').getContext('2d');
var graficoDuracion = new Chart(ctx, {
    type: 'bar', // Tipo de gráfico de barras
    data: {
        labels: [], // Etiquetas de los datos
        datasets: [{
            label: 'Duración de Llamadas (minutos)',
            data: [], // Datos de la duración de llamadas
            backgroundColor: 'rgba(75, 192, 192, 0.2)', // Color de fondo de las barras
            borderColor: 'rgba(75, 192, 192, 1)', // Color del borde de las barras
            borderWidth: 1 // Ancho del borde de las barras
        }]
    },
    options: {
        scales: {
            y: {
                    beginAtZero: true // Comenzar en cero en el eje Y
            }
        }
    }
});

function actualizarGrafico() {
    // Realiza una solicitud AJAX para obtener los datos de la duración de llamadas desde tu base de datos
    fetch('registrar_llamada.php')
        .then(response => response.json())
        .then(data => {
            // Agrega los nuevos datos al gráfico
            graficoDuracion.data.labels.push(data.fecha);
            graficoDuracion.data.datasets[0].data.push(data.duracion);

            // Limita la cantidad de datos a mostrar (ajusta según tus necesidades)
            if (graficoDuracion.data.labels.length > 10) {
                graficoDuracion.data.labels.shift();
                graficoDuracion.data.datasets[0].data.shift();
            }

            // Actualiza el gráfico
            graficoDuracion.update();
        });
}

// Actualiza el gráfico cada X segundos (ajusta según tus necesidades)
setInterval(actualizarGrafico, 2000); // Actualiza cada 2 segundos

