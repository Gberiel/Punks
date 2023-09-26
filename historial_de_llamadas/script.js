var ctx = document.getElementById('graficoLlamadas').getContext('2d');
var graficoLlamadas = new Chart(ctx, {
    type: 'bar', // Tipo de gráfico de barras
    data: {
        labels: ["Llamadas Normales", "Llamadas de Emergencia"], // Etiquetas para las dos partes
        datasets: [{
            label: 'Cantidad de Llamadas',
            data: [], // Datos de la cantidad de llamadas
            backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)'], // Colores de fondo de las barras
            borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'], // Colores del borde de las barras
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
    // Realiza una solicitud AJAX para obtener los datos de las llamadas desde tu base de datos
    fetch('datos_grafico.php')
        .then(response => response.json())
        .then(data => {
            // Reinicia los datos
            graficoLlamadas.data.datasets[0].data = [];

            // Recorre los datos y divide las llamadas en normales y de emergencia
            var llamadasNormales = 0;
            var llamadasEmergencia = 0;

            data.forEach(function(item) {
                if (item.tipo_llamado === 'Normal') {
                    llamadasNormales++;
                } else if (item.tipo_llamado === 'Emergencia') {
                    llamadasEmergencia++;
                }
            });

            // Agrega los datos al gráfico
            graficoLlamadas.data.datasets[0].data.push(llamadasNormales, llamadasEmergencia);

            // Actualiza el gráfico
            graficoLlamadas.update();
        });
}

// Actualiza el gráfico cada X segundos (ajusta según tus necesidades)
setInterval(actualizarGrafico, 2000); // Actualiza cada 2 segundos
