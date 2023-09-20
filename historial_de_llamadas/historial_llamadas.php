<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Llamadas</title>
    <link rel="stylesheet" href="styles.css"> <!-- Incluye una hoja de estilos CSS -->
</head>
<body>
    <h1>Historial de Llamadas</h1>
     
    <a href="registrar_llamada.php" target="_blank">Agregar Llamada</a>


    <table id="historial-table">
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Tiempo de Respuesta (minutos)</th>
            <th>Respuesta</th>
            <th>Tipo de Llamada</th>
        </tr>
    </table>
    <?php
$datos_bd = mysqli_connect("localhost","root","","ojo") or exit ("no se puede conectar");


// Recuperar datos del formulario
$tipo_llamado = $_POST['tipo_llamado'];
$respuesta = $_POST['respuesta'];
$duracion = $_POST['duracion'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

// Preparar la consulta SQL para insertar los datos en la tabla
$sql = "INSERT INTO registro_llamada (tipo_llamado, respuesta, duracion, fecha, hora) VALUES ('$tipo_llamado', '$respuesta', '$duracion', '$fecha', '$hora')";

if ($datos_bd ->query($sql) === TRUE) {
    echo "Los datos se han guardado correctamente.";
} else {
    echo "Error: " . $sql . "<br>" . $datos_bd ->error;
}
echo "<p>Tipo de Llamado: $tipo_llamado</p>";
echo "<p>Hubo Respuesta: $respuesta</p>";
echo "<p>Duración: $duracion minutos</p>";
echo "<p>Fecha de Llamado: $fecha</p>";
echo "<p>Hora de Llamado: $hora</p>";
// Cerrar la conexión
$datos_bd ->close();


?>

    <script src="script.js"></script> <!-- Incluye un archivo de script JavaScript -->
</body>
</html>
