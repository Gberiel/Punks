<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="historial.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <title>Historial de Llamadas</title>
</head>
<body>
    <h1>Historial de Llamadas</h1>
    <canvas id="graficoDuracion" width="400" height="200"></canvas>

     
    <a href="registrar_llamada.php" target="_blank">Agregar Llamada</a>

    <?php
    $datos_bd = mysqli_connect("localhost", "root", "", "Punk") or exit("No se puede conectar");

    // Recuperar datos del formulario
    $tipo_llamado = $_POST['tipo_llamado'];
    $respuesta = $_POST['respuesta'];
    $duracion = $_POST['duracion'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    // Preparar la consulta SQL para insertar los datos en la tabla
    $sql = "INSERT INTO registro_llamada (tipo_llamado, respuesta, duracion, fecha, hora) VALUES ('$tipo_llamado', '$respuesta', '$duracion', '$fecha', '$hora')";

    if ($datos_bd->query($sql) === TRUE) {
        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . $datos_bd->error;
    }

    // Consulta SQL para recuperar todos los registros
    $consulta = "SELECT tipo_llamado, respuesta, duracion, fecha, hora FROM registro_llamada";
    $resultado = $datos_bd->query($consulta);

    if ($resultado->num_rows > 0) {
        // Imprimir la tabla con los registros
        echo "<table id='historial-table'>";
        echo "<tr>";
        echo "<th>Tipo de Llamada</th>";
        echo "<th>Respuesta</th>";
        echo "<th>Tiempo de Respuesta (minutos)</th>";
        echo "<th>Fecha</th>";
        echo "<th>Hora</th>";
        echo "</tr>";

        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila['tipo_llamado'] . "</td>";
            echo "<td>" . $fila['respuesta'] . "</td>";
            echo "<td>" . $fila['duracion'] . "</td>";
            echo "<td>" . $fila['fecha'] . "</td>";
            echo "<td>" . $fila['hora'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No hay registros disponibles.";
    }

    // Cerrar la conexión
    $datos_bd->close();
    ?>
    
    <script src="script.js"></script> <!-- Incluye un archivo de script JavaScript -->
</body>
</html>
