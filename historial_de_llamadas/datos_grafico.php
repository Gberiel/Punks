<?php
$datos_bd = mysqli_connect("localhost", "root", "", "Punk") or exit("No se puede conectar");

// Consulta SQL para obtener la duración de las llamadas
$consulta = "SELECT fecha, duracion FROM registro_llamada ORDER BY fecha DESC LIMIT 10"; // Limita a los últimos 10 registros
$resultado = $datos_bd->query($consulta);

$datos = array();

while ($fila = $resultado->fetch_assoc()) {
    $datos[] = array(
        "fecha" => $fila['fecha'],
        "duracion" => $fila['duracion']
    );
}

// Devuelve los datos en formato JSON
echo json_encode($datos);

// Cerrar la conexión
$datos_bd->close();
?>
