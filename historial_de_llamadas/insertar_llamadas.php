<?php
// Configura los detalles de la base de datos
$host = "localhost"; // Cambia esto si tu base de datos no está en el mismo servidor
$usuario = "tu_usuario"; // Reemplaza "tu_usuario" con tu nombre de usuario de la base de datos
$contraseña = "tu_contraseña"; // Reemplaza "tu_contraseña" con tu contraseña de la base de datos
$base_de_datos = "ojo"; // Nombre de la base de datos
$tabla = "registro_llamada"; // Nombre de la tabla

// Conecta a la base de datos
$conexion = new mysqli($host, $usuario, $contraseña, $base_de_datos);

// Verifica la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtiene los datos del formulario
$tipoLlamada = $_POST['tipoLlamada'];
$huboRespuesta = $_POST['huboRespuesta'];
$telefono = $_POST['telefono'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

// Prepara la consulta SQL para insertar los datos en la tabla
$sql = "INSERT INTO $tabla (tipoLlamada, huboRespuesta, telefono, fecha, hora) VALUES (?, ?, ?, ?, ?)";

// Prepara la sentencia SQL
$stmt = $conexion->prepare($sql);

// Vincula los parámetros
$stmt->bind_param("sssss", $tipoLlamada, $huboRespuesta, $telefono, $fecha, $hora);

// Ejecuta la consulta
if ($stmt->execute()) {
    echo "Llamada registrada exitosamente.";
} else {
    echo "Error al registrar la llamada: " . $stmt->error;
}

// Cierra la conexión
$stmt->close();
$conexion->close();
?>
    