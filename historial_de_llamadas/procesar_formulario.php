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
    echo "Los datos se han guardado correctamente.";
} else {
    echo "Error: " . $sql . "<br>" . $datos_bd ->error;
}
echo "<p>Tipo de Llamado: $tipoLlamado</p>";
echo "<p>Hubo Respuesta: $respuesta</p>";
echo "<p>Duración: $duracion minutos</p>";
echo "<p>Fecha de Llamado: $fecha</p>";
echo "<p>Hora de Llamado: $hora</p>";
// Cerrar la conexión
$datos_bd ->close();
?>