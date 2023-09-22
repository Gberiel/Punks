<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="historial.css">
    <title>Historial de Llamadas</title>
</head>
<body>
    <h1>Historial de Llamadas</h1>
     
    <a href="registrar_llamada.php" target="_blank">Agregar Llamada</a>


    <?php
$datos_bd = mysqli_connect("localhost","root","","Punk") or exit ("no se puede conectar");


// Recuperar datos del formulario
$tipo_llamado = $_POST['tipo_llamado'];
$respuesta = $_POST['respuesta'];
$duracion = $_POST['duracion'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

// Preparar la consulta SQL para insertar los datos en la tabla
$sql = "INSERT INTO registro_llamada (tipo_llamado, respuesta, duracion, fecha, hora) VALUES ('$tipo_llamado', '$respuesta', '$duracion', '$fecha', '$hora')";

if ($datos_bd ->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error: " . $sql . "<br>" . $datos_bd ->error;
}

// Cerrar la conexión
$datos_bd ->close();


?>
<table id="historial-table">
    <tr>
        <th>Tipo de Llamada</th>
        <th>Respuesta</th>
        <th>Tiempo de Respuesta (minutos)</th>
        <th>Fecha</th>
        <th>Hora    </th>
    </tr>
    <tr>
        <th><?php echo $tipo_llamado ?></th>
        <th><?php echo $respuesta ?></th>
        <th><?php echo $duracion ?></th>
        <th><?php echo $fecha ?></th>
        <th><?php echo $hora ?></th>
    </tr>   
</table>

    <script src="script.js"></script> <!-- Incluye un archivo de script JavaScript -->
</body>
</html>